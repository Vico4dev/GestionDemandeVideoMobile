@extends('layouts.app')

@section('content')
<div class="card">
 
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<div class="card-body">
    <h2>Modifier la Demande</h2>
    <form action="{{ route('demandes.update', $demande->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_demande">Date de Demande</label>
                    <input type="date" class="form-control" name="date_demande" id="date_demande" value="{{ $demande->date_demande ? $demande->date_demande->format('Y-m-d') : '' }}" required>
     </div>
                <div class="form-group">
                    <label for="demandeur_nom">Nom du demandeur</label>
                    <input type="text" class="form-control" name="demandeur_nom" id="demandeur_nom" value="{{ $demande->demandeur_nom }}" required>
                </div>
                <div class="form-group">
                    <label for="demandeur_prenom">Prénom du demandeur</label>
                    <input type="text" class="form-control" name="demandeur_prenom" id="demandeur_prenom" value="{{ $demande->demandeur_prenom }}" required>
                </div>
                <label for="status">Etat de la demande</label>
                <select name="status" class="form-control">
 

    <option value="Nouveau" {{ $demande->status == "Nouveau" ? 'selected' : '' }}>Nouveau</option>
    <option value="En cours de validation" {{ $demande->status == "En cours de validation" ? 'selected' : '' }}>En cours de validation</option>
    <option value="En cours d'installation" {{ $demande->status == "En cours d'installation" ? 'selected' : '' }}>En cours d'installation</option>
    <option value="Installer" {{ $demande->status == "Installer" ? 'selected' : '' }}>Installer</option>
    <option value="Terminer" {{ $demande->status == "Terminer" ? 'selected' : '' }}>Terminer</option>
</select>

             
                <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" class="form-control" name="service" id="service" value="{{ $demande->service }}" required>
                </div>
                <div class="form-group">
                    <label for="localisation_exacte">Localisation Exacte</label>
                    <input type="text" class="form-control" name="localisation_exacte" id="localisation_exacte" value="{{ $demande->localisation_exacte }}" required>
                </div>
                <div id="map" class="img-fluid mb-3" style="height: 400px;"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="commune">Commune</label>
                    <input type="text" class="form-control" name="commune" id="commune" value="{{ $demande->commune }}" required>
                </div>
                <div class="form-group">
                    <label for="validateur">Validateur</label>
                    <select name="validateur" class="form-control">
 
<option value="En attente" {{ $demande->validateur == "En attente" ? 'selected' : '' }}>En attente</option>
 <option value="Christophe LUCAS" {{ $demande->validateur == "Christophe LUCAS" ? 'selected' : '' }}>Christophe LUCAS</option>
 <option value="Olivier MOURO" {{ $demande->validateur == "Olivier MOURO" ? 'selected' : '' }}>Olivier MOURO</option>
 <option value="Bastien Sarrail" {{ $demande->validateur == "Bastien Sarrail" ? 'selected' : '' }}>Bastien Sarrail</option>
</select>
                </div>
                <div class="form-group">
                    <label for="date_validation">Date de Validation</label>

                    <input type="date" class="form-control" name="date_validation" id="date_validation" value="{{ $demande->date_validation ? $demande->date_validation->format('Y-m-d') : '' }}" required>

                </div>
                <div class="form-group">
                    <label for="demande_prestataire">Demande Prestataire</label>
                    <input type="text" class="form-control" name="demande_prestataire" id="demande_prestataire" value="{{ $demande->demande_prestataire }}" required>
                </div>
                <div class="form-group">
                    <label for="date_mise_en_place">Date de Mise en Place</label>
                <input type="date" class="form-control" name="date_mise_en_place" id="date_mise_en_place" value="{{ $demande->date_mise_en_place ? $demande->date_mise_en_place->format('Y-m-d') : '' }}" required>

          
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
  
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>    </div>
        </div>
        <script>
    var map = L.map('map').setView([{{ $demande->latitude }}, {{ $demande->longitude }}], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([{{ $demande->latitude }}, {{ $demande->longitude }}]).addTo(map);
    marker.bindPopup("<b>Localisation Exacte:</b><br>{{ $demande->localisation_exacte }}").openPopup();
</script>
@endsection
