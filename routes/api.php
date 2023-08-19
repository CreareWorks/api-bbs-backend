<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\CommentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//会員登録(laravel標準機能をカスタマイズ)
Route::group(["middleware" => "api",'dbtransaction'],function() {
    Route::post('/register', [RegisterController::class, 'register']); //会員登録 & メール送信
    Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify'); // メール認証
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend'); // 
});

//Jwt-auth 認証周りのエンドポイント
Route::group(['middleware' => 'api','prefix' => 'auth', ['except' => ['login', 'refresh']]], //login refresh は認証してない時も実行できないといけない為、除外
function ($router) {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/refresh', [AuthController::class,'refresh']);
    Route::post('/me', [AuthController::class,'me']);
});

//認証中のみ実行可能なエンドポイント
//CRUDAPI
Route::group([["middleware" => "api",'dbtransaction']], function () {
    Route::apiResource('users', UserController::class)->except(['store']);
    Route::apiResource('posts', PostsController::class);
    Route::get('posts/search/{search_text}', [PostsController::class, 'searchList']);
    Route::apiResource('comments', CommentsController::class)->except(['store']);
    Route::post('comments/setComment/{post_id}', [CommentsController::class,'setComment']);
});