<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Substance;
use Illuminate\Support\Facades\Auth;

class SubstanceController extends Controller
{
    public function findAll()
    {
        return Substance::all();
    }

    public function find(Request $request)
    {
        return Substance::find($request->substance_id);
    }

    public function create(Request $request)
    {
        $substance = new Substance();
        $substance->libelle = $request->libelle;
        $substance->save();
        return redirect()->route('substances');
    }

    public function update(Request $request)
    {
        $substance = Substance::find($request->substance_id);
        $substance->libelle = $request->libelle;
        $substance->update();
        return redirect()->route('substances');
    }

    public function showSubstances()
    {
        $user = Auth::user();
        $substances = Substance::all();
        return view('auth.administration.substance', ['user' => $user, 'substances' => $substances]);
    }

    public function delete(Request $request)
    {
        $substance = Substance::find($request->substance_id);
        $substance->delete();
        return redirect()->route('substances');
    }
}
