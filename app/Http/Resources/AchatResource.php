<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'categorie_id' => $this->categorie_id,
            'compte_id' => $this->compte_id,
            'montant' => $this->montant,
            'libelle' => $this->libelle
        ];
    }
}