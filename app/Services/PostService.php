<?php declare(strict_types=1);

namespace App\Services;

use App\Entities\Post;
use App\Entities\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Zend\Hydrator\HydratorInterface;

class PostService
{
    /**
     * @var ObjectRepository
     */
    private $tags;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        ObjectRepository $tags,
        HydratorInterface $hydrator
    ) {
        $this->tags          = $tags;
        $this->hydrator      = $hydrator;
        $this->entityManager = $entityManager;
    }

    public function createPost(User $user, array $data): Post
    {
        $data = $this->transformData($data);

        if (array_has($data, 'tags')) {
            $data['tags'] = $this->getTagsForPost($data['tags']);
        }

        $post = $this->hydrator->hydrate($data, new Post);

        $user->authorPost($post);

        $this->entityManager->persist($post);
        $this->entityManager->flush($post);

        return $post;
    }

    public function updatePost(Post $post, array $data): Post
    {
        $post = $this->hydrator->hydrate($data, $post);
        $this->entityManager->persist($post);
        $this->entityManager->flush($post);

        return $post;
    }

    private function transformData(array $data): array
    {
        return collect($data)->keyBy(function ($item, $key) {
            return camel_case($key);
        })->toArray();
    }

    private function getTagsForPost(array $tags): Collection
    {
        // Refactor this into a findOrCreate scenario
        return $this->tags->matching(
            Criteria::create()
                ->where(Criteria::expr()->in('label', $tags))
        );
    }
}
