<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'compte_id',
        'montant',
        'libelle'
    ];

   /* public function categorie():BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function compte():BelongsTo
    {
        return $this->belongsTo(Compte::class);
    }*/
}