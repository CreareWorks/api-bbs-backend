<?php

namespace App\Services\Api;
use App\Services\Api\BaseApiService;
use App\Services\Api\UserServiceInterface;
use App\Repositories\Api\UserRepositoryInterface;

class UserService extends BaseApiService implements UserServiceInterface
{
    private $user_repository;

    public function __construct(
        UserRepositoryInterface $user_repository
    )
    {
        $this->user_repository = $user_repository;
    }

    /**
     * index
     *
     * @return object
     */
    public function getUserListsMeta() :int
    {
        return $this->user_repository->getUserLists();
    }

    /**
     * show
     *
     * @param integer $id
     * @return object
     */
    public function getUserMeta(int $id) : object
    {
        return $this->user_repository->getUserById($id);
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
        return $this->user_repository->updateUserMeta($update_user_meta,$id);
    }

    /**
     * destroy
     *
     * @param integer $id
     * @return integer
     */
    public function deleteUserMeta(int $id) : int
    {
        return $this->user_repository->deleteUserMeta($id);
    }


}