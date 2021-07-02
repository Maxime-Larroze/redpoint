@extends('auth.home')
@section('auth.administration.version.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Listes des versions de la plateforme</h4>
        <button class="btn btn-info" data-toggle="modal" data-target="#NewVersionModal"><i class="far fa-plus-square"></i> Créer une nouvelle version</button>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Nom de la version</th>
                      <th>Numéro de la version</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($versions as $version)
                        <tr class="text-center">
                            <td>{{$version->libelle}}</td>
                            <td>{{$version->numero}}</td>
                            <td>{{$version->updated_at}}</td>
                            <td>{{$version->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#VersionModal{{$version->id}}"><i class="far fa-edit"></i> Modifier</button>
                                        <div class="modal" id="VersionModal{{$version->id}}">
                                            <div class="modal-dialog">
                                                <form action="{{route('versions.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier la version {{$version->libelle}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="version_id" value="{{$version->id}}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-balance-scale-right"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control" value="{{$version->libelle}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-balance-scale-right"></i></span>
                                                                </div>
                                                                <input type="text" name="numero" class="form-control" value="{{$version->numero}}">
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
                                        <form action="{{route('versions.delete')}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="version_id" value="{{$version->id}}">
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

<div class="modal" id="NewVersionModal">
    <div class="modal-dialog">
        <form action="{{route('versions.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer une nouvelle version de la plateforme</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-balance-scale-right"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom de la version">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-balance-scale-right"></i></span>
                        </div>
                        <input type="text" name="numero" class="form-control" placeholder="Numéro de la version">
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