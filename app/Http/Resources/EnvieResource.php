<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnvieResource extends JsonResource
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
            'designation' => $this->designation,
            'cout' => $this->cout,
            'cout_rassemble' => $this->cout_rassemble,
            'cout_restant' => $this->cout_restant,
            'user_id' => $this->user_id,
            'description' => $this->description,
        ];
    }
}