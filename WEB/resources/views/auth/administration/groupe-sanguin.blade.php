@extends('auth.home')
@section('auth.administration.groupe-sanguin.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Listes des groupes sanguins</h4>
        <button class="btn btn-info" data-toggle="modal" data-target="#NewGSanguinModal"><i class="far fa-plus-square"></i> Créer un nouveau groupe sanguin</button>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Identifiant sanguin</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupe_sanguins as $groupe_sanguin)
                        <tr class="text-center">
                            <td>{{$groupe_sanguin->libelle}}</td>
                            <td>{{$groupe_sanguin->updated_at}}</td>
                            <td>{{$groupe_sanguin->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#GSanguinModal{{$groupe_sanguin->id}}"><i class="far fa-edit"></i> Modifier</button>
                                        <div class="modal" id="GSanguinModal{{$groupe_sanguin->id}}">
                                            <div class="modal-dialog">
                                                <form action="{{route('groupes_sanguins.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier le groupe sanguin {{$groupe_sanguin->libelle}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="gsanguin_id" value="{{$groupe_sanguin->id}}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control" value="{{$groupe_sanguin->libelle}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="{{route('groupes_sanguins.delete')}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="gsanguin_id" value="{{$groupe_sanguin->id}}">
                                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i> Supprimer</button>
                                        </form>
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

<div class="modal" id="NewGSanguinModal">
    <div class="modal-dialog">
        <form action="{{route('groupes_sanguins.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer un nouveau groupe sanguin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom du groupe sanguin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>
@php
@endphp
@endsection