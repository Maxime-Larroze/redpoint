@extends('public.mobile.template')
@section('public.mobile.presentation.view')
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <h2>Présentation du projet REDPOINT</h2>
        <h3 class="mt-3">Contexte préalable</h3>
        <p>Chaque année, plus de 50.000 personnes meurent prématurément d’un arrêt cardiaque. Sur ces 50.000 personnes 2
            à 3% réussissent à survivre soit environ 1.500 personnes. En 2019, se sont près de 4,820 millions
            d’interventions menées par les sapeurs-pompiers de France avec environ 316.100 incendies, 4,095 millions de
            secours d’urgence dont 293.700 accidents de la route.
            <br><br>
            Chaque année, l’ensemble des services de secours et d’urgence soulignent le fait que la population française
            n’est pas assez formée en termes de secourisme et de réactivité en cas de problème. Selon LNA Santé « En 2018,
            on estimait que seulement 20% de la population française avait suivi une formation Premiers Secours. L'objectif
            est aujourd'hui d'arriver à former 80% de la population française. Un taux déjà atteint par nos voisins
            européens notamment en Allemagne, en Autriche et en Norvège (avec un taux de 90%). »
        </p>
        <h3 class="mt-5">Vidéo de démonstration - web</h3>
        <div class="embed-responsive embed-responsive-16by9">
            <video width="320" height="240" autoplay muted>
                <source src="{{ asset('video/presentation_preliminaire-web.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <h3 class="mt-5">Vidéo de démonstration - mobile</h3>
        <div class="embed-responsive embed-responsive-16by9">
            <video width="320" height="240" autoplay muted>
                <source src="{{ asset('video/presentation_preliminaire-mobile.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <h3 class="mt-5">Le concept</h3>
        <p>
            Le projet REDPOINT à pour but de venir intégrer une tierce partie dans la chaine de commandement et
            d’intervention des services de secours et protection. Le but étant de créer un mouvement de participation
            collaboratif (de manière communautaire), pour créer un réseau suffisamment conséquent et pouvoir déployer ce
            dispositif sur des points majeurs pour commencer puis sur des cibles de plus petites envergures.
        </p>
        <div class="row">
            <div class="col-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 d-flex flex-wrap align-items-center">
                <img src="{{ asset('img/logo-fnspf.png') }}" class="img img-fluid" alt="Logo FNSPF Pompier de France">
            </div>
            <div class="col-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 d-flex flex-wrap align-items-center">
                <img src="{{ asset('img/logo-gendarmerie.png') }}" class="img img-fluid" alt="Logo Gendarmerie de France">
            </div>
            <div class="col-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 d-flex flex-wrap align-items-center">
                <img src="{{ asset('img/logo-pn.png') }}" class="img img-fluid" alt="Logo Police Nationale de France">
            </div>
            <div class="col-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 d-flex flex-wrap align-items-center">
                <img src="{{ asset('img/logo-samu.png') }}" class="img img-fluid" alt="Logo SAMU de France">
            </div>
        </div>
        <h3 class="mt-5">Point de vue global</h3>
        <p>
            Plus globalement ce projet à pour but de venir en appuis / soutenir les forces de secours opérationnelles à
            savoir la Police Nationale, Gendarmerie, Sapeurs-Pompiers et SAMU afin d’améliorer l’efficacité du premier
            maillon de la chaine d’alerte à savoir la personne qui prévient les secours et qui agit en premier lieu. Cette
            personne, située sur les lieux de l’alerte disposer des gestes de premiers secours. Le projet REDPOINT permet à
            ce niveau de la chaine d’intervention, de prévenir et faire dépêcher des personnes supplémentaires, formées
            selon le type d’intervention afin de prodiguer de meilleurs soins et d’augmenter considérablement les chances de
            survie du ou des victimes.
        </p>
        <h3 class="mt-5">Téléchargement</h3>
        <p>
            <a href="{{ asset('PDF/rapport_redpoint_2021-preliminaire.pdf') }}"><i class="fas fa-download"></i>
                Télécharger
                notre rapport PDF complet sur ce projet <i class="fas fa-download"></i></a>
        </p>
    </div>
@endsection
