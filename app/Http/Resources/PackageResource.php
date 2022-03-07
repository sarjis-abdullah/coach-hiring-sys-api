<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "publishDate" => $this->publishDate,
            "sessionTime" => $this->sessionTime,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            'packageUsers' => $this->when($this->needToInclude($request, 'p.pu'), function () {
                return new PackageUserResourceCollection($this->packageUsers);
            }),
            'users' => $this->when($this->needToInclude($request, 'p.ppp'), function () {
                return new PackageUserResourceCollection($this->users);
            }),
        ];
    }
}
