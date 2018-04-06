<?php

use App\Entities\Comment;
use App\Entities\Post;
use App\Entities\Tag;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->populator->addEntity(User::class, 25);
        $this->populator->addEntity(Post::class, 40);
        $this->populator->addEntity(Comment::class, 100);
        $this->populator->addEntity(Tag::class, 75, [
            'label' => function () {
                return $this->faker->word();
            },
        ]);
        $insertedPks = $this->populator->execute();

        // This is an array with key (entity FQCN => array of entities)
        //TODO: Grab only the post and tag entities, foreach post add a random number of tags, persist changes
        $tags = collect($insertedPks[Tag::class]);
        collect($insertedPks[Post::class])->each(function (Post $post) use ($tags) {
            foreach (range(0, $this->faker->numberBetween(0, 7)) as $_) {
                $post->addTag($tags->random());
            }
            \EntityManager::persist($post);
        });
        \EntityManager::flush();
    }
}
