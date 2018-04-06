<?php

namespace App\Providers;

use App\Entities\Post;
use App\Repositories\PostRepository;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepository::class, function () {
            return new PostRepository(
                $this->app['em'],
                $this->app['em']->getClassMetadata(Post::class)
            );
        });

        $this->app->singleton(Hashids::class, function () {
            return new Hashids('doctrine-example', 16, 'abcdefghijklmnopqrstuvwxyz');
        });
    }
}
