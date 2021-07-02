<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'latitude',
        'longitude',
        'type_intervention_id',
        'fin_intervention_at',
        'nb_intervenant',
        'created_at',
        'updated_at',
    ];
}
