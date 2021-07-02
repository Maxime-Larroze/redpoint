<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ville;

class PublicController extends Controller
{
    public function showRegister()
    {
        $villes = Ville::all();
        return view('public.register', ['villes' => $villes]);
    }

    public function presentationMobile()
    {
        return view('public.mobile.presentation');
    }

    public function applicationAndroid()
    {
        return view('public.mobile.application-android');
    }

    public function applicationIos()
    {
        return view('public.mobile.application-ios');
    }

    public function instruction()
    {
        return view('public.mobile.instruction');
    }
}
