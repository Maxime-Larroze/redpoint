@extends('auth.home')
@section('auth.administration.droit.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Listes des droits utilisateurs</h4>
        <button class="btn btn-info" data-toggle="modal" data-target="#NewDroitModal"><i class="far fa-plus-square"></i> Créer un nouveau droit</button>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Nom du droit</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($droits as $droit)
                        <tr class="text-center">
                            <td>{{$droit->libelle}}</td>
                            <td>{{$droit->updated_at}}</td>
                            <td>{{$droit->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#DroitModal{{$droit->id}}"><i class="far fa-edit"></i> Modifier</button>
                                        <div class="modal" id="DroitModal{{$droit->id}}">
                                            <div class="modal-dialog">
                                                <form action="{{route('droits.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier le droit {{$droit->libelle}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="droit_id" value="{{$droit->id}}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-balance-scale-right"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control" value="{{$droit->libelle}}">
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
                                        <form action="{{route('droits.delete')}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="droit_id" value="{{$droit->id}}">
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

<div class="modal" id="NewDroitModal">
    <div class="modal-dialog">
        <form action="{{route('droits.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer un nouveau droit utilisateur</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-balance-scale-right"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom du droit">
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