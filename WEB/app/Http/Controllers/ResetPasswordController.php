<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class ResetPasswordController extends Controller
{
    public function showResetPassword()
    {
        return view('public.reset');
    }

    public function reset(Request $request)
    {
        $this->validateCredentialsRequest($request);
        $user = User::Where('identifiant_unique', '=', $request->identifiant)->where('email', '=', $request->email)->firstOrFail();
        $tempory_password = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-', 3)), 0, 30);
        $mail = Mail::to($user->email)->queue(new ResetPasswordMail($user, $tempory_password));
        return redirect()->route('password')->withErrors(['success_reset' => 'Mot de passe provisoir envoyé par email !']);
    }

    protected function validateCredentialsRequest(Request $request)
    {
        $this->validate($request, [
            'identifiant' => 'required|exists:users,identifiant_unique',
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Email introuvable. Veuillez vérifier votre email',
            'identifiant.exists' => 'Identifiant introuvable. Veuillez vérifier votre identifiant'
        ]);
    }
}
