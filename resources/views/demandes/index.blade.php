@extends('layouts.app')

@section('content')
    <h2>Liste des Demandes</h2>
    <a href="{{ route('demandes.create') }}" class="btn btn-primary">Ajouter une demande</a>
    <table class="table">
        <thead>
            <tr>
                <th>Date Demande</th>
                <th>Demandeur</th>
                <th>Status</th>
                <th>Service</th>
                <th>Localisation Exacte</th>
                <th>Commune</th>
          <!--       <th>Coordonées</th> -->
         
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
                    <td>{{ $demande->date_demande->format('d-m-Y') }}</td>
   
                    <td>{{ $demande->demandeur_nom }} {{ $demande->demandeur_prenom }}</td>
                    <td>{{ $demande->status }}</td>
                    <td>{{ $demande->service }}</td>
                    <td>{{ $demande->localisation_exacte }}</td>
                    <td>{{ $demande->commune }}</td>
    <!--                 <td>{{ $demande->latitude }} - 
                    {{ $demande->longitude }} </td> -->
                    <td>{{ $demande->validateur }}</td>
                    <td>{{ $demande->date_validation->format('d-m-Y') }}</td>
                    <td>{{ $demande->demande_prestataire }}</td>
                    <td>{{ $demande->date_mise_en_place->format('d-m-Y') }}</td>
                    <td>{{ $demande->commentaires }}</td>
                    <td>        @if($demande->photo)
            <img src="{{ asset('storage/' . $demande->photo) }}" class="img-fluid mb-6" alt="Photo de la demande" style="max-height: 300px;">
        @endif</td>
                    <td>
                        <a href="{{ route('demandes.show', $demande->id) }}" class="btn btn-success">Voir</a>
                        @auth
                            <a href="{{ route('demandes.edit', $demande->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <script>
$(document).ready(function() {
    $('.table').DataTable({
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
        </script>
@endsection
