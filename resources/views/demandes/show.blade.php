@extends('layouts.app')

@section('content')
<h2>Détails de la Demande</h2>
<div>
    <p>Date de Demande: {{ $demande->date_demande }}</p>
    <!-- Répète pour les autres attributs -->
</div>
<a href="{{ route('demandes.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
