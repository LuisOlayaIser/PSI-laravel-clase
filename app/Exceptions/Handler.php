<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $this->convertValidationExceptionToResponse($exception, $request);
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['error' => "El metodo especificado no es correcto"], 405);
        }
        if ($exception instanceof ModelNotFoundException) {
            $modelo = class_basename($exception->getModel());
            return response()->json(['error' => "No existe una instancia de {$modelo} con el id especificado"], 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['error' => "Url no encontrada"], 404);
        }

        if($exception instanceof QueryException){
            $codigo = $exception->errorInfo[1];
            if($codigo ==1451){
                return response()->json(['error' => "No se puede eliminar de forma permanente esta instancia porque se encuentra relacionado"],409);
            }
        }

        if($exception instanceof HttpException){
            $codigo = $exception->getStatusCode();
            $mensaje= $exception->getMessage();
            return response()->json(['error'=> $mensaje],$codigo);
        }

        if(config('app.debug')){
            return parent::render($request, $exception);
        }
        return response()->json(['error' => "Falla inesperada"],500);
        
    }
    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {

        $errors = $e->validator->errors()->getMessages();
        return response()->json(['error' => $errors], 422);
    }
}
