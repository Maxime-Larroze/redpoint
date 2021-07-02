<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sport',
        'commentaire',
        'groupe_sanguin_id',
        'created_at',
        'updated_at',
    ];
}
