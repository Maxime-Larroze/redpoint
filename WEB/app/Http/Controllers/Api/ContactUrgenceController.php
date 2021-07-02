<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUrgence;
use Illuminate\Http\Request;

class ContactUrgenceController extends Controller
{
    public function index(Request $request)
    {
        return response(ContactUrgence::where('user_id', $request->user_id)->get());
    }

    public function show($id)
    {
        return response(ContactUrgence::find($id), 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'civilite' => 'required|boolean',
            'ville_id' => 'required',
        ]);
        ContactUrgence::create([
            'user_id' => $request->user_id,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'civilite' => $request->civilite,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
        ]);

        return response(ContactUrgence::where('user_id', $request->user_id)->get(), 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'contact_id' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'civilite' => 'required|boolean',
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

        return response(ContactUrgence::find($request->contact_id), 201);
    }

    public function destroy(Request $request)
    {
        $user_id = ContactUrgence::find($request->contact_id)->user_id;
        ContactUrgence::find($request->contact_id)->delete();
        return response(ContactUrgence::where('user_id', $user_id)->get(), 200);
    }
}
