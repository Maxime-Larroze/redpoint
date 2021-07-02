<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactUrgence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUrgenceController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $contacts = ContactUrgence::where('user_id', Auth::user()->id)->get();
        return view('auth.contacts.interface', ['contacts' => $contacts, 'user' => $user]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'telephone' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'civilite' => 'required',
            'adresse' => 'required',
            'ville_id' => 'required',
        ]);

        ContactUrgence::create([
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'civilite' => $request->civilite,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('contacts.show')->withErrors(['success' => "Votre contact d'urgence à bien été créé"]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'telephone' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'civilite' => 'required',
            'adresse' => 'required',
            'ville_id' => 'required',
        ]);

        ContactUrgence::find($request->contact_id)->update([
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'civilite' => $request->civilite,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
        ]);
        return redirect()->route('contacts.show')->withErrors(['success' => "Votre contact d'urgence à bien été modifié"]);
    }

    public function destroy(Request $request)
    {
        ContactUrgence::find($request->contact_id)->delete();
        return redirect()->route('contacts.show');
    }
}
