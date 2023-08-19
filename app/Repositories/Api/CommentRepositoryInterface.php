<?php

namespace App\Repositories\Api;

interface CommentRepositoryInterface
{
    //show
    public function getCommentLists() : int;

    //store
    public function setCommentLists(array $request, int $user_id, int $post_id) : object;

    //index
    public function getCommentById(int $id) : object;

    //update
    public function updateCommentMeta(array $update_user_meta, int $id) : bool;

    //destroy
    public function deleteCommentMeta(int $id) : int;

}