@extends('layouts.app')

@section('content')
    <h2>Modifier la Demande</h2>
    <form action="{{ route('demandes.update', $demande->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_demande">Date de Demande</label>
                    <input type="date" class="form-control" name="date_demande" id="date_demande" value="{{ $demande->date_demande }}" required>
                </div>
                <div class="form-group">
                    <label for="demandeur_nom">Nom du demandeur</label>
                    <input type="text" class="form-control" name="demandeur_nom" id="demandeur_nom" value="{{ $demande->demandeur_nom }}" required>
                </div>
                <div class="form-group">
                    <label for="demandeur_prenom">Prénom du demandeur</label>
                    <input type="text" class="form-control" name="demandeur_prenom" id="demandeur_prenom" value="{{ $demande->demandeur_prenom }}" required>
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" class="form-control" name="service" id="service" value="{{ $demande->service }}" required>
                </div>
                <div class="form-group">
                    <label for="localisation_exacte">Localisation Exacte</label>
                    <input type="text" class="form-control" name="localisation_exacte" id="localisation_exacte" value="{{ $demande->localisation_exacte }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="commune">Commune</label>
                    <input type="text" class="form-control" name="commune" id="commune" value="{{ $demande->commune }}" required>
                </div>
                <div class="form-group">
                    <label for="validateur">Validateur</label>
                    <input type="text" class="form-control" name="validateur" id="validateur" value="{{ $demande->validateur }}" required>
                </div>
                <div class="form-group">
                    <label for="date_validation">Date de Validation</label>
                    <input type="date" class="form-control" name="date_validation" id="date_validation" value="{{ $demande->date_validation }}" required>
                </div>
                <div class="form-group">
                    <label for="demande_prestataire">Demande Prestataire</label>
                    <input type="text" class="form-control" name="demande_prestataire" id="demande_prestataire" value="{{ $demande->demande_prestataire }}" required>
                </div>
                <div class="form-group">
                    <label for="date_mise_en_place">Date de Mise en Place</label>
                    <input type="date" class="form-control" name="date_mise_en_place" id="date_mise_en_place" value="{{ $demande->date_mise_en_place }}" required>
                </div>
                <div class="form-group">
                    <label for="commentaires">Commentaires</label>
                    <textarea class="form-control" name="commentaires" id="commentaires" rows="3">{{ $demande->commentaires }}</textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo actuelle</label>
                    @if($demande->photo)
                        <img src="{{ asset('storage/'.$demande->photo) }}" alt="Photo actuelle" class="img-fluid">
                    @endif
                    <input type="file" class="form-control-file" name="photo" id="photo">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
