<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\ResponseService;
use App\Services\Api\PostServiceInterface;
use App\Http\Requests\Api\StorePostRequest;

use App\Models\posts; // 面倒なので暫定

class PostsController extends Controller
{
    private $post_service;
    private $response_service;

    public function __construct(
            PostServiceInterface $post_service,
            ResponseService $response_service,
        )
    {
        $this->post_service = $post_service;
        $this->response_service = $response_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->post_service->getPostListsMeta();
        return $this->response_service->successResponse($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchList(string $search_text="")
    {
        // 仮置き
        if ($search_text !== "ALL123456789") {
            $result = posts::where('post_title', 'LIKE', '%'.$search_text.'%')
            ->orWhere('post_body', 'LIKE', '%'.$search_text.'%');

            $result = $result->paginate(10);
        } else {
            $result = posts::paginate(10);
        }
        
        return $this->response_service->successResponse($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $request = $request->only(['post_title', 'post_body']);
        $result = $this->post_service->setPostListsMeta($request);
        
        return $this->response_service->successResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $result = $this->post_service->getPostMeta($id);
        return $this->response_service->successResponse($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, int $id)
    {
        $request = $request->only(['post_title','post_body']);
        $result = $this->post_service->updatePostMeta($request, $id);
        return $this->response_service->successResponse($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $result = $this->post_service->deletePostMeta($id);
        return $this->response_service->successResponse($result);
    }
}
