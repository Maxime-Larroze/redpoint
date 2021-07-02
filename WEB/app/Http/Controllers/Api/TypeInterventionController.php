<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeIntervention;

class TypeInterventionController extends Controller
{
    public function index()
    {
        return response(TypeIntervention::all());
    }

    public function show($id)
    {
        return response(TypeIntervention::find($id));
    }
}
