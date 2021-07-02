<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NotifyPasswordChange;
use App\Models\Passport\Authenticator as PassportAuthenticator;
use App\Models\Passport\PassportClient;
use App\Models\User;
use App\Models\DossierMedical;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function updateProfil(Request $request)
    {
        $user = Auth::user();
        $user->civilite = $request->civilite;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->ville_id = $request->ville_id;
        $user->rayon_intervention_id = $request->rayon_intervention_id;
        if ($request->mdp1 == $request->mdp2 && !empty($request->mdp1) && !empty($request->mdp2)) {
            $user->password = bcrypt($request->mdp1);
            Mail::to($user->email)->queue(new NotifyPasswordChange($user));
        }
        $user->update();
        return redirect()->route('profil.update')->withErrors(['success_update' => 'Votre profil à bien été mis à jour']);
    }

    public function showUsers()
    {
        $users = User::all();
        $user = Auth::user();
        $droits = app('App\Http\Controllers\Web\DroitController')->findAll();
        return view('auth.system.user', ['user' => $user, 'users' => $users, 'droits' => $droits]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->libelle = $request->libelle;
        $user->numero = $request->numero;
        $user->update();
        return redirect()->route('users');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        return redirect()->route('users');
    }

    public function shadowban(Request $request)
    {
        $user = User::find($request->user_id);
        $user->shadowban = Carbon::now();
        $user->update();
        return redirect()->route('users');
    }

    public function deshadowban(Request $request)
    {
        $user = User::find($request->user_id);
        $user->shadowban = null;
        $user->update();
        return redirect()->route('users');
    }

    public function disponible(Request $request)
    {
        $user = User::find($request->user_id);
        $user->disponible = 1;
        $user->update();
        return redirect()->route('users');
    }

    public function indisponible(Request $request)
    {
        $user = User::find($request->user_id);
        $user->disponible = 0;
        $user->update();
        return redirect()->route('users');
    }

    public function droit(Request $request)
    {
        $user = User::find($request->user_id);
        $user->droit_id = $request->droit_id;
        $user->update();
        return redirect()->route('users');
    }

    public function resendEmail($id)
    {
        $user = User::find($id);
        $user->sendEmailVerificationNotification();
    }
}
