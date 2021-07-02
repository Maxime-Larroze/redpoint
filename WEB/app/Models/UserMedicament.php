<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMedicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'medicament_id',
        'created_at',
        'updated_at',
    ];
}
