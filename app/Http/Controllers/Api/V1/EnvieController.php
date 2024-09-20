<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Envie;
use App\Http\Requests\StoreEnvieRequest;
use App\Http\Requests\UpdateEnvieRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\EnvieResource;

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
        $request->validated();

        $cout_restant = $request->cout - $request->cout_rassemble;
        $envie = Envie::create([
            'designation' => $request->designation,
            'cout' => $request->cout,
            'cout_rassemble' => $request->cout_rassemble,
            'cout_restant' => $cout_restant,
            'user_id' => $request->user_id,
            'description' => $request->description,
        ]);

        return response()->json(["message" => "Votre envie a été créé avec succés" ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Envie $envy)
    {
        return new EnvieResource(Envie::findOrFail($envy->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnvieRequest $request, Envie $envy)
    {
        $request->validated();

        $cout_restant = $request->cout - $request->cout_rassemble;
        $envy->update([
            'designation' => $request->designation,
            'cout' => $request->cout,
            'cout_rassemble' => $request->cout_rassemble,
            'cout_restant' => $cout_restant,
            'description' => $request->description,
        ]);

        return response()->json(["message" => "Votre envie a été modifié avec succés" ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Envie $envy)
    {
        $envy->delete();
        return EnvieResource::collection(Envie::all());
    }
}