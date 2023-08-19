<?php

namespace App\Services\Api;
use App\Services\Api\BaseApiService;
use App\Services\Api\PostServiceInterface;
use App\Repositories\Api\PostRepositoryInterface;

class PostService extends BaseApiService implements PostServiceInterface
{
    private $post_repository;

    public function __construct(
        PostRepositoryInterface $post_repository
    )
    {
        $this->post_repository = $post_repository;
    }

    /**
     * index
     *
     * @return object
     */
    public function getPostListsMeta() :object
    {
        return $this->post_repository->getPostLists();
    }

    /**
     * store
     *
     * @param array $request
     * @return object
     */
    public function setPostListsMeta(array $request) : object
    {
        $user_id = $this->baseGetUserMeta()['id'];
        return $this->post_repository->setPostLists($request,$user_id);
    }

    /**
     * show
     *
     * @param integer $id
     * @return object
     */
    public function getPostMeta(int $id) : object
    {
        return $this->post_repository->getPostById($id);
    }

    /**
     * update
     *
     * @param array $update_post_meta
     * @param integer $id
     * @return boolean
     */
    public function updatePostMeta(array $update_post_meta, int $id) : bool
    {
        return $this->post_repository->updatePostMeta($update_post_meta,$id);
    }

    /**
     * destroy
     *
     * @param integer $id
     * @return integer
     */
    public function deletePostMeta(int $id) : int
    {
        return $this->post_repository->deletePostMeta($id);
    }


}