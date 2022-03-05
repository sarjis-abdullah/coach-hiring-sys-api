<?php

namespace App\Http\Controllers;

use App\Models\SportType;
use App\Http\Requests\StoreSportTypeRequest;
use App\Http\Requests\UpdateSportTypeRequest;

class SportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSportTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSportTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SportType  $sportType
     * @return \Illuminate\Http\Response
     */
    public function show(SportType $sportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SportType  $sportType
     * @return \Illuminate\Http\Response
     */
    public function edit(SportType $sportType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSportTypeRequest  $request
     * @param  \App\Models\SportType  $sportType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSportTypeRequest $request, SportType $sportType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SportType  $sportType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportType $sportType)
    {
        //
    }
}
