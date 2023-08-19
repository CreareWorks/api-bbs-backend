<?php

namespace App\Repositories\Api;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * index
     *
     * @return object
     */
    public function getUserLists() : int
    {
        return User::count();
    }

    /**
     * show
     *
     * @param integer $id
     * @return object
     */
    public function getUserById(int $id) : object
    {
        return User::find($id);
    }

    /**
     * update
     *
     * @param array $update_user_meta
     * @param integer $id
     * @return boolean
     */
    public function updateUserMeta(array $update_user_meta, int $id) : bool
    {
        $user_meta = $this->getUserById($id);

        if (isset($update_user_meta['name'])) {
            $user_meta->name = $update_user_meta['name'];
        }
        if (isset($update_user_meta['password'])) {
            $user_meta->password = Hash::make($update_user_meta['password']);
        }

        return $user_meta->save();
    }

    /**
     * destroy
     *
     * @param integer $id
     * @return object
     */
    public function deleteUserMeta(int $id) : int
    {
        return User::destroy($id);
    }

}