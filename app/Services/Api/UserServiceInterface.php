<?php

namespace App\Services\Api;

interface UserServiceInterface
{
    //index
    public function getUserListsMeta() : int;

    //show
    public function getUserMeta(int $id) : object;

    //update
    public function updateUserMeta(array $update_user_meta, int $id) : bool;

    //delete
    public function deleteUserMeta(int $id) : int;
}