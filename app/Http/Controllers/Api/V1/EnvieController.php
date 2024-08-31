<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Envie;
use App\Http\Requests\StoreEnvieRequest;
use App\Http\Requests\UpdateEnvieRequest;
use App\Http\Controllers\Controller;

class EnvieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EnvieResource::collection(Envie::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnvieRequest $request)
    {
        $envie = Envie::create($request->validated());

        return new EnvieResource($envie);
    }

    /**
     * Display the specified resource.
     */
    public function show(Envie $envie)
    {
        return new EnvieResource(Envie::findOrFail($envie->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnvieRequest $request, Envie $envie)
    {
        $envie->update($request->validated);
        return new EnvieResource($envie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Envie $envie)
    {
        $envie->delete();
        return EnvieResource::collection(Envie::all());
    }
}