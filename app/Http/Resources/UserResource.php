<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            'roles' => $this->when($this->needToInclude($request, 'u.roles'), function () {
                return new RoleResourceCollection($this->roles);
            }),
            'packages' => $this->when($this->needToInclude($request, 'u.packages'), function () {
                return new PackageResourceCollection($this->packages);
            }),
        ];
    }
}
