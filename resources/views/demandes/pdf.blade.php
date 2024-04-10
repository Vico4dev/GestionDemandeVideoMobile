<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demande PDF</title>
    <!-- Ajoutez ici les styles spécifiques au PDF si nécessaire -->
</head>
<body>
    <h1>Détails de la Demande</h1>
    <p><strong>Date de Demande:</strong> {{ $demande->date_demande->format('d/m/Y') }}</p>
    <p><strong>Nom du demandeur:</strong> {{ $demande->demandeur_nom }} {{ $demande->demandeur_prenom }}</p>
    <!-- Continuez avec le reste des détails de la demande -->
    
    @if($demande->photo)
        <p><img src="{{ public_path('storage/' . $demande->photo) }}" alt="Photo de la demande" style="max-width: 100%; height: auto;"></p>
    @endif
</body>
</html>
