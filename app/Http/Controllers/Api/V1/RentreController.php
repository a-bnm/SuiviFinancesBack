<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Rentre;
use App\Http\Requests\StoreRentreRequest;
use App\Http\Requests\UpdateRentreRequest;
use App\Http\Resources\RentreResource;
use App\Http\Controllers\Controller;

class RentreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RentreResource::collection(Rentre::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentreRequest $request)
    {
        $rentre = Rentre::create($request->validated());
        return new RentreResource($rentre);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rentre $rentre)
    {
        return new RentreResource(Rentre::findOrFail($rentre->id));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentreRequest $request, Rentre $rentre)
    {
        $rentre->update($request->validated());
        return new RentreResource($rentre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentre $rentre)
    {
        $rentre->delete();
        return RentreResource::collection(Rentre::all());
    }
}