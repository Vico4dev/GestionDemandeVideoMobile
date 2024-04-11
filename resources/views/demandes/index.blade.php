@extends('layouts.app')

@section('content')
<div class="card">
 

 <div class="card-body">

<h2>Liste des Demandes</h2>
    @auth
    <a href="{{ route('demandes.create') }}" class="btn btn-primary">Ajouter une demande</a>
    @endauth

    <style>
.badge {
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}

.badge-new {
    background-color: #007bff; /* Bleu */
}

.badge-validation {
    background-color: #ffc107; /* Jaune */
}

.badge-installation {
    background-color: #28a745; /* Vert */
}

.badge-complete {
    background-color: #6c757d; /* Gris */
}

.badge-default {
    background-color: #17a2b8; /* Cyan */
}

        </style>
  
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date Demande</th>
                <th>Demandeur</th>
                <th>Status</th>
                <th>Service</th>
                <th>Adresse</th>
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
                    <td>
    @switch($demande->status)
        @case('Nouveau')
            <span class="badge badge-new">Nouveau</span>
            @break

        @case('En cours de validation')
            <span class="badge badge-validation">En cours de validation</span>
            @break

        @case('En cours d\'installation') {{-- Notez l'utilisation de l'échappement pour l'apostrophe --}}
            <span class="badge badge-validation">En cours d'installation</span>
            @break
            @case('Installer')
            <span class="badge badge-installation">Installer</span>
            @break
        @case('Terminer')
            <span class="badge badge-complete">Terminé</span>
            @break

        @default
            <span class="badge badge-default">Inconnu</span>
    @endswitch
</td>

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
                            <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
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
</div></div>
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
