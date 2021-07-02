<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllergieAlimentaire;
use Illuminate\Support\Facades\Auth;

class AllergieAlimentaireController extends Controller
{
    public function findAll()
    {
        return AllergieAlimentaire::all();
    }

    public function find(Request $request)
    {
        return AllergieAlimentaire::find($request->allergie_id);
    }

    public function create(Request $request)
    {
        $allergie = new AllergieAlimentaire();
        $allergie->libelle = $request->libelle;
        $allergie->save();
        return redirect()->route('allergie_alimentaire');
    }

    public function update(Request $request)
    {
        $allergie = AllergieAlimentaire::find($request->allergie_id);
        $allergie->libelle = $request->libelle;
        $allergie->update();
        return redirect()->route('allergie_alimentaire');
    }

    public function showDroits()
    {
        $user = Auth::user();
        $allergies = AllergieAlimentaire::all();
        return view('auth.administration.allergie-alimentaire', ['user' => $user, 'allergies' => $allergies]);
    }

    public function delete(Request $request)
    {
        $allergie = AllergieAlimentaire::find($request->allergie_id);
        $allergie->delete();
        return redirect()->route('allergie_alimentaire');
    }
}
