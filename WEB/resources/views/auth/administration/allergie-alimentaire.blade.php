@extends('auth.home')
@section('auth.administration.allergie-alimentaire.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Listes des allergies allimentaires</h4>
        <button class="btn btn-info" data-toggle="modal" data-target="#NewAAlimentaireModal"><i class="far fa-plus-square"></i> Créer une nouvelle allergie allimentaire</button>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Nom de l'allergène</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allergies as $allergie)
                        <tr class="text-center">
                            <td>{{$allergie->libelle}}</td>
                            <td>{{$allergie->updated_at}}</td>
                            <td>{{$allergie->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#AAlimentaireModal{{$allergie->id}}"><i class="far fa-edit"></i> Modifier</button>
                                        <div class="modal" id="AAlimentaireModal{{$allergie->id}}">
                                            <div class="modal-dialog">
                                                <form action="{{route('allergie_alimentaire.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier l'allergie alimentaire: {{$allergie->libelle}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="allergie_id" value="{{$allergie->id}}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-utensils"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control" value="{{$allergie->libelle}}">
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
                                        <form action="{{route('allergie_alimentaire.delete')}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="allergie_id" value="{{$allergie->id}}">
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

<div class="modal" id="NewAAlimentaireModal">
    <div class="modal-dialog">
        <form action="{{route('allergie_alimentaire.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer une nouvelle allergie allimentaire</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-utensils"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom l'aliment allergène">
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