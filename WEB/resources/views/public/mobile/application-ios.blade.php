@extends('public.mobile.template')
@section('public.mobile.application-ios.view')
    <div class="col-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center">
        <img src="{{ asset('img/ios-logo.png') }}" width="35%" class="img img-fluid" alt="Logo ios">
    </div>
    <div class="col-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 text-center d-flex flex-wrap align-items-center">
        <p class="mt-5">Retrouvez toutes les informations dont vous avez
            besoins dans notre rubrique <a href="{{ route('application.instruction') }}">"Instructions d'utilisation"</a>
        </p>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-5">
        <h2>Application Ios - REDPOINT</h2>
        <h3 class="mt-5">Téléchargement</h3>
        <p>
            Vous pouvez <a href="">utiliser ce lien</a> pour télécharger notre application ou appuyer directement sur le
            logo de
            téléchargement en dessous.
        </p>
        <div class="text-center">
            <a href=""><img src="{{ asset('img/download-ios.png') }}" width="20%" alt="logo de téléchargement ios"></a>
        </div>
        <h3 class="mt-5">Information concernant l'application</h3>
        <p class="font-italic">
            Application signée avec un certificat auto-signé par l'équipe de développement du projet REDPOINT.
            <br>
            Application non publiée sur le Store.
        </p>
    </div>
@endsection
