<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#563d7c">
    <meta name="author" content="Maxime LARROZE-FRANCEZAT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RED Point</title>
    <link rel="apple-touch-icon" href="{{ asset('/Logos/logo_transparent.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('/Logos/logo_transparent.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('/Logos/logo_transparent.png') }}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{ asset('/Logos/logo_transparent.png') }}">

    <link href="{{ asset('CDN/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('CDN/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('CDN/jquery.min.js') }}"></script>
    <script src="{{ asset('CDN/popper.min.js') }}"></script>
    <script src="{{ asset('CDN/bootstrap.min.js') }}"></script>
    <script src="{{ asset('CDN/a076d05399.js') }}"></script>
</head>

<body class="antialiased">
    <div class="jumbotron text-center" style="margin-bottom:0">
        <img src="{{ asset('/Logos/logo_transparent.png') }}" class="img-fluid img" alt="logo redpoint">
    </div>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <a class="navbar-brand text-danger" href="{{ route('mobile.presentation') }}">Redpoint</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mobile.presentation') }}">Présentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('application.instruction') }}">Instructions d'utilisation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">-</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mobile.android') }}">Application Android</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mobile.ios') }}">Application Ios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">-</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('api.informations') }}">Information API</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            @yield('public.mobile.presentation.view')
            @yield('public.mobile.application-ios.view')
            @yield('public.mobile.application-android.view')
        </div>
    </div>

    <div
        class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border card rounded-lg shadow-lg text-center mt-5 bg-dark">
        <footer class="text-white">
            <p class="mt-2">Version {{ $last_version->libelle }} ({{ $last_version->numero }})</p>
            <p class="mt-2">Copyright 2021 &copy; Hackenathon-System</p>
        </footer>
    </div>

</body>

</html>
