<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Compte;
use App\Http\Requests\StoreCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use App\Http\Resources\CompteResource;
use App\Http\Controllers\Controller;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompteResource::collection(Compte::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompteRequest $request)
    {
        $compte = Compte::create($request->validated());
        return response()->json(["message" => "Votre compte a été créé avec succés" ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compte $compte)
    {
        return new CompteResource(Compte::findOrFail($compte->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompteRequest $request, Compte $compte)
    {
        $compte->update($request->validated());
        return response()->json(["message" => "Compte modifié avec succés" ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte)
    {
        $deleted = $compte->delete();
        if($deleted){
            return response()->json(["message" => "le compte a été supprimé avec succés" ]);
        }
    }
}