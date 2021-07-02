@extends('auth.home')
@section('auth.intervention.type.interface.view')
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>Listes des types d'interventions</h4>
            <button class="btn btn-info" data-toggle="modal" data-target="#NewTypeModal"><i class="far fa-plus-square"></i>
                Créer un nouveau type d'intervention</button>
            <hr>
            <div class="table-responsive-sm">
                @if (!$types->isEmpty())
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Libellé</th>
                                <th>Couleur</th>
                                <th>Dernière modification</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr class="text-center">
                                    <td>{{ $type->libelle }}</td>
                                    <td><i class="fas fa-circle" style="color:#{{ $type->couleur }}"></i></td>
                                    <td>{{ Carbon\Carbon::parse($type->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#TypeUpdateModal{{ $type->id }}"><i
                                                        class="far fa-edit"></i>
                                                    Modifier</button>
                                            </div>
                                            <div class="col-lg-6">
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="type_id" value="{{ $type->id }}">
                                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                        Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal" id="TypeUpdateModal{{ $type->id }}">
                                            <div class="modal-dialog">
                                                <form action="{{ route('types.update') }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier le type d'intervention:
                                                                {{ $type->libelle }}</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="type_id" value="{{ $type->id }}">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-exclamation-triangle"></i></span>
                                                                </div>
                                                                <input type="text" name="libelle" class="form-control"
                                                                    value="{{ $type->libelle }}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-exclamation-triangle"></i></span>
                                                                </div>
                                                                <input type="text" name="couleur" class="form-control"
                                                                    value="{{ $type->couleur }}"
                                                                    placeholder="Couleur de l'intervention">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fas fa-check"></i> Valider</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
            </div>
            </td>
            @endforeach
            </tbody>
            </table>
        @else
            <h3>Aucun type d'intervention disponible</h3>
            @endif

        </div>
    </div>
    </div>


    <div class="modal" id="NewTypeModal">
        <div class="modal-dialog">
            <form action="{{ route('types.create') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Créer un nouveau type d'intervention</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-exclamation-triangle"></i></span>
                            </div>
                            <input type="text" name="libelle" class="form-control" placeholder="Nom du type d'intervention">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-exclamation-triangle"></i></span>
                            </div>
                            <input type="text" name="couleur" class="form-control" placeholder="Couleur de l'intervention">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
