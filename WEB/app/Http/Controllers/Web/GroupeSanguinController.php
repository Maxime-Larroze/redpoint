<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupeSanguin;
use Illuminate\Support\Facades\Auth;

class GroupeSanguinController extends Controller
{
    public function findAll()
    {
        return GroupeSanguin::all();
    }

    public function find(Request $request)
    {
        return GroupeSanguin::find($request->gsanguin_id);
    }

    public function create(Request $request)
    {
        $groupe = new GroupeSanguin();
        $groupe->libelle = $request->libelle;
        $groupe->save();
        return redirect()->route('groupes_sanguins');
    }

    public function update(Request $request)
    {
        $groupe = GroupeSanguin::find($request->gsanguin_id);
        $groupe->libelle = $request->libelle;
        $groupe->update();
        return redirect()->route('groupes_sanguins');
    }

    public function showGroupes()
    {
        $user = Auth::user();
        $groupe_sanguins = GroupeSanguin::all();
        return view('auth.administration.groupe-sanguin', ['user' => $user, 'groupe_sanguins' => $groupe_sanguins]);
    }

    public function delete(Request $request)
    {
        $groupe = GroupeSanguin::find($request->gsanguin_id);
        $groupe->delete();
        return redirect()->route('groupes_sanguins');
    }
}
