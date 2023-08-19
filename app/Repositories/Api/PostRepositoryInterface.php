<?php

namespace App\Repositories\Api;


interface PostRepositoryInterface
{
    //show
    public function getPostLists() : object;

    //store
    public function setPostLists(array $request, int $user_id) : object;

    //index
    public function getPostById(int $id) : object;

    //update
    public function updatePostMeta(array $update_user_meta, int $id) : bool;

    //destroy
    public function deletePostMeta(int $id) : int;

}