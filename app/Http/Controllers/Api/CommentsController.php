<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Api\ResponseService;
use App\Services\Api\CommentServiceInterface;
use App\Http\Requests\Api\StoreCommentRequest;

class CommentsController extends Controller
{
    private $comment_service;
    private $response_service;

    public function __construct(
            CommentServiceInterface $comment_service,
            ResponseService $response_service,
        )
    {
        $this->comment_service = $comment_service;
        $this->response_service = $response_service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->comment_service->getCommentListsMeta();
        return $this->response_service->successResponse($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setComment(StoreCommentRequest $request,$post_id)
    {
        $comment_meta = $request->only('comment_body');
        $result = $this->comment_service->setCommentListsMeta($comment_meta,$post_id);
        return $this->response_service->successResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->comment_service->getCommentMeta($id);
        return $this->response_service->successResponse($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommentRequest $request,int $id)
    {
        $comment_meta = $request->only('comment_body');
        $result = $this->comment_service->updateCommentMeta($comment_meta,$id);
        return $this->response_service->successResponse($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->comment_service->deleteCommentMeta($id);
        return $this->response_service->successResponse($result);
    }
}
