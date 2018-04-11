<?php

namespace App\Providers;

use App\Entities\Post;
use App\Entities\Tag;
use App\Repositories\PostRepository;
use App\Services\PostService;
use GeneratedHydrator\Configuration;
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

        $this->app->bind(PostService::class, function () {
            $config = new Configuration(Post::class);

            return new PostService(
                $this->app['em'],
                $this->app['em']->getRepository(Tag::class),
                $this->app[$config->createFactory()->getHydratorClass()]
            );
        });
    }
}
