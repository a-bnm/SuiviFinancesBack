<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Envie extends Model
{
    use HasFactory;

    protected $fillable = [
        'desigantion',
        'cout',
        'cout_rassemble',
        'cout_restant',
        'user_id',
        'description',
    ];    
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}