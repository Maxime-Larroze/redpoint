<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'certification_id',
        'justificatif',
        'created_at',
        'updated_at',
    ];
}
