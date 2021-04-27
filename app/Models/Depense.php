<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $table = 'depenses';
    
    protected $fillable = [
        'nature_depense_id',
        'user_id',
        'agent_id',
        'projet_id',
         'mouvement_caisse_id',
         'dateDepense',
         'montant',
         'nouveauSolde',
         'description',
         'fournisseur',
         'commentaire',
         'fichier',
         'filePath',
         'statut'
    ];
}
