<?php

namespace App\Http\Resources;

use App\Entities\User;
use Hashids\Hashids;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        /** @var User $user */
        $user = $this->resource;

        return [
            'id'           => resolve(Hashids::class)->encode($user->getId()),
            'first_name'   => $user->getFirstName(),
            'last_name'    => $user->getLastName(),
            'display_name' => $user->getDisplayName(),
            'created_at'   => $user->getCreatedAt(),
            'updated_at'   => $user->getUpdatedAt(),
        ];
    }
}
