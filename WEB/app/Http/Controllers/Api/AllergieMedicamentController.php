<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AllergieMedicament;
use Illuminate\Http\Request;

class AllergieMedicamentController extends Controller
{
    public function index()
    {
        return response(AllergieMedicament::all());
    }

    public function find($id)
    {
        return response(AllergieMedicament::find($id));
    }

    public function create(Request $request)
    {
        $allergie = AllergieMedicament::create([
            'libelle' => $request->libelle,
        ]);
        return response(AllergieMedicament::where('libelle', $request->libelle)->first());
    }

    public function update(Request $request)
    {
        AllergieMedicament::find($request->id)->update([
            'libelle' => $request->libelle,
        ]);
        return response(AllergieMedicament::find($request->id));
    }

    public function destroy(Request $request)
    {
        return response(AllergieMedicament::find($request->id)->delete());
    }
}
