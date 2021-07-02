<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'created_at',
        'updated_at',
    ];
}
