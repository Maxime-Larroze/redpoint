<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DossierMedical;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignInMail;

class SignInController extends Controller
{
    public function createNewAccount(Request $request)
    {
        $dossier = new DossierMedical();
        $dossier->commentaire = "/";
        $dossier->save();
        $this->validateCredentialsRequest($request);
        $tempory_password = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-', 3)), 0, 50);
        $user = new User;
        $user->identifiant_unique = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 3)), 0, 12);
        $user->civilite = $request->civilite;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->ville_id = $request->ville_id;
        $user->password = bcrypt($tempory_password);
        $user->droit_id = 3;
        $user->rayon_intervention_id = 3;
        $user->dossier_id = $dossier->id;
        $user->save();
        $usercontroller = new UserController();
        $usercontroller->resendEmail($user->id);
        $mail = Mail::to($user->email)->queue(new SignInMail($user, $tempory_password));
        return redirect()->route('login')->withErrors(['nouveau_compte' => 'Votre compte à bien été créé. Vérifiez vos mails pour récupérer vos informations de connexion']);
    }

    protected function validateCredentialsRequest(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|min:4',
            'prenom' => 'required|min:4',
            'email' => 'required|email|min:8',
        ], [
            'email.email' => 'Veuillez renseigner une adresse email correcte',
            'nom.require' => 'Veuillez remplir le champ Nom',
            'prenom.require' => 'Veuillez remplir le champ Prénom',
        ]);
    }
}
