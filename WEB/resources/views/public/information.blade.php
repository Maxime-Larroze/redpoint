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
    <div class="mt-5 container-fluid">
        <div class="mt-5 row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <a href="{{ route('redirect-login') }}"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border card rounded-lg shadow-lg"
                id="content-card">
                <img src="{{ asset('/Logos/logo_transparent.png') }}" alt="Redpoint" width="20%"
                    class="img-profile rounded mx-auto d-block">
                <br>
                <h2 class="text-center mt-4 mb-3">Informations API V1</h2>
                <hr>
                <table class="table table-hover table-striped thead-dark">
                    <thead>
                        <tr>
                            <th class="col-1 col-md-1 col-lg-1 col-xl-1 col-xxl-1">Méthode</th>
                            <th class="col-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">Route</th>
                            <th class="col-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">Paramètres [mot-clé(type)]</th>
                            <th class="col-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-primary text-white">
                            <td></td>
                            <td>
                                <h3>Routes publiques</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/public/logo</td>
                            <td></td>
                            <td>Route permettant la récupération de l'url du logo de l'application</td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/public/login</td>
                            <td>remember('on',null) - identifiant(string) - password(string)</td>
                            <td>Route permettant la connexion d'un utilisateur à l'api</td>
                        </tr>
                        <tr class="bg-primary text-white">
                            <td></td>
                            <td>
                                <h3>Route liée au token</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/token/verify</td>
                            <td>user_id(int)</td>
                            <td>Route permettant la regénération d'un token et le login d'un utilisateur via
                                son ID</td>
                        </tr>
                        <tr class="bg-primary text-white">
                            <td></td>
                            <td>
                                <h3>Routes avec authentification (token)</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/logout</td>
                            <td></td>
                            <td>Route permettant la déconnexion d'un utilisateur à l'api</td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/auth/position</td>
                            <td>user_id(int) latitude(string), longitude(string)</td>
                            <td>Route permettant l'envoie de la position GPS d'un utilisateur à l'api</td>
                        </tr>

                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Interventions</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/interventions/{latitude},{longitude}/{id}</td>
                            <td>latitude(string) - longitude(string) - id(int)</td>
                            <td>Route permettant de retourner toutes les interventions proche d'un utilisateur via les
                                paramètres mentionnés</td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/interventions/{id}</td>
                            <td>id(int)</td>
                            <td>Route permettant de retourner une intervention selon son ID</td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/auth/interventions</td>
                            <td>user_id(int) latitude(string), longitude(string) - type_intervention_id(int)</td>
                            <td>Route permettant l'envoie de la position GPS d'un utilisateur à l'api</td>
                        </tr>
                        <tr>
                            <td class="text-primary font-weight-bold">PUT</td>
                            <td>/api/v1/auth/interventions</td>
                            <td>user_id(int) intervention_id(int), intervention_ack(bool - 1)</td>
                            <td>Route permettant l'acquisition d'une intervention d'un utilisateur</td>
                        </tr>
                        <tr>
                            <td class="text-primary font-weight-bold">PUT</td>
                            <td>/api/v1/auth/interventions/termine</td>
                            <td>intervention_id(int)</td>
                            <td>Route permettant de notifier la fin d'une intervention</td>
                        </tr>
                        <tr>
                            <td class="text-danger font-weight-bold">DELETE</td>
                            <td>/api/v1/auth/interventions</td>
                            <td>intervention_id(int)</td>
                            <td>Route permettant la suppression d'une intervention d'un utilisateur</td>
                        </tr>

                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Allergies alimentaires</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/allergies/alimentaires</td>
                            <td></td>
                            <td>Route permettant de retourner toutes les allergies alimentaires de l'api</td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/allergies/alimentaires/{id}</td>
                            <td>id(int)</td>
                            <td>Route permettant de retourner une allergie alimentaire via son ID</td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/auth/allergies/alimentaires</td>
                            <td>libelle(string)</td>
                            <td>Route permettant de créer une nouvelle allergie alimentaire</td>
                        </tr>
                        <tr>
                            <td class="text-primary font-weight-bold">PUT</td>
                            <td>/api/v1/auth/allergies/alimentaires</td>
                            <td>id(int) - libelle(string)</td>
                            <td>Route permettant de modifier une allergie alimentaire</td>
                        </tr>
                        <tr>
                            <td class="text-danger font-weight-bold">DELETE</td>
                            <td>/api/v1/auth/allergies/alimentaires</td>
                            <td>id(int)</td>
                            <td>Route permettant de supprimer une allergie alimentaire</td>
                        </tr>

                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Allergies médicamenteuses</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/allergies/medicaments</td>
                            <td></td>
                            <td>Route permettant de retourner toutes les allergies medicamenteuses de l'api</td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/allergies/medicaments/{id}</td>
                            <td>id(int)</td>
                            <td>Route permettant de retourner une allergie medicamenteuse via son ID</td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/auth/allergies/medicaments</td>
                            <td>libelle(string)</td>
                            <td>Route permettant de créer une nouvelle allergie medicamenteuse</td>
                        </tr>
                        <tr>
                            <td class="text-primary font-weight-bold">PUT</td>
                            <td>/api/v1/auth/allergies/medicaments</td>
                            <td>id(int) - libelle(string)</td>
                            <td>Route permettant de modifier une allergie medicamenteuse</td>
                        </tr>
                        <tr>
                            <td class="text-danger font-weight-bold">DELETE</td>
                            <td>/api/v1/auth/allergies/medicaments</td>
                            <td>id(int)</td>
                            <td>Route permettant de supprimer une allergie medicamenteuse</td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Types d'interventions</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/types</td>
                            <td></td>
                            <td>Route permettant de retourner tous les types d'interventions contenus dans l'api</td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/types/{id}</td>
                            <td>id(int)</td>
                            <td>Route permettant de retourner un types d'interventions via son ID</td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Groupes Sanguin</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/groupes-sanguins</td>
                            <td></td>
                            <td>Route permettant de retourner toutes les groupes sanguins de l'api</td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Contacts d'Urgence</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/contacts/{id}</td>
                            <td>id(int)</td>
                            <td>Route permettant de retourner un contact d'urgence via son ID
                            </td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/contacts</td>
                            <td>user_id(int)</td>
                            <td>Route permettant de retourner tous les d'urgence d'un utilisateur via son ID
                            </td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/auth/contacts</td>
                            <td>user_id(int) - email(string) - telephone(string) - nom(string) - prenom(string) -
                                civilite(bool) - ville_id(int)</td>
                            <td>Route permettant de créer un nouveau contact d'urgence</td>
                        </tr>
                        <tr>
                            <td class="text-primary font-weight-bold">PUT</td>
                            <td>/api/v1/auth/contacts</td>
                            <td>contact_id(int) - email(string) - telephone(string) - nom(string) - prenom(string) -
                                civilite(bool) - ville_id(int)</td>
                            <td>Route permettant de modifier un contact d'urgence</td>
                        </tr>
                        <tr>
                            <td class="text-danger font-weight-bold">DELETE</td>
                            <td>/api/v1/auth/contacts</td>
                            <td>contact_id(int)</td>
                            <td>Route permettant de supprimer un contact d'urgence</td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <td></td>
                            <td>
                                <h3>Dossier Médical</h3>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-success font-weight-bold">GET</td>
                            <td>/api/v1/auth/dossiers/{id}</td>
                            <td>id(int)</td>
                            <td>Route permettant de retourner le dossier médical de l'utilisateur via son ID
                            </td>
                        </tr>
                        <tr>
                            <td class="text-warning font-weight-bold">POST</td>
                            <td>/api/v1/auth/dossiers</td>
                            <td>user_id(int) - sport(string) - commentaire(string) - groupe_sanguin_id(int)</td>
                            <td>Route permettant de créer un nouveau dossier médical</td>
                        </tr>
                        <tr>
                            <td class="text-primary font-weight-bold">PUT</td>
                            <td>/api/v1/auth/dossiers</td>
                            <td>dossier_id(int) - sport(string) - commentaire(string) - groupe_sanguin_id(int)</td>
                            <td>Route permettant de modifier un dossier médical</td>
                        </tr>
                        <tr>
                            <td class="text-danger font-weight-bold">DELETE</td>
                            <td>/api/v1/auth/dossiers</td>
                            <td>dossier_id(int)</td>
                            <td>Route permettant de supprimer un dossier médical</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div
                class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border card rounded-lg shadow-lg text-center mt-5">
                <footer>
                    <p class="mt-2">Version {{ $last_version->libelle }} ({{ $last_version->numero }})</p>
                    <p class="mt-2">Copyright 2021 &copy; Hackenathon-System</p>
                </footer>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
