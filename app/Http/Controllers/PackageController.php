<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Http\Resources\PackageResourceCollection;
use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Http\Response;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PackageResourceCollection
     */
    public function index()
    {
        $items = [];
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
        $item = [];
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
        return new PackageResource($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param Package $package
     * @return Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        return new PackageResource($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return void
     */
    public function destroy(Package $package)
    {
        $package->delete();
    }
}
