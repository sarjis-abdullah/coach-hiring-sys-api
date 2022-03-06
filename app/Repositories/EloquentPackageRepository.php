<?php


namespace App\Repositories;


use App\Repositories\interfaces\PackageRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class EloquentPackageRepository extends EloquentBaseRepository implements PackageRepositoryInterface
{
    public function save(array $data): \ArrayAccess
    {
        $data['createdByUserId'] = Auth::user()->id;
        return parent::save($data);
    }
}
