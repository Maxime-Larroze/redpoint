@extends('auth.home')
@section('auth.contact.interface.view')
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>Listes de vos contacts d'urgences</h4>
            <button class="btn btn-info" data-toggle="modal" data-target="#NewContactModal"><i
                    class="far fa-plus-square"></i> Créer un nouveau contact</button>
            <hr>
            @error('success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            @if ($contacts->isEmpty())
                <h2 class="text-center">Aucun contact d'urgence enregistré</h2>
            @else
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr class="text-center">
                                    <td>{{ $contact->nom }}</td>
                                    <td>{{ $contact->prenom }}</td>
                                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                    <td><a href="tel:+{{ $contact->telephone }}">{{ $contact->telephone }}</a></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#ContactModal{{ $contact->id }}"><i
                                                        class="far fa-edit"></i>
                                                    Modifier</button>
                                                <div class="modal" id="ContactModal{{ $contact->id }}">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('contacts.update') }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Modifier le contact
                                                                        {{ $contact->prenom }} {{ $contact->nom }}
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="contact_id"
                                                                        value="{{ $contact->id }}">
                                                                    <div class="row">
                                                                        <div class="mt-3 col-lg-6 text-center">
                                                                            <div
                                                                                class="custom-control custom-radio custom-control-inline">
                                                                                <input type="radio"
                                                                                    class="custom-control-input"
                                                                                    id="civilite0" name="civilite" value="0"
                                                                                    @if ($contact->civilite === 0) checked @endif>
                                                                                <label class="custom-control-label"
                                                                                    for="civilite0">Madame</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3 col-lg-6 text-center">
                                                                            <div
                                                                                class="custom-control custom-radio custom-control-inline">
                                                                                <input type="radio"
                                                                                    class="custom-control-input"
                                                                                    id="civilite1" name="civilite" value="1"
                                                                                    @if ($contact->civilite === 1) checked @endif>
                                                                                <label class="custom-control-label"
                                                                                    for="civilite1">Monsieur</label>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 col-lg-6 input-group input-group-ml">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text text-danger">N</span>
                                                                            </div>
                                                                            <input type="text" name="nom" placeholder="Nom"
                                                                                class="@error('nom') is-invalid @enderror input-group form-control"
                                                                                required value="{{ $contact->nom }}">
                                                                            @error('nom')
                                                                                <div
                                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 col-lg-6 input-group input-group-ml">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text text-danger">P</span>
                                                                            </div>
                                                                            <input type="text" name="prenom"
                                                                                placeholder="Prénom"
                                                                                class="@error('prenom') is-invalid @enderror input-group form-control"
                                                                                required value="{{ $contact->prenom }}">
                                                                            @error('prenom')
                                                                                <div
                                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 col-lg-6 input-group input-group-ml">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text text-danger"><i
                                                                                        class="fas fa-at"></i></span>
                                                                            </div>
                                                                            <input type="email" name="email"
                                                                                placeholder="Adresse email"
                                                                                class="@error('email') is-invalid @enderror input-group form-control"
                                                                                required value="{{ $contact->email }}">
                                                                            @error('email')
                                                                                <div
                                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 col-lg-6 input-group input-group-ml">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text text-danger"><i
                                                                                        class="fas fa-phone-alt"></i></span>
                                                                            </div>
                                                                            <input type="text" name="telephone"
                                                                                placeholder="Numéro de téléphone"
                                                                                class="@error('telephone') is-invalid @enderror input-group form-control"
                                                                                required
                                                                                value="{{ $contact->telephone }}">
                                                                            @error('telephone')
                                                                                <div
                                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 col-lg-6 input-group input-group-ml">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text text-danger"><i
                                                                                        class="fas fa-map-marker-alt"></i></span>
                                                                            </div>
                                                                            <input type="text" name="adresse"
                                                                                placeholder="Adresse de résidence"
                                                                                class="@error('adresse') is-invalid @enderror input-group form-control"
                                                                                required value="{{ $contact->adresse }}">
                                                                            @error('adresse')
                                                                                <div
                                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 col-lg-6 input-group input-group-ml">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text text-danger"><i
                                                                                        class="fas fa-map-marked-alt"></i></span>
                                                                            </div>
                                                                            <input type="text" name="ville_id"
                                                                                placeholder="Code postal"
                                                                                class="@error('ville_id') is-invalid @enderror input-group form-control"
                                                                                required
                                                                                value="{{ $contact->ville_id }}">
                                                                            @error('ville_id')
                                                                                <div
                                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
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
                                            <div class="col-lg-6">
                                                <form action="{{ route('contacts.destroy') }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                        Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <div class="modal" id="NewContactModal">
        <div class="modal-dialog">
            <form action="{{ route('contacts.create') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Créer un nouveau contact d'urgence</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="row">
                        <div class="mt-3 col-lg-6 text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="civilite0" name="civilite" value="0">
                                <label class="custom-control-label" for="civilite0">Madame</label>
                            </div>
                        </div>
                        <div class="mt-3 col-lg-6 text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="civilite1" name="civilite" value="1">
                                <label class="custom-control-label" for="civilite1">Monsieur</label>
                            </div>
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger">N</span>
                            </div>
                            <input type="text" name="nom" placeholder="Nom"
                                class="@error('nom') is-invalid @enderror input-group form-control" required>
                            @error('nom')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger">P</span>
                            </div>
                            <input type="text" name="prenom" placeholder="Prénom"
                                class="@error('prenom') is-invalid @enderror input-group form-control" required>
                            @error('prenom')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="email" placeholder="Adresse email"
                                class="@error('email') is-invalid @enderror input-group form-control" required>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger"><i class="fas fa-phone-alt"></i></span>
                            </div>
                            <input type="text" name="telephone" placeholder="Numéro de téléphone"
                                class="@error('telephone') is-invalid @enderror input-group form-control" required>
                            @error('telephone')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" name="adresse" placeholder="Adresse de résidence"
                                class="@error('adresse') is-invalid @enderror input-group form-control" required>
                            @error('adresse')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6 input-group input-group-ml">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <input type="text" name="ville_id" placeholder="Code postal"
                                class="@error('ville_id') is-invalid @enderror input-group form-control" required>
                            @error('ville_id')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
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
