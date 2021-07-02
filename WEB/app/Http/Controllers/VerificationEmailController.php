<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Models\User;

class VerificationEmailController extends Controller
{
    public function verify($user_id, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return response()->json(["msg" => "Invalid/Expired url provided."], 401);
        }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->route('profil')->withErrors(['SendVerification' => 'Un email de vérification de votre adresse email à bien été envoyé.']);
    }

    public function resend()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('users')->withErrors(['SendVerification' => 'Votre email à déjà été vérifié.'], 400);
        }

        auth()->user()->sendEmailVerificationNotification();

        // return response()->json(["msg" => "Email verification link sent on your email id"]);
        return redirect()->route('users')->withErrors(['SendVerification' => 'Un email de vérification de votre adresse email à bien été envoyé.']);
    }
}
