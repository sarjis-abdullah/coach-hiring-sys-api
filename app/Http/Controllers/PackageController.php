<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPackageRequest;
use App\Http\Resources\PackageResource;
use App\Http\Resources\PackageResourceCollection;
use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Repositories\interfaces\PackageRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;

class PackageController extends Controller
{
    /**
     * @var PackageRepositoryInterface
     */
    private $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexPackageRequest $request
     * @return PackageResourceCollection
     * @throws AuthorizationException
     */
    public function index(IndexPackageRequest $request)
    {
        $this->authorize('viewAny', Package::class);
        $items = $this->packageRepository->findBy($request->all());
        return new PackageResourceCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePackageRequest $request
     * @return PackageResource
     * @throws AuthorizationException
     */
    public function store(StorePackageRequest $request)
    {
        $this->authorize('create', Package::class);
        $item = $this->packageRepository->save($request->all());
        return new PackageResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return PackageResource
     * @throws AuthorizationException
     */
    public function show(Package $package)
    {
        $this->authorize('view', Package::class);
        $item = $this->packageRepository->findOne($package->id);
        return new PackageResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePackageRequest $request
     * @param Package $package
     * @return PackageResource
     * @throws AuthorizationException
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $this->authorize('update', Package::class);
        $item = $this->packageRepository->update($package, $request->all());
        return new PackageResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(Package $package)
    {
        $this->authorize('delete', Package::class);
        $this->packageRepository->delete($package);
    }
}
