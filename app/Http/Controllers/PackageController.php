<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPackageRequest;
use App\Http\Resources\PackageResource;
use App\Http\Resources\PackageResourceCollection;
use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Repositories\interfaces\PackageRepositoryInterface;
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
     */
    public function index(IndexPackageRequest $request)
    {
        $items = $this->packageRepository->findBy($request->all());
        return new PackageResourceCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePackageRequest $request
     * @return PackageResource
     */
    public function store(StorePackageRequest $request)
    {
        $item = $this->packageRepository->save($request->all());
        return new PackageResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return PackageResource
     */
    public function show(Package $package)
    {
        $item = $this->packageRepository->findOne($package->id);
        return new PackageResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePackageRequest $request
     * @param Package $package
     * @return PackageResource
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $item = $this->packageRepository->update($package, $request->all());
        return new PackageResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return void
     */
    public function destroy(Package $package)
    {
        $this->packageRepository->delete($package);
    }
}
