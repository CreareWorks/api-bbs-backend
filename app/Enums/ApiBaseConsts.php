<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ApiBaseConsts extends Enum
{
    /** @var int リクエストのデータ型 */
    const TYPE_NONE = 0;
    const TYPE_INT = 1;
    const TYPE_STR = 2;
    const TYPE_ARRAY = 3;

    /** @var int 処理結果ステータス(エラーコード一覧) */
    const NO_ERROR = 0;
    const AUTH_ERROR = 100;
    const REQUIRED_PARAMETER_ERROR = 200;
    const INVALID_VALUE_ERROR = 300;
    const MISMATCH_VALUE_ERROR = 400;
    const UNPROCESSABLE_ENTITY = 422;
    const SYNTAX_ERROR = 500;
    const DUPLICATION_ERROR = 700;
    const DB_ERROR = 800;
    const UNKNOWN_ERROR = 900;
    /** @var array 処理結果エラーメッセージ */
    const ERROR_MESSAGE = [
        self::NO_ERROR => '正常終了',
        self::AUTH_ERROR => '認証エラー',
        self::REQUIRED_PARAMETER_ERROR => '必須入力エラー',
        self::INVALID_VALUE_ERROR => '入力値不正',
        self::MISMATCH_VALUE_ERROR => 'コード値不整合',
        self::DUPLICATION_ERROR => '重複エラー',
        self::DB_ERROR => 'データ追加時エラー',
        self::UNKNOWN_ERROR => '未定義エラー',
    ];
    
    public static function getErrorMessage(int $code) : string
    {
        return ApiBaseConsts::ERROR_MESSAGE[$code];
    }
}
