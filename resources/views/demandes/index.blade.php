@extends('layouts.app')

@section('content')
    <h2>Liste des Demandes</h2>
    <a href="{{ route('demandes.create') }}" class="btn btn-primary">Ajouter une demande</a>
    <table class="table">
        <thead>
            <tr>
                <th>Date Demande</th>
                <th>Demandeur</th>
                <th>Service</th>
                <th>Localisation Exacte</th>
                <th>Commune</th>
                <th>Validateur</th>
                <th>Date Validation</th>
                <th>Demande Prestataire</th>
                <th>Date Mise en Place</th>
                <th>Commentaires</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande->date_demande }}</td>
                    <td>{{ $demande->demandeur_nom }} {{ $demande->demandeur_prenom }}</td>
                    <td>{{ $demande->service }}</td>
                    <td>{{ $demande->localisation_exacte }}</td>
                    <td>{{ $demande->commune }}</td>
                    <td>{{ $demande->validateur }}</td>
                    <td>{{ $demande->date_validation }}</td>
                    <td>{{ $demande->demande_prestataire }}</td>
                    <td>{{ $demande->date_mise_en_place }}</td>
                    <td>{{ $demande->commentaires }}</td>
                    <td>{{ $demande->photo }}</td>
                    <td>
                        <a href="{{ route('demandes.show', $demande->id) }}" class="btn btn-success">Voir</a>
                        <a href="{{ route('demandes.edit', $demande->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
