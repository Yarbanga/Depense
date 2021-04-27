<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pole extends Model
{
    protected $table = 'poles';

    protected $fillable = ['code', 'libelle'];
}
