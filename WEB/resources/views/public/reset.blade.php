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
                <form action="{{ route('password.reset') }}" method="POST">
                    @csrf
                    <img src="{{ asset('/Logos/logo_transparent.png') }}" alt="Logo"
                        class="img-fluid mx-auto d-block mt-5" width="30%">
                    <h5 class="font-italic mt-3">REDPOINT Emergency</h5>
                    <div class="mt-3 input-group input-group-ml">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-tie text-danger'></i></span>
                        </div>
                        <input type="text" id="identifiant" name="identifiant" placeholder="Identifiant"
                            class="@error('identifiant') is-invalid @enderror input-group form-control" required>
                    </div>
                    @error('identifiant')
                        <div class="mt-3">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="mt-3 mb-3 input-group input-group-ml inputcontainer">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at text-danger"></i></span>
                        </div>
                        <input type="email" name="email" id="email" placeholder="Adresse email"
                            class="@error('email') is-invalid @enderror input-group form-control" required>
                        <div id="spinner" class="spinner-border text-danger"></div>
                    </div>
                    @error('email')
                        <div class="mt-3">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                    @enderror
                    @error('success_reset')
                        <div class="mt-3">
                            <div class="alert alert-success">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="mt-5 mb-5"></div>
                    <div class="mt-5 mb-2">
                        <button type="submit" id="btn_submit" class="btn btn-danger">Réinitialiser le mot de passe <i
                                class="fas fa-sign-in-alt"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr class="solid">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 text-center text-danger"><a class="text-danger"
                                href="{{ route('register') }}"><i class="far fa-user-circle"></i> Créer un compte</a>
                        </div>
                        <div class="col-lg-6 text-center text-danger"><a class="text-danger"
                                href="{{ route('login') }}"><i class="fas fa-undo text-danger"></i> Se connecter</a>
                        </div>
                    </div>
                </form>
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
