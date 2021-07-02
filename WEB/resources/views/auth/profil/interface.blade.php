@extends('auth.home')
@section('auth.profil.interface.update')
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form action="{{route('profil.update')}}" method="POST">
            @csrf
            <div class="row mb-5">
                <div class="col-lg-12 text-center">
                    @if($user->civilite == 0)
                        <img src="{{asset('/img/femme.png')}}" class="img-fluid" width="22%" alt="Image sexe F">
                    @else
                        <img src="{{asset('/img/homme.png')}}" class="img-fluid" width="22%" alt="Image sexe H">
                    @endif
                </div>
                <div class="mt-3 col-lg-6 text-center input-group input-group-ml">
                    <h5>Date de création du compte {{date('d-m-Y à H:i', strtotime($user->created_at))}}</h5>
                </div>
                <div class="mt-3 col-lg-6 text-center input-group input-group-ml">
                    <h5>Date de dernière modification {{date('d-m-Y à H:i', strtotime($user->updated_at))}}</h5>
                </div>
                <div class="mt-3 col-lg-12 text-center input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger">Identifiant unique</span>
                    </div>
                    <input type="text" value="{{ $user->identifiant_unique }}" class="input-group form-control text-center" disabled>
                </div>
                <div class="mt-3 col-lg-6 text-center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="civilite0" name="civilite" @if($user->civilite == 0) checked @endif value="0">
                        <label class="custom-control-label" for="civilite0">Madame</label>
                    </div>  
                </div>
                <div class="mt-3 col-lg-6 text-center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="civilite1" name="civilite" @if($user->civilite == 1) checked @endif value="1">
                        <label class="custom-control-label" for="civilite1">Monsieur</label>
                    </div>  
                </div>
                <div class="mt-3 col-lg-6 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger">N</span>
                    </div>
                    <input type="text" name="nom" placeholder="Nom" value="{{ $user->nom }}" class="@error('nom') is-invalid @enderror input-group form-control" required>
                    @error('nom')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-6 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger">P</span>
                    </div>
                    <input type="text" name="prenom" placeholder="Prénom" value="{{ $user->prenom }}" class="@error('prenom') is-invalid @enderror input-group form-control" required>
                    @error('prenom')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-6 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" name="email" placeholder="Adresse email" value="{{ $user->email }}" class="@error('email') is-invalid @enderror input-group form-control" required>
                    @error('email')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-6 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="text" name="telephone" placeholder="Numéro de téléphone" value="{{ $user->telephone }}" class="@error('telephone') is-invalid @enderror input-group form-control" required>
                    @error('telephone')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-6 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" name="adresse" placeholder="Adresse de résidence" value="{{ $user->adresse }}" class="@error('adresse') is-invalid @enderror input-group form-control" required>
                    @error('adresse')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-6 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger"><i class="fas fa-map-marked-alt"></i></span>
                    </div>
                    <select name="ville_id" value="{{ old('ville_id') }}" class="@error('ville_id') is-invalid @enderror input-group form-control custom-select" required>
                        @foreach($villes as $ville)
                        <option value="{{$ville->id}}">{{$ville->libelle}}</option>
                        @endforeach
                    </select>
                    @error('ville_id')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-12 input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger">Rayon d'intervention</span>
                    </div>
                    <select name="rayon_intervention_id" value="{{ $user->rayon_intervention_id }}" class="@error('ville_id') is-invalid @enderror input-group form-control custom-select" required>
                        @foreach($rayons as $rayon)
                            @if($user->rayon_intervention_id == $rayon->id)
                                <option value="{{$rayon->id}}" selected>{{$rayon->libelle}}</option>
                            @else
                                <option value="{{$rayon->id}}">{{$rayon->libelle}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('ville_id')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-12 text-center"><hr><h4>Modification de votre mot de passe</h4></div>
                <div class="mt-3 col-lg-6 text-center input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger"><i class="fas fa-key"></i>1</span>
                    </div>
                    <input type="password" name="mdp1" placeholder="Nouveau mot de passe" class="@error('mdp1') is-invalid @enderror input-group form-control">
                    @error('mdp1')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-6 text-center input-group input-group-ml">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger"><i class="fas fa-key"></i>2</span>
                    </div>
                    <input type="password" name="mdp2" placeholder="Retapez mot de passe" class="@error('mdp2') is-invalid @enderror input-group form-control">
                    @error('mdp2')
                        <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 col-lg-12 text-center mb-5"><button class="btn btn-danger" type="submit"><i class="fas fa-share"></i> Mettre à jour</button></div>
            </div>
        </form>
    </div>
    <div class="col-lg-2"></div>
</div>
@endsection