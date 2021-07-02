<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAlimentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'allergie_alimentaire_id',
        'created_at',
        'updated_at',
    ];
}
