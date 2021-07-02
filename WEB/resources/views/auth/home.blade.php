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

    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>

    <link href="{{ asset('CDN/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('CDN/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('CDN/jquery.min.js') }}"></script>
    <script src="{{ asset('CDN/popper.min.js') }}"></script>
    <script src="{{ asset('CDN/bootstrap.min.js') }}"></script>
    <script src="{{ asset('CDN/a076d05399.js') }}"></script>

    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <a class="navbar-brand text-danger" href="{{ route('dashboard') }}"><img width="150px"
                src="{{ asset('/Logos/logo_transparent.png') }}" alt="Logo redpoint"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('map') }}"><i class="fas fa-home"></i> Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i>
                        Tabbleau de bord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('interventions') }}"><i
                            class="fas fa-first-aid"></i>
                        Mes interventions</a>
                </li>
                @can('superAdmin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="" id="navbardrop" data-toggle="dropdown"><i
                                class="fas fa-tools"></i> Administration</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item text-white" href="{{ route('substances') }}"><i
                                    class="fas fa-capsules"></i> Substances</a>
                            <a class="dropdown-item text-white" href="{{ route('rayons') }}"><i
                                    class="fas fa-ruler-combined"></i> Rayons d'intervention</a>
                            <a class="dropdown-item text-white" href="{{ route('groupes_sanguins') }}"><i
                                    class="fas fa-heartbeat"></i> Groupes sanguins</a>
                            <a class="dropdown-item text-white" href="{{ route('droits') }}"><i
                                    class="fas fa-balance-scale-right"></i> Gestion des droits</a>
                            <a class="dropdown-item text-white" href="{{ route('allergie_alimentaire') }}"><i
                                    class="fas fa-utensils"></i> Allergies alimentaire</a>
                            <a class="dropdown-item text-white" href="{{ route('allergie_medicamenteuse') }}"><i
                                    class="fas fa-tablets"></i> Allergies médicamenteuses</a>
                        </div>
                    </li>

                    {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="" id="navbardrop" data-toggle="dropdown"><i class="fas fa-tools"></i> Centre de gestion</a>
                    <div class="dropdown-menu bg-dark">
                      <a class="dropdown-item text-white" href="{{route('substances')}}"><i class="fas fa-capsules"></i> Substances</a>
                      <a class="dropdown-item text-white" href="{{route('rayons')}}"><i class="fas fa-ruler-combined"></i> Rayons d'intervention</a>
                      <a class="dropdown-item text-white" href="{{route('groupes_sanguins')}}"><i class="fas fa-heartbeat"></i> Groupes sanguins</a>
                      <a class="dropdown-item text-white" href="{{route('droits')}}"><i class="fas fa-balance-scale-right"></i> Gestion des droits</a>
                      <a class="dropdown-item text-white" href="{{route('allergie_alimentaire')}}"><i class="fas fa-utensils"></i> Allergies alimentaire</a>
                      <a class="dropdown-item text-white" href="{{route('allergie_medicamenteuse')}}"><i class="fas fa-tablets"></i> Allergies médicamenteuses</a>
                    </div>
                  </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="" id="navbardrop" data-toggle="dropdown"><i
                                class="fas fa-cog"></i> Systèmes</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item text-white" href="{{ route('versions') }}"><i
                                    class="fas fa-code-branch"></i> Version de l'application</a>
                            <a class="dropdown-item text-white" href="{{ route('users') }}"><i class="fas fa-users"></i>
                                Gestion des utilisateurs</a>
                            <a class="dropdown-item text-white" href="{{ route('types.show') }}"><i
                                    class="fas fa-exclamation-triangle"></i>
                                Gestion des types d'interventions</a>
                        </div>
                    </li>
                @endcan
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="" id="navbardrop" data-toggle="dropdown"><i
                            class="fas fa-info-circle"></i> Informations</a>
                    <div class="dropdown-menu bg-dark">
                        <a class="dropdown-item text-white" href="{{ route('contacts.show') }}"><i
                                class="fas fa-ambulance"></i> Contact d'urgence </a>
                    </div>
                </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-portrait"></i> {{ $user->prenom }} {{ $user->nom }}
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('profil') }}"><i class="fas fa-user"></i> Mon
                                profil</a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                    class="fas fa-power-off"></i> Déconnexion</a>
                        </div>
                    </li>
                </ul>
            </span>
        </div>
    </nav>

    <div class="container mt-5"> <br></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-3">
                    @yield('auth.profil.interface.update')
                    @yield('auth.administration.substance.view')
                    @yield('auth.administration.rayon.view')
                    @yield('auth.administration.groupe-sanguin.view')
                    @yield('auth.administration.droit.view')
                    @yield('auth.administration.allergie-alimentaire.view')
                    @yield('auth.administration.allergie-medicament.view')
                    @yield('auth.administration.version.view')
                    @yield('auth.intervention.type.interface.view')
                    @yield('auth.contact.interface.view')

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div>
            @yield('auth.intervention.interface.view')
            @yield('auth.dashboard.interface.view')
            @yield('auth.map.interface.view')
            @yield('auth.system.user.view')
        </div>
    </div>

    <div class="text-center bg-dark fixed-bottom text-white">
        <p class="mt-2">Version {{ $last_version->libelle }} ({{ $last_version->numero }})</p>
        <p class="mt-2">Copyright 2021 &copy; Hackenathon-System - <a href="{{ route('api.informations') }}">API
                Informations</a> - <a href="{{ route('mobile.presentation') }}">Application Mobile</a></p>
    </div>
    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }}
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
