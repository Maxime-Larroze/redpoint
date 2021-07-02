<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeIntervention;
use Illuminate\Support\Facades\Auth;

class TypeInterventionController extends Controller
{
    public function findAll()
    {
        return TypeIntervention::all();
    }

    public function findById($id)
    {
        return TypeIntervention::find($id);
    }

    public function show()
    {
        $user = Auth::user();
        $types = TypeIntervention::all();
        return view('auth.intervention.type.interface', ['user' => $user, 'types' => $types]);
    }

    public function create(Request $request)
    {
        TypeIntervention::create([
            'libelle' => $request->libelle,
            'couleur' => $request->couleur,
        ]);
        return redirect()->route('types.show');
    }

    public function update(Request $request)
    {
        TypeIntervention::find($request->type_id)->update([
            'libelle' => $request->libelle,
            'couleur' => $request->couleur,
        ]);
        return redirect()->route('types.show');
    }

    public function destroy(Request $request)
    {
        TypeIntervention::find($request->type_id)->delete();
        return redirect()->route('types.show');
    }
}
