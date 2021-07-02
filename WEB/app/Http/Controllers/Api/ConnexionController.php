<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class ConnexionController extends Controller
{
    public function Login(Request $request)
    {
        // $request->validate([
        //     'identifiant' => 'identifiant',
        //     'password' => 'password'
        // ]);
        if ($request->remember == 'on') {
            $request->remember = true;
        } else {
            $request->remember = false;
        }
        if (Auth::attempt(['identifiant_unique' => $request->identifiant, 'password' => $request->password], $request->remember)) {
            Log::info("Connexion de l'utilisateur " . Auth::user()->id . " le " . Carbon::now() . " sur mobile");
            $user = User::find(Auth::user()->id);
            $token = $user->createToken('token api - utilisateur_id ' . $user->ID)->accessToken;
            // $token = $user->createToken('token api - utilisateur_id ' . $user->ID)->plainTextToken;
            return response([Auth::user(), 'Token' => $token], 200);
        } else {
            return response(['message' => "Connexion impossible. Veuillez vérifier votre identifiant / mot de passe", 'error' => 404], 404);
        }
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return response("Utilisateur déconnecté", 200);
    }

    public function Logo(Request $request)
    {
        $logo['url'] = "http://" . $request->getHttpHost() . "/Logos/logo_transparent.png";
        return response($logo, 200);
    }

    public function informations()
    {
        return view('public.information');
    }

    public function renewToken(Request $request)
    {
        $user = User::find($request->user_id);
        $user->tokens()->delete();
        $token = $user->createToken('token api - utilisateur_id ' . $user->ID)->accessToken;
        // $refreshTokenRepository = app(RefreshTokenRepository::class);
        // $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($request->token_id);
        Auth::loginUsingId($request->user_id);
        return response([Auth::user(), 'Token' => $token], 200);
    }
}
