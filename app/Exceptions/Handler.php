<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Services\Api\ResponseService;
use Exception;
use PDOException;
use RuntimeException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        //レスポンス関係のserviceのインスタンスを生成
        $responseService = new ResponseService();
            
        if ($exception instanceof PDOException) {
            //PDO が発するエラーを返します。
            return $responseService->pdoExceptionResponse();
        } elseif ($exception instanceof RuntimeException) {
            //実行時にだけ発生するようなエラーを返します。
            return $responseService->runtimeExceptionResponse($exception);
        } elseif ($exception instanceof Exception) {
            //PDOでもRuntimeでもキャッチしないエラーを返します。
            return $responseService->unknownErrorResponse();
        }
    }

}
