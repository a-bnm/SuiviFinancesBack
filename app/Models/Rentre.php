<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rentre extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
        'montant',
        'compte_id',
    ];

    public function compte():BelongsTo
    {
        return $this->belongsTo(Compte::class);
    }
}