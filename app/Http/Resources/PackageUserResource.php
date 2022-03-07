<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageUserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "userId" => $this->userId,
            "packageId" => $this->packageId,
            "package" => new PackageResource($this->package),
            "user" => new PackageResource($this->user)
        ];
    }
}
