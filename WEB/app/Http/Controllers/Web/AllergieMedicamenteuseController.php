<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllergieMedicament;
use Illuminate\Support\Facades\Auth;

class AllergieMedicamenteuseController extends Controller
{
    public function findAll()
    {
        return AllergieMedicament::all();
    }

    public function find(Request $request)
    {
        return AllergieMedicament::find($request->allergie_id);
    }

    public function create(Request $request)
    {
        $allergie = new AllergieMedicament();
        $allergie->libelle = $request->libelle;
        $allergie->save();
        return redirect()->route('allergie_medicamenteuse');
    }

    public function update(Request $request)
    {
        $allergie = AllergieMedicament::find($request->allergie_id);
        $allergie->libelle = $request->libelle;
        $allergie->update();
        return redirect()->route('allergie_medicamenteuse');
    }

    public function showDroits()
    {
        $user = Auth::user();
        $allergies = AllergieMedicament::all();
        return view('auth.administration.allergie-medicament', ['user' => $user, 'allergies' => $allergies]);
    }

    public function delete(Request $request)
    {
        $allergie = AllergieMedicament::find($request->allergie_id);
        $allergie->delete();
        return redirect()->route('allergie_medicamenteuse');
    }
}
