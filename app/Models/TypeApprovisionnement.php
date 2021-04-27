<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeApprovisionnement extends Model
{
    protected $table = 'type_approvisionnements';

    protected $fillable = ['libelle', 'description'];
}
