@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Détails de la Demande</h2>
    </div>
    <a href="{{ route('demandes.exportPdf', $demande->id) }}" class="btn btn-danger">Exporter en PDF</a>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

   
    <div class="card-body">
     
        <h5 class="card-title">{{ $demande->demandeur_nom }} {{ $demande->demandeur_prenom }}</h5>
        <p class="card-text"><strong>Date de Demande:</strong> {{ $demande->date_demande->format('d/m/Y') }}</p>
        <p class="card-text"><strong>Service:</strong> {{ $demande->service }}</p>
        <p class="card-text"><strong>Localisation Exacte:</strong> {{ $demande->localisation_exacte }}</p>
        <p class="card-text"><strong>Commune:</strong> {{ $demande->commune }}</p>
        <p class="card-text"><strong>Validateur:</strong> {{ $demande->validateur }}</p>
        <p class="card-text"><strong>Date de Validation:</strong> {{ $demande->date_validation ? $demande->date_validation->format('d/m/Y') : 'Non validée' }}</p>
        <p class="card-text"><strong>Demande Prestataire:</strong> {{ $demande->demande_prestataire ? 'Oui' : 'Non' }}</p>
        <p class="card-text"><strong>Date de Mise en Place:</strong> {{ $demande->date_mise_en_place ? $demande->date_mise_en_place->format('d/m/Y') : 'Non définie' }}</p>
        <p class="card-text"><strong>Commentaires:</strong> {{ $demande->commentaires ?? 'Aucun' }}</p>
        <p class="card-text"><strong>Latitude:</strong> {{ $demande->latitude ?? 'Aucun' }}</p>
        <p class="card-text"><strong>Longitude:</strong> {{ $demande->longitude ?? 'Aucun' }}</p>
        <div id="map" class="img-fluid mb-3" style="height: 400px;"></div>
        @if($demande->photo)
            <img src="{{ asset('storage/' . $demande->photo) }}" class="img-fluid mb-3" alt="Photo de la demande" style="height: 400px;">
        @endif
    </div>
    <div class="card-footer">
        <a href="{{ route('demandes.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
<script>
    var map = L.map('map').setView([{{ $demande->latitude }}, {{ $demande->longitude }}], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([{{ $demande->latitude }}, {{ $demande->longitude }}]).addTo(map);
    marker.bindPopup("<b>Localisation Exacte:</b><br>{{ $demande->localisation_exacte }}").openPopup();
</script>
@endsection
