@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Détails de la Demande</h2>
    </div>
    <a href="{{ route('demandes.exportPdf', $demande->id) }}" class="btn btn-danger">Exporter en PDF</a>

   
    <div class="card-body">
        @if($demande->photo)
            <img src="{{ asset('storage/' . $demande->photo) }}" class="img-fluid mb-3" alt="Photo de la demande" style="max-height: 300px;">
        @endif
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
    </div>
    <div class="card-footer">
        <a href="{{ route('demandes.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection
