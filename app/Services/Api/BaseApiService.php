<?php

namespace App\Services\Api;
use App\Http\Controllers\AuthController;

abstract class BaseApiService
{

    protected function baseGetUserMeta()
    {
        $auth = new AuthController();
        return json_decode($auth->me()->content(), true);
    }
    
}