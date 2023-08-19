<?php

namespace App\Repositories\Api;

use App\Models\comments;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * index
     *
     * @return object
     */
    public function getCommentLists() : int
    {
        return comments::count();
    }

    /**
     * store
     *
     * @param array $request
     * @param integer $user_id
     * @return object
     */
    public function setCommentLists(array $request, int $user_id, int $post_id) : object
    {
        return comments::create([
            'comment_user_id' => $user_id,
            'comment_post_id' => $post_id,
            'comment_body' => $request['comment_body'],
        ]);
    }

    /**
     * show
     *
     * @param integer $id
     * @return object
     */
    public function getCommentById(int $id) : object
    {
        return comments::where('comment_post_id',$id)->get();
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
        $comment_meta = comments::find($id);

        $comment_meta->comment_body = $update_comment_meta['comment_body'];

        return $comment_meta->save();
    }

    /**
     * destroy
     *
     * @param integer $id
     * @return object
     */
    public function deleteCommentMeta(int $id) : int
    {
        return comments::destroy($id);
    }

}