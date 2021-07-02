<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RayonIntervention;
use Illuminate\Support\Facades\Auth;

class RayonController extends Controller
{
    public function findAll()
    {
        return RayonIntervention::all();
    }

    public function find(Request $request)
    {
        return RayonIntervention::find($request->rayon_id);
    }

    public function create(Request $request)
    {
        $rayon = new RayonIntervention();
        $rayon->libelle = $request->libelle;
        $rayon->rayon = $request->rayon;
        $rayon->save();
        return redirect()->route('rayons');
    }

    public function update(Request $request)
    {
        $rayon = RayonIntervention::find($request->rayon_id);
        $rayon->libelle = $request->libelle;
        $rayon->rayon = $request->rayon;
        $rayon->update();
        return redirect()->route('rayons');
    }

    public function showRayons()
    {
        $user = Auth::user();
        $rayons = RayonIntervention::all();
        return view('auth.administration.rayon', ['user' => $user, 'rayons' => $rayons]);
    }

    public function delete(Request $request)
    {
        $rayon = RayonIntervention::find($request->rayon_id);
        $rayon->delete();
        return redirect()->route('rayons');
    }
}
