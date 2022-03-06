<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPackageUserRequest;
use App\Http\Requests\StorePackageUserRequest;
use App\Http\Requests\UpdatePackageUserRequest;
use App\Http\Resources\PackageUserResource;
use App\Http\Resources\PackageUserResourceCollection;
use App\Models\Package;
use App\Models\PackageUser;
use App\Repositories\interfaces\PackageUserRepositoryInterface;

class PackageUserController extends Controller
{
    /**
     * @var PackageUserRepositoryInterface
     */
    private $repository;

    public function __construct(PackageUserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexPackageUserRequest $request
     * @return PackageUserResourceCollection
     */
    public function index(IndexPackageUserRequest $request)
    {
//        $this->authorize('viewAny', SportType::class);
        $items = $this->repository->findBy($request->all());
        return new PackageUserResourceCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePackageUserRequest $request
     * @return PackageUserResource
     */
    public function store(StorePackageUserRequest $request)
    {
//        $item = $this->repository->save($request->all());
        $item = PackageUser::create($request->all());
        return new PackageUserResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param PackageUser $packageUser
     * @return PackageUserResource
     */
    public function show(PackageUser $packageUser)
    {
//        $this->authorize('view', SportType::class);
        $item = $this->repository->findOne($packageUser->id);
        return new PackageUserResource($item);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePackageUserRequest $request
     * @param PackageUser $packageUser
     * @return PackageUserResource
     */
    public function update(UpdatePackageUserRequest $request, PackageUser $packageUser)
    {
//        $this->authorize('update', SportType::class);
        $item = $this->repository->update($packageUser, $request->all());
        return new PackageUserResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PackageUser $packageUser
     * @return void
     */
    public function destroy(PackageUser $packageUser)
    {
//        $this->authorize('delete', SportType::class);
        $this->repository->delete($packageUser);
    }
}
