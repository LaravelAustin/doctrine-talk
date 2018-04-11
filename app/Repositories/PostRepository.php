<?php declare(strict_types=1);

namespace App\Repositories;

use App\Queries\PostQuery;
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
            ->leftJoin('p.tags', 't')
            ->join('p.author', 'a')
            ->getQuery()->getResult());
    }

    public function getFilteredPosts(PostQuery $postQuery): Collection
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder();

        return collect($query
            ->select('p, t, a')
            ->from($this->getEntityName(), 'p')
            ->leftJoin('p.tags', 't')
            ->join('p.author', 'a')
            ->addCriteria($postQuery->getCriteria())
            ->getQuery()->getResult());
    }
}
