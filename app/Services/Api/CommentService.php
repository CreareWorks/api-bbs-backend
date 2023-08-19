<?php

namespace App\Services\Api;
use App\Services\Api\BaseApiService;
use App\Services\Api\CommentServiceInterface;
use App\Repositories\Api\CommentRepositoryInterface;

class CommentService extends BaseApiService implements CommentServiceInterface
{
    private $Comment_repository;

    public function __construct(
        CommentRepositoryInterface $comment_repository
    )
    {
        $this->comment_repository = $comment_repository;
    }

    /**
     * index
     *
     * @return object
     */
    public function getCommentListsMeta() :int
    {
        return $this->comment_repository->getCommentLists();
    }

    /**
     * store
     *
     * @param array $request
     * @return object
     */
    public function setCommentListsMeta(array $request, int $post_id) : object
    {
        $user_id = $this->baseGetUserMeta()['id'];
        return $this->comment_repository->setCommentLists($request,$user_id,$post_id);
    }

    /**
     * show
     *
     * @param integer $id
     * @return object
     */
    public function getCommentMeta(int $id) : object
    {
        return $this->comment_repository->getCommentById($id);
    }

    /**
     * update
     *
     * @param array $update_post_meta
     * @param integer $id
     * @return boolean
     */
    public function updateCommentMeta(array $update_comment_meta, int $id) : bool
    {
        return $this->comment_repository->updateCommentMeta($update_comment_meta,$id);
    }

    /**
     * destroy
     *
     * @param integer $id
     * @return integer
     */
    public function deleteCommentMeta(int $id) : int
    {
        return $this->comment_repository->deleteCommentMeta($id);
    }


}