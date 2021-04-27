<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementCaisse extends Model
{
    protected  $table ='mouvement_caisses';

    protected $fillable = [
        'user_id',
        'caisse_id',
        'dateOuverture',
        'dateFermeture',
        'soldeOuverture',
        'soldeFermeture',
        'totalAppro',
        'totalDepense',
        'soldeTheorique',
        'soldePhysique',
        'ecart',
        'statut'
    ];
}
