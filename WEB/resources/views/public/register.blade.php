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
    <div class="mt-5 container">
        <div class="mt-5 row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 text-center mt-5 border card rounded-lg shadow-lg" id="content-card">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <img src="{{ asset('/Logos/logo_transparent.png') }}" alt="Logo"
                        class="img-fluid mx-auto d-block mt-5" width="30%">
                    <h5 class="font-italic mt-3">REDPOINT Emergency</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr class="solid">
                        </div>
                        <div class="mt-3 col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="civilite0" name="civilite"
                                            value="0">
                                        <label class="custom-control-label" for="civilite0">Madame</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="civilite1" name="civilite"
                                            value="1">
                                        <label class="custom-control-label" for="civilite1">Monsieur</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    @error('civilite')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger">N</span>
                            </div>
                            <input type="text" name="nom" placeholder="Nom" value="{{ old('nom') }}"
                                class="@error('nom') is-invalid @enderror input-group form-control" required>
                            @error('nom')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger">P</span>
                            </div>
                            <input type="text" name="prenom" placeholder="Prénom" value="{{ old('prenom') }}"
                                class="@error('prenom') is-invalid @enderror input-group form-control" required>
                            @error('prenom')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at text-danger"></i></span>
                            </div>
                            <input type="email" name="email" placeholder="Adresse email" value="{{ old('email') }}"
                                class="@error('email') is-invalid @enderror input-group form-control" required>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone-alt text-danger"></i></span>
                            </div>
                            <input type="text" name="telephone" placeholder="Numéro de téléphone"
                                value="{{ old('telephone') }}"
                                class="@error('telephone') is-invalid @enderror input-group form-control" required>
                            @error('telephone')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt text-danger"></i></span>
                            </div>
                            <input type="text" name="adresse" placeholder="Adresse de résidence"
                                value="{{ old('adresse') }}"
                                class="@error('adresse') is-invalid @enderror input-group form-control" required>
                            @error('adresse')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt text-danger"></i></span>
                            </div>
                            <select name="ville_id" value="{{ old('ville_id') }}"
                                class="@error('ville_id') is-invalid @enderror input-group form-control custom-select"
                                required>
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->libelle }}</option>
                                @endforeach
                            </select>
                            @error('ville_id')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 col-lg-12 text-center mb-2">
                            <button type="submit" id="btn_submit" class="btn btn-danger">Créer mon compte <i
                                    class="fas fa-user-plus"></i></button>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-12">
                            <hr class="solid">
                        </div>
                    </div>
                    <div class="row col-lg-12 mb-3">
                        <div class="col-lg-6 text-center text-danger"><a class="text-danger"
                                href="{{ route('login') }}"><i class="far fa-user-circle"></i> Se connecter</a></div>
                        <div class="col-lg-6 text-center text-danger"><a class="text-danger"
                                href="{{ route('password') }}"><i class="fas fa-key text-danger"></i> Mot de passe
                                oublié</a></div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
                <a href="{{ route('api.informations') }}">API
                    Informations</a> - <a href="{{ route('mobile.presentation') }}">Application Mobile</a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
