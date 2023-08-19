<?php

namespace App\Services\Api;

interface PostServiceInterface
{
    //index
    public function getPostListsMeta() : object;

    //store
    public function setPostListsMeta(array $request) : object;

    //show
    public function getPostMeta(int $id) : object;

    //update
    public function updatePostMeta(array $update_post_meta, int $id) : bool;

    //delete
    public function deletePostMeta(int $id) : int;
}