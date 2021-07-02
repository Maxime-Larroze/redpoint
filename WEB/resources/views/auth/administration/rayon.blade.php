@extends('auth.home')
@section('auth.administration.substance.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Listes des rayons d'intervention</h4>
        <button class="btn btn-info" data-toggle="modal" data-target="#NewRayonModal"><i class="far fa-plus-square"></i> Créer une nouveau rayon</button>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Libellé</th>
                      <th>Distance en mètres</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rayons as $rayon)
                        <tr class="text-center">
                            <td>{{$rayon->libelle}}</td>
                            <td>{{$rayon->rayon}}</td>
                            <td>{{$rayon->updated_at}}</td>
                            <td>{{$rayon->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#RayonModal{{$rayon->id}}"><i class="far fa-edit"></i> Modifier</button>
                                        <div class="modal" id="RayonModal{{$rayon->id}}">
                                            <div class="modal-dialog">
                                                <form action="{{route('rayons.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier le rayon d'intervention {{$rayon->libelle}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="rayon_id" value="{{$rayon->id}}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control" value="{{$rayon->libelle}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-ruler-combined"></i></span>
                                                                </div>
                                                                <input type="text" name="rayon" class="form-control" value="{{$rayon->rayon}}">
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
                                        <form action="{{route('rayons.delete')}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="rayon_id" value="{{$rayon->id}}">
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

<div class="modal" id="NewRayonModal">
    <div class="modal-dialog">
        <form action="{{route('rayons.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer un nouveau rayon</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom de votre rayon">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-ruler-combined"></i></span>
                        </div>
                        <input type="text" name="rayon" class="form-control" placeholder="Distance en mètre">
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