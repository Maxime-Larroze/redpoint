@extends('public.mobile.template')
@section('public.mobile.application-ios.view')
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#inscription">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#connexion">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#valid-email">Validation de l'adresse email</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#utilisation-web">Utilisation web</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#utilisation-mobile">Utilisation mobile</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="inscription" class="container tab-pane active"><br>
                <h3>Inscription</h3>
                <p>
                    Pour utiliser le système Redpoint, vous devez tout d'abord commencer par créer un compte en ligne <a
                        href="{{ route('register') }}">via ce lien</a> et remplir toutes les informations demandées.
                </p>
            </div>
            <div id="connexion" class="container tab-pane fade"><br>
                <h3>Connexion</h3>
                <p>Pour utiliser l'application Redpoint au format web ou mobile, vous devez vous munir de votre identifiant
                    reçut par email ainsi que tu mot de passe figurant sur le mail également. Vous pourrez changer de mot de
                    passe une fois connecté sur votre compte.
                    <br><br>
                    Rendez vous <a href="{{ route('login') }}">à cette adresse</a> pour vous connecter sur le web ou
                    directement sur <a href="{{ route('mobile.android') }}">l'application mobile</a>, et
                    renseignez les champs "identifiant" et "mot de passe".
                </p>
            </div>
            <div id="utilisation-web" class="container tab-pane fade"><br>
                <h3>Utilisation web</h3>
                <p>L'interface web consultable à <a href="{{ route('dashboard') }}">cette adresse</a>, vous permet de
                    paramètrer
                    votre compte, ainsi
                    que différents éléments tel que le rayon d'action (en mètres) que vous souhaitez utiliser pour vos
                    futures interventions, ou encore la gestion de vos contacts d'urgence, de votre groupe sanguin, etc...
                </p>
            </div>
            <div id="utilisation-mobile" class="container tab-pane fade"><br>
                <h3>Utilisation mobile</h3>
                <p>L'utilisation de l'application mobile vous permet d'intervenir rapîdement sur une alerte. A l'aide de
                    l'application, une fois connecté, vous avez la possibilité de créer des alertes si besoins, mais vous
                    pouvez également intervenir sur d'autres interventions et ainsi porter secours aux victimes. </p>
            </div>
        </div>
    </div>
@endsection
