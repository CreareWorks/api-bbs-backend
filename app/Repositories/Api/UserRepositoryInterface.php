<?php

namespace App\Repositories\Api;

interface UserRepositoryInterface
{
    //show
    public function getUserLists() : int;

    //index
    public function getUserById(int $id) : object;

    //update
    public function updateUserMeta(array $update_user_meta, int $id) : bool;

    //destroy
    public function deleteUserMeta(int $id) : int;

}