<?php declare(strict_types=1);

namespace App\Queries;

use Doctrine\Common\Collections\Criteria;
use Illuminate\Http\Request;

abstract class AbstractQuery
{
    /**
     * @var Criteria
     */
    protected $criteria;

    private function __construct(Request $request)
    {
        $this->criteria = Criteria::create();
        $this->parseRequest($request);
    }

    /**
     * @param Request $request
     *
     * @return AbstractQuery
     */
    public static function createFromRequest(Request $request): self
    {
        return new static($request);
    }

    /**
     * @param Request $request
     */
    abstract protected function parseRequest(Request $request): void;

    public function getCriteria(): Criteria
    {
        return $this->criteria;
    }
}