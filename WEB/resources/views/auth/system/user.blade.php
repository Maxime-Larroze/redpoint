@extends('auth.home')
@section('auth.system.user.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Gestion des utilisateurs</h4>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Connecté</th>
                      <th>Civilité</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Identifiant</th>
                      <th>Shadowban</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $all_user)
                        <tr class="text-center">
                            @if($all_user->connecte == 0)
                                <td><i class="fas fa-circle text-danger text-center"></i></td>
                            @elseif($all_user->connecte == 1)
                                <td><i class="fas fa-circle text-success text-center"></i></td>
                            @endif
                            @if($all_user->civilite == 1)
                                <td>Monsieur</td>
                            @elseif($all_user->civilite == 0)
                                <td>Madame</td>
                            @endif
                            <td>{{$all_user->nom}}</td>
                            <td>{{$all_user->prenom}}</td>
                            <td>{{$all_user->identifiant_unique}}</td>
                            @if(empty($all_user->shadowban))
                                <td class="text-center">-</td>
                            @else
                                <td>{{date('d-m-Y à H:i', strtotime($all_user->shadowban))}}</td>
                            @endif
                            <td>{{$all_user->updated_at}}</td>
                            <td>{{$all_user->created_at}}</td>
                            <td>
                                <div class="col-lg-12">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#UserModal{{$all_user->id}}"><i class="far fa-edit"></i> Modifier</button>
                                </div>
                                <div class="row">
                                    <div class="modal fade" id="UserModal{{$all_user->id}}">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="text-center modal-header">
                                                    <h4 class="modal-title ">Modification de l'utilisateur: {{$all_user->prenom}} {{$all_user->nom}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h4 class="text-center">Informations</h4>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger">I</span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->identifiant_unique }}" class="input-group form-control" disabled>
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger">S</span>
                                                                    </div>
                                                                    @if($all_user->civilite == 0)
                                                                    <input type="text" value="Madame" class="input-group form-control" disabled>
                                                                    @else
                                                                    <input type="text" value="Monsieur" class="input-group form-control" disabled>
                                                                    @endif
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger">N</span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->nom }}" class="input-group form-control" disabled>
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger">P</span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->prenom }}" class="input-group form-control" disabled>
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger">@</span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->email }}" class="input-group form-control" disabled>
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger"><i class="fas fa-phone-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->telephone }}" class="input-group form-control" disabled>
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger"><i class="fas fa-map-marker-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->adresse }}" class="input-group form-control" disabled>
                                                                </div>
                                                                <div class="mt-3 col-lg-12 input-group input-group-ml">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text text-danger"><i class="fas fa-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="{{ $all_user->ville_id }}" class="input-group form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <h4 class="text-center">Commandes</h4>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="input-group col-lg-12 mb-3 text-center">
                                                                    <form action="{{route('users.droit')}}" method="POST" class="form-control-plaintext input-group-text border-0">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="user_id" value="{{ $all_user->id }}">
                                                                        <select name="droit_id" class="custom-select">
                                                                            @foreach($droits as $droit)
                                                                                @if($droit->id == $all_user->droit_id)
                                                                                    <option value="{{$droit->id}}" selected>{{$droit->libelle}}</option>
                                                                                @else
                                                                                    <option value="{{$droit->id}}">{{$droit->libelle}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                          </select>
                                                                        <div class="input-group-append">
                                                                          <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Valider</button>
                                                                        </div>    
                                                                    </form>    
                                                                </div>

                                                                <div class="custom-control custom-checkbox mt-3 col-lg-12">
                                                                    <h3>Etat de vérification de l'adresse email: 
                                                                        @if(empty($all_user->email_verified_at) || $all_user->email_verified_at == null)
                                                                        <span class="text-danger">Email non vérifié</span>
                                                                        @else
                                                                        <span class="text-success">Email vérifié</span>
                                                                        @endif
                                                                    </h3>
                                                                </div>
                                                                @if(empty($all_user->email_verified_at) || $all_user->email_verified_at == null)
                                                                    <form action="{{route('verification.resend', $all_user->id)}}" method="GET" class="custom-control custom-checkbox mt-3 col-lg-6">
                                                                        @csrf
                                                                        <button class="btn btn-info"><i class="fas fa-at"></i> Renvoyer un email de confirmation</button>
                                                                    </form>
                                                                    @endif
                                                                <div class="custom-control custom-checkbox mt-3 col-lg-6">
                                                                    <div class="row text-center">
                                                                    @if($all_user->disponible == 1)
                                                                        <div class="col-lg-12">
                                                                            <form action="{{route('users.indisponible')}}" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" name="user_id" value="{{ $all_user->id }}">
                                                                                <button class="btn btn-danger"><i class="far fa-times-circle"></i> Rendre utilisateur indisponible</button>
                                                                            </form>
                                                                        </div>
                                                                        @else
                                                                        <div class="col-lg-12">
                                                                            <form action="{{route('users.disponible')}}" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" name="user_id" value="{{ $all_user->id }}">
                                                                                <button class="btn btn-warning"><i class="fas fa-check"></i> Rendre utilisateur disponible</button>
                                                                            </form>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="mt-3 col-lg-6">
                                                                    @if($all_user->shadowban == null || empty($all_user->shadowban))
                                                                        <form action="{{route('users.shadowban')}}" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="hidden" name="user_id" value="{{ $all_user->id }}">
                                                                            <button class="btn btn-warning"><h6><i class="fas fa-user-shield"></i> Shadowban utilisateur</h6></button>
                                                                        </form>
                                                                    @else
                                                                        <form action="{{route('users.deshadowban')}}" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="hidden" name="user_id" value="{{ $all_user->id }}">
                                                                            <button class="btn btn-info"><h6><i class="fas fa-user-shield"></i> DE-Shadowban utilisateur</h6></button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                                <div class="mt-3 col-lg-6">
                                                                    <form action="{{route('users.delete')}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="user_id" value="{{ $all_user->id }}">
                                                                        <button class="btn btn-danger"><h6><i class="fas fa-user-shield"></i> Supprimer l'utilisateur</h6></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" data-dismiss="modal" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>    
                        </tr>  
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- 
<div class="modal" id="NewAMedicamentaireModal">
    <div class="modal-dialog">
        <form action="{{route('allergie_medicamenteuse.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer une nouvelle allergie médicamenteuse</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tablets"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom du produit allergène">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}
{{-- @php --}}
{{-- @endphp --}}
@endsection