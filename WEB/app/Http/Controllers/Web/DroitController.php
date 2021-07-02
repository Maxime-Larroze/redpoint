<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Droit;
use Illuminate\Support\Facades\Auth;

class DroitController extends Controller
{
    public function findAll()
    {
        return Droit::all();
    }

    public function find(Request $request)
    {
        return Droit::find($request->droit_id);
    }

    public function create(Request $request)
    {
        $droit = new Droit();
        $droit->libelle = $request->libelle;
        $droit->save();
        return redirect()->route('droits');
    }

    public function update(Request $request)
    {
        $droit = Droit::find($request->droit_id);
        $droit->libelle = $request->libelle;
        $droit->update();
        return redirect()->route('droits');
    }

    public function showDroits()
    {
        $user = Auth::user();
        $droits = Droit::all();
        return view('auth.administration.droit', ['user' => $user, 'droits' => $droits]);
    }

    public function delete(Request $request)
    {
        $droit = Droit::find($request->droit_id);
        $droit->delete();
        return redirect()->route('droits');
    }
}
