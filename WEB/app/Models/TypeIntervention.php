<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeIntervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'couleur',
        'created_at',
        'updated_at',
    ];
}
