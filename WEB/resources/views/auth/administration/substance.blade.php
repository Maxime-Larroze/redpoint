@extends('auth.home')
@section('auth.administration.substance.view')
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>Listes des substances</h4>
        <button class="btn btn-info" data-toggle="modal" data-target="#NewSubstanceModal"><i class="far fa-plus-square"></i> Créer une nouvelle substance</button>
        <hr>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Libellé</th>
                      <th>Dernière modification</th>
                      <th>Date de création</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($substances as $substance)
                        <tr class="text-center">
                            <td>{{$substance->libelle}}</td>
                            <td>{{$substance->updated_at}}</td>
                            <td>{{$substance->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#SubstanceModal{{$substance->id}}"><i class="far fa-edit"></i> Modifier</button>
                                        <div class="modal" id="SubstanceModal{{$substance->id}}">
                                            <div class="modal-dialog">
                                                <form action="{{route('substances.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier la substance {{$substance->libelle}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="substance_id" value="{{$substance->id}}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-capsules"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control" value="{{$substance->libelle}}">
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
                                        <form action="{{route('substances.delete')}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="substance_id" value="{{$substance->id}}">
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

<div class="modal" id="NewSubstanceModal">
    <div class="modal-dialog">
        <form action="{{route('substances.create')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer une nouvelle substance</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-capsules"></i></span>
                        </div>
                        <input type="text" name="libelle" class="form-control" placeholder="Nom de votre substance">
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