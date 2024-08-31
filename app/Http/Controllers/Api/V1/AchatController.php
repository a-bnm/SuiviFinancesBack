<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Achat;
use App\Http\Requests\StoreAchatRequest;
use App\Http\Requests\UpdateAchatRequest;
use App\Http\Resources\AchatResource;
use App\Http\Controllers\Controller;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AchatResource::collection(Achat::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAchatRequest $request)
    {
        $achat = Achat::create($request->validated());
        return new AchatResource($achat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achat $achat)
    {
        return new AchatResource(Achat::findOrFail($achat->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAchatRequest $request, Achat $achat)
    {
        $achat->update($request->validated());
        return new AchatResource($achat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achat $achat)
    {
        $achat->delete();
        return  AchatResource::collection(Achat::all());
    }
}