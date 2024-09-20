<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Rentre;
use App\Models\Compte;
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
        $request->validated();

        $rentre = Rentre::create([
            "source" => $request->source,
            "montant" => $request->montant,
            "compte_id" => $request->compte_id
        ]);

        //Mise à jour du compte
        $compte = Compte::where('id',$rentre->compte_id)->get()->first();
        $compte->update([
            "montant" => $compte->montant + $rentre->montant,
        ]);

        return response()->json(["message" => "Votre rentrée d'argent a été créé avec succés" ]);
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
        $request->validated();

        $oldMontant = $rentre->montant;
        
        $rentre->update([
            "source" => $request->source,
            "montant" => $request->montant,
            //"compte_id" => $request->compte_id
        ]);

        //Mise à jour du compte
        $compte = Compte::where('id',$rentre->compte_id)->get()->first();
        $compte->update([
            "montant" => $compte->montant - $oldMontant + $rentre->montant,
        ]);
        return response()->json(["message" => "Votre rentrée d'argent a été modifié avec succés" ]);
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