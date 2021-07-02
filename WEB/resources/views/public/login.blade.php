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
                <form action="{{ route('login.connexion') }}" method="POST">
                    @csrf
                    <img src="{{ asset('/Logos/logo_transparent.png') }}" alt="Logo"
                        class="img-fluid mx-auto d-block mt-5" width="30%">
                    <h5 class="font-italic mt-3">REDPOINT Emergency</h5>
                    @error('nouveau_compte')
                        <div class="mt-3 alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert alert-success alert-dismissible">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="mt-3 input-group input-group-ml">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-tie text-danger'></i></span>
                        </div>
                        <input type="text" id="identifiant" name="identifiant" placeholder="Identifiant"
                            class="@error('connexion') is-invalid @enderror input-group form-control" required>
                    </div>
                    <div class="mt-3 input-group input-group-ml inputcontainer">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock text-danger"></i></span>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Mot de passe"
                            class="@error('connexion') is-invalid @enderror input-group form-control" required>
                        <div id="spinner" class="spinner-border text-danger"></div>
                    </div>
                    <div class="mt-3">
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="btn-danger custom-control-input" id="remember"
                                name="remember">
                            <label class="custom-control-label" for="remember">Se souvenir de moi</label>
                        </div>
                    </div>
                    @error('connexion')
                        <div class="mt-3">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="mt-3 mb-2">
                        <button type="submit" id="btn_submit" class="btn btn-danger">Se connecter <i
                                class="fas fa-sign-in-alt"></i></button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <hr class="solid">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6 text-center text-danger"><a class="text-danger"
                            href="{{ route('register') }}"><i class="far fa-user-circle"></i> Créer un compte</a>
                    </div>
                    <div class="col-lg-6 text-center text-danger"><a class="text-danger"
                            href="{{ route('password') }}"><i class="fas fa-key text-danger"></i> Mot de passe
                            oublié</a></div>
                </div>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
                <a href="{{ route('api.informations') }}">API
                    Informations</a> - <a href="{{ route('mobile.presentation') }}">Application Mobile</a>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#spinner").hide();
        $("#btn_submit").click(function() {
            if ($('#identifiant').val() != "") {
                if ($('#password').val() != "") {
                    $("#spinner").show();
                }
            }
        });
    });
</script>

</html>
