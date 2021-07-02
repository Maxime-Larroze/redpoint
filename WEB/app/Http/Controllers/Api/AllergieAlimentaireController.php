<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AllergieAlimentaire;
use Illuminate\Http\Request;

class AllergieAlimentaireController extends Controller
{
    public function index()
    {
        return response(AllergieAlimentaire::all());
    }

    public function find($id)
    {
        return response(AllergieAlimentaire::find($id));
    }

    public function create(Request $request)
    {
        $allergie = AllergieAlimentaire::create([
            'libelle' => $request->libelle,
        ]);
        return response(AllergieAlimentaire::where('libelle', $request->libelle)->first());
    }

    public function update(Request $request)
    {
        AllergieAlimentaire::find($request->id)->update([
            'libelle' => $request->libelle,
        ]);
        return response(AllergieAlimentaire::find($request->id));
    }

    public function destroy(Request $request)
    {
        return response(AllergieAlimentaire::find($request->id)->delete());
    }
}
