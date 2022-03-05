<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexSportTypeRequest;
use App\Http\Resources\SportTypeResource;
use App\Http\Resources\SportTypeResourceCollection;
use App\Models\SportType;
use App\Http\Requests\StoreSportTypeRequest;
use App\Http\Requests\UpdateSportTypeRequest;
use App\Repositories\interfaces\SportTypeRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;

class SportTypeController extends Controller
{
    /**
     * @var SportTypeRepositoryInterface
     */
    private $typeRepository;

    public function __construct(SportTypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexSportTypeRequest $request
     * @return SportTypeResourceCollection
     * @throws AuthorizationException
     */
    public function index(IndexSportTypeRequest $request)
    {
        $this->authorize('list', SportType::class);
        $items = $this->typeRepository->findBy($request->all());
        return new SportTypeResourceCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSportTypeRequest $request
     * @return SportTypeResource
     */
    public function store(StoreSportTypeRequest $request)
    {
        $item = $this->typeRepository->save($request->all());
        return new SportTypeResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param SportType $sportType
     * @return SportTypeResource
     */
    public function show(SportType $sportType)
    {
        $item = $this->typeRepository->findOne($sportType->id);
        return new SportTypeResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSportTypeRequest $request
     * @param SportType $sportType
     * @return SportTypeResource
     */
    public function update(UpdateSportTypeRequest $request, SportType $sportType)
    {
        $item = $this->typeRepository->update($sportType, $request->all());
        return new SportTypeResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SportType $sportType
     * @return void
     */
    public function destroy(SportType $sportType)
    {
        $this->typeRepository->delete($sportType);
    }
}
