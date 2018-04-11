<?php declare(strict_types=1);

namespace App\Queries;

use Illuminate\Http\Request;

class PostQuery extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    protected function parseRequest(Request $request): void
    {
        collect($request->input('filters', []))->each(function ($value, $key) {
            [$field, $expression] = array_pad(explode('_', $key, 2), 2, null);
            $this->{'where' . ucfirst(studly_case($field))}($value, $expression);
        });
    }

    private function wherePublished($value): void
    {
        $expr = $this->criteria::expr();
        $this->criteria->where($expr->eq('p.published', $value));
    }

    private function whereTags($value): void
    {
        $expr = $this->criteria::expr();
        $this->criteria->andWhere($expr->in('t.label', explode(',', $value)));
    }

    private function whereCreated($value, $expression = 'eq')
    {
        $expr = $this->criteria::expr();
        $this->criteria->andWhere($expr->{$expression}('p.createdAt', $value));
    }
}