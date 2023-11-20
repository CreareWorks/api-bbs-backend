<?php

namespace App\Http\Controllers\Api;

use App\Enums\ApiBaseConsts;
use App\Http\Controllers\Controller;
use App\Services\Api\ResponseService;
use App\Services\Api\UserServiceInterface;
use App\Http\Requests\Api\UpdateUserRequest;

class UserController extends Controller
{
    private $user_service;
    private $response_service;

    public function __construct(
            UserServiceInterface $user_service,
            ResponseService $response_service,
        )
    {
        $this->user_service = $user_service;
        $this->response_service = $response_service;
    }


    /**
     * test
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : object
    {
        $result = $this->user_service->getUserListsMeta();

        return $this->response_service->successResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show(int $id) : object
    {
        $result = $this->user_service->getUserMeta($id);
        
        return $this->response_service->successResponse($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, int $id) : object
    {
        //formrequestの拡張とバリデーション
        $update_user_meta = $request->only(['name', 'password']);
        $result = $this->user_service->updateUserMeta($update_user_meta, $id);
        return $this->response_service->successResponse($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : object
    {
        $result = $this->user_service->deleteUserMeta($id) . '件削除';
        return $this->response_service->successResponse($result);
    }
}
