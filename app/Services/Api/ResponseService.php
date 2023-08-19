<?php

namespace App\Services\Api;

use App\Enums\ApiBaseConsts;
use Illuminate\Http\JsonResponse;
use RuntimeException;


/**
 * Class ResponseService
 *
 * @package App\Http\Services
 */
class ResponseService// extends ApiBaseService
{
    /**
     * @param object $result
     * @return object
     */
    public function successResponse(mixed $result) : object
    {
        return response()->json([
            'status' => ApiBaseConsts::REQUIRED_PARAMETER_ERROR,
            'message' => ApiBaseConsts::getErrorMessage(ApiBaseConsts::NO_ERROR),
            'success' => true,
            'result' => $result,
        ]);
    }

    //ここから下は例外レスポンス Handler.phpで自動実行

    /**
     * @param RuntimeException $e
     * @return array
     */
    public function runtimeExceptionResponse(RuntimeException $e): JsonResponse
    {
        return response()->json([
            'status' => $e->getCode(),
            'message' => $e->getMessage(),
            'success' => false,
            'result' => [],
        ], ApiBaseConsts::SYNTAX_ERROR);
    }

    public function pdoExceptionResponse(): JsonResponse
    {
        return response()->json([
            'status' => ApiBaseConsts::DB_ERROR,
            'message' => ApiBaseConsts::getErrorMessage(ApiBaseConsts::DB_ERROR),
            'success' => false,
        ], ApiBaseConsts::SYNTAX_ERROR);
    }

    /**
     * @return array
     */
    public function unknownErrorResponse(): JsonResponse
    {
        return response()->json([
            'status' => ApiBaseConsts::UNKNOWN_ERROR,
            'message' => ApiBaseConsts::getErrorMessage(ApiBaseConsts::UNKNOWN_ERROR),
            'success' => false,
            'result' => [],
        ]);
    }
}
