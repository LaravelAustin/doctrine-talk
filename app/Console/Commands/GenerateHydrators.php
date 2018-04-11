<?php

namespace App\Console\Commands;

use App\Entities\Comment;
use App\Entities\Post;
use App\Entities\Tag;
use App\Entities\User;
use GeneratedHydrator\Configuration;
use Illuminate\Console\Command;

class GenerateHydrators extends Command
{
    private const ENTITIES = [
        User::class,
        Post::class,
        Comment::class,
        Tag::class,
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:hydrators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates hydrators for all entities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (self::ENTITIES as $entity) {
            $config = new Configuration($entity);
            // $config->setGeneratedClassesNamespace(app()->getNamespace() . '/Hydrators');
            $config->setGeneratedClassesTargetDir(app_path('Hydrators'));

            $config->createFactory()->getHydratorClass();
        }
    }
}
