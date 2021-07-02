<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ville;
use App\Models\RayonIntervention;

class AuthController extends Controller
{
    public function showProfil()
    {
        $user = Auth::user();
        $villes = Ville::all();
        $rayons = RayonIntervention::all();
        return view('auth.profil.interface', ['user'=>$user, 'villes'=>$villes, 'rayons'=>$rayons]);
    }
}
