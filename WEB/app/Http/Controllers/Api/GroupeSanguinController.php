<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GroupeSanguin;
use Illuminate\Http\Request;

class GroupeSanguinController extends Controller
{
    public function index()
    {
        return response(GroupeSanguin::all());
    }
}
