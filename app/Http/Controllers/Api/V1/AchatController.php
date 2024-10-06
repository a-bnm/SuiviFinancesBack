<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Achat;
use App\Models\Compte;
use App\Http\Requests\StoreAchatRequest;
use App\Http\Requests\UpdateAchatRequest;
use App\Http\Resources\AchatResource;
use App\Http\Controllers\Controller;
use Auth;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes_id = Compte::select('id')
            ->where('user_id',Auth::user()->id)
            ->pluck('id');

        $achats = Achat::whereIn('compte_id',$comptes_id)->get();
        return AchatResource::collection($achats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAchatRequest $request)
    {
        $achat = Achat::create($request->validated());
        
        //Mise à jour du compte
        $compte = Compte::where('id',$achat->compte_id)->get()->first();
        $compte->update([
            "montant" => $compte->montant - $achat->montant,
        ]);
        
        return response()->json(["message" => "Votre achat a été créé avec succés" ]);
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
        $oldMontant = $achat->montant;
        $achat->update($request->validated());
        //Mise à jour du compte
        $compte = Compte::where('id',$achat->compte_id)->get()->first();
        $compte->update([
            "montant" => $compte->montant + $oldMontant - $achat->montant,
        ]);
        
        return response()->json(["message" => "Votre achat a été mis à jour avec succés" ]);
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