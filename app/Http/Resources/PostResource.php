<?php

namespace App\Http\Resources;

use App\Entities\Post;
use App\Entities\Tag;
use Doctrine\Common\Collections\Collection;
use Hashids\Hashids;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        /** @var Post $post */
        $post = $this->resource;

        return [
            'id'         => resolve(Hashids::class)->encode($post->getId()),
            'slug'       => $post->getSlug(),
            'title'      => $post->getTitle(),
            'body'       => $post->getBody(),
            'author'     => AuthorResource::make($post->getAuthor()),
            'tags'       => $this->transform($post->getTags(), function (Collection $tags) {
                return array_reduce($tags->toArray(), function (array $carry, Tag $tag) {
                    $carry[] = $tag->getLabel();

                    return $carry;
                }, []);
            }, []),
            'published'  => $post->isPublished(),
            'created_at' => $post->getCreatedAt(),
            'updated_at' => $post->getUpdatedAt(),
        ];
    }
}
