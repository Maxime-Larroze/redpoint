<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUrgence extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'email',
        'telephone',
        'nom',
        'prenom',
        'civilite',
        'adresse',
        'ville_id',
        'created_at',
        'updated_at',
    ];
}
