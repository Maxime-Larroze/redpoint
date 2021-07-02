<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutIntervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'intervention_id',
        'intervention_ack',
        'debut_intervention_at',
        'fin_intervention_at',
        'commentaire',
        'created_at',
        'updated_at',
    ];
}
