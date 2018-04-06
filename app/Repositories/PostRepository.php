<?php declare(strict_types=1);

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Collection;

class PostRepository extends EntityRepository
{
    public function getAllPosts(): Collection
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder();

        return collect($query
            ->select('p, t, a')
            ->from($this->getEntityName(), 'p')
            ->join('p.tags', 't')
            ->join('p.author', 'a')
            ->getQuery()->getResult());
    }

    public function getFilteredPosts(array $filters): Collection
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder();

        return collect($query
            ->select('p, t, a')
            ->from($this->getEntityName(), 'p')
            ->join('p.tags', 't')
            ->join('p.author', 'a')
            // This is obviously not a clean way to handle this, just demonstration purposes
            ->where($query->expr()->eq('p.published', $filters['published']))
            ->getQuery()->getResult());
    }
}
