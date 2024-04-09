<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $dates = ['date_demande', 'date_validation', 'date_mise_en_place'];

    protected $fillable = [
        'date_demande',
        'demandeur_nom',
        'demandeur_prenom',
        'service',
        'localisation_exacte',
        'commune',
        'validateur',
        'date_validation',
        'demande_prestataire',
        'date_mise_en_place',
        'commentaires',
        'photo',
    ];
    
}
