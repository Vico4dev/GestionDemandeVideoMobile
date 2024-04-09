@extends('layouts.app')

@section('content')
<h2>Ajouter une Demande</h2>
<form action="{{ route('demandes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Ajoute ici les champs du formulaire comme date_demande, demandeur_nom, etc. -->
    <div class="form-group">
        <label for="date_demande">Date de Demande</label>
        <input type="date" class="form-control" name="date_demande" id="date_demande" required>
    </div>
    <!-- Répète pour les autres champs -->
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
@endsection
