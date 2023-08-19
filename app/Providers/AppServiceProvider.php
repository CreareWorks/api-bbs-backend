<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Users
        //依存関係のバインド 各クラス内でインスタンスの生成などさせずにここでbind
        $this->app->bind(
            \App\Repositories\Api\UserRepositoryInterface::class,
            \App\Repositories\Api\UserRepository::class,
        );
        //userserviceインターフェースと、userrepositoryインターフェースをbind
        //userservice内では、userrepositoryインターフェースをコンストラクタでインスタンス生成
        $this->app->bind(
            \App\Services\Api\UserServiceInterface::class,
            function ($app) {
                return new \App\Services\Api\UserService(
                    //解決 コンストラクタの部分定義
                    $app->make(\App\Repositories\Api\UserRepositoryInterface::class)
                );
            },
        );

        //Posts
        $this->app->bind(
            \App\Repositories\Api\PostRepositoryInterface::class,
            \App\Repositories\Api\PostRepository::class,
        );
        $this->app->bind(
            \App\Services\Api\PostServiceInterface::class,
            function ($app) {
                return new \App\Services\Api\PostService(
                    $app->make(\App\Repositories\Api\PostRepositoryInterface::class)
                );
            },
        );

        //Comments
        $this->app->bind(
            \App\Repositories\Api\CommentRepositoryInterface::class,
            \App\Repositories\Api\CommentRepository::class,
        );
        $this->app->bind(
            \App\Services\Api\CommentServiceInterface::class,
            function ($app) {
                return new \App\Services\Api\CommentService(
                    $app->make(\App\Repositories\Api\CommentRepositoryInterface::class)
                );
            },
        );
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
