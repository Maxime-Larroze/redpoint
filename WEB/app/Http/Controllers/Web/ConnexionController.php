<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Passport\Authenticator as PassportAuthenticator;
use App\Models\Passport\PassportClient;
use App\Models\User;
use Carbon\Carbon;

class ConnexionController extends Controller
{
    public function Login(Request $request)
    {
        request()->validate([
            'identifiant' => 'required',
            'password' => 'required'
        ]);
        if ($request->remember == 'on') {
            $request->remember = true;
        } else {
            $request->remember = false;
        }
        if (Auth::attempt(['identifiant_unique' => $request->identifiant, 'password' => $request->password], $request->remember)) {
            Log::info("Connexion de l'utilisateur " . Auth::user()->id . " le " . Carbon::now());
            $user = Auth::user();
            $user->connecte = 1;
            $user->update();
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withError(['connexion' => 'Connexion impossible. Veuillez vérifier votre identifiant / mot de passe']);
    }

    public function Logout(Request $request)
    {
        $user = Auth::user();
        $user->connecte = 0;
        $user->update();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
