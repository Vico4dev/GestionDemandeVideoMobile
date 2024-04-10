@extends('layouts.app')

@section('content')
<div class="card">
 

<div class="card-body">
     
<h2>Ajouter une Demande</h2>
    <form action="{{ route('demandes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_demande">Date de Demande</label>
                    <input type="date" class="form-control" name="date_demande" id="date_demande" required>
                </div>
                <div class="form-group">
                    <label for="demandeur_nom">Nom du demandeur</label>
                    <input type="text" class="form-control" name="demandeur_nom" id="demandeur_nom" required>
                </div>
                <div class="form-group">
                    <label for="demandeur_prenom">Prénom du demandeur</label>
                    <input type="text" class="form-control" name="demandeur_prenom" id="demandeur_prenom" required>
                </div>
        <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude">
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" class="form-control" name="service" id="service" required>
                </div>
                <div class="form-group">
                    <label for="localisation_exacte">Localisation Exacte</label>
                    <input type="text" class="form-control" name="localisation_exacte" id="localisation_exacte" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="commune">Commune</label>
                    <input type="text" class="form-control" name="commune" id="commune" required>
                </div>
                <div class="form-group">
                    <label for="validateur">Validateur</label>
                    <input type="text" class="form-control" name="validateur" id="validateur" required>
                </div>
                <div class="form-group">
                    <label for="date_validation">Date de Validation</label>
                    <input type="date" class="form-control" name="date_validation" id="date_validation" required>
                </div>
                <div class="form-group">
                    <label for="demande_prestataire">Demande Prestataire</label>
                    <input type="text" class="form-control" name="demande_prestataire" id="demande_prestataire" required>
                </div>
                <div class="form-group">
                    <label for="date_mise_en_place">Date de Mise en Place</label>
                    <input type="date" class="form-control" name="date_mise_en_place" id="date_mise_en_place" required>
                </div>
                <div class="form-group">
                    <label for="commentaires">Commentaires</label>
                    <textarea class="form-control" name="commentaires" id="commentaires" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control-file" name="photo" id="photo">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
    </div>  </div>
@endsection
