<?php


namespace App\Repositories;


use App\Repositories\interfaces\PackageRepositoryInterface;
use ArrayAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EloquentPackageRepository extends EloquentBaseRepository implements PackageRepositoryInterface
{
    /**
     * validate order by field
     *
     * @param array $data
     * @return ArrayAccess
     * @throws ValidationException
     */
    public function save(array $data): ArrayAccess
    {
        if (Auth::user()->canCreatePackage()){
            $data['createdByUserId'] = Auth::user()->id;
            return parent::save($data);
        }
        throw ValidationException::withMessages([
            'title' => ["You can't create package more than eight!"]
        ]);
    }
}
