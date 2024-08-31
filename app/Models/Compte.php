<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'montant',
        'user_id',
        'description',
    ];

    public function rentres():HasMany
    {
        return $this->hasMany(Rentre::class);
    }

    public function achats():HasMany
    {
        return $this->hasMany(Achat::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}