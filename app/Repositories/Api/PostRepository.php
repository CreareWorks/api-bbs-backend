<?php

namespace App\Repositories\Api;

use App\Models\posts;

class PostRepository implements PostRepositoryInterface
{
    /**
     * index
     *
     * @return object
     */
    public function getPostLists() : object
    {
        return posts::paginate(10);
    }

    /**
     * store
     *
     * @param array $request
     * @param integer $user_id
     * @return object
     */
    public function setPostLists(array $request, int $user_id) : object
    {
        return posts::create([
            'post_user_id' => $user_id,
            'post_title' => $request['post_title'],
            'post_body' => $request['post_body'],
        ]);
    }

    /**
     * show
     *
     * @param integer $id
     * @return object
     */
    public function getPostById(int $id) : object
    {
        return posts::find($id);
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
        $post_meta = $this->getPostById($id);

        $post_meta->post_title = $update_post_meta['post_title'];
        $post_meta->post_body = $update_post_meta['post_body'];

        return $post_meta->save();
    }

    /**
     * destroy
     *
     * @param integer $id
     * @return object
     */
    public function deletePostMeta(int $id) : int
    {
        return posts::destroy($id);
    }

}