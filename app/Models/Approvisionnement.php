<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    protected $table = 'approvisionnements';
    
    protected $fillable = [
        'type_approvisionnement_id',
        'user_id',
        'mouvement_caisse_id',
        'montantAppro',
        'nouveauSolde',
        'dateAppro',
        'source',
        'statut'
    ];
}
