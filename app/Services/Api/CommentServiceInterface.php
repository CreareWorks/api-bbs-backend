<?php

namespace App\Services\Api;

interface CommentServiceInterface
{
    //index
    public function getCommentListsMeta() : int;

    //store
    public function setCommentListsMeta(array $request,int $post_id) : object;

    //show
    public function getCommentMeta(int $id) : object;

    //update
    public function updateCommentMeta(array $update_comment_meta, int $id) : bool;

    //delete
    public function deleteCommentMeta(int $id) : int;
}