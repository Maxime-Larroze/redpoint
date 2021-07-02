<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'code_postal_id',
        'created_at',
        'updated_at',
    ];
}
