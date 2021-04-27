<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NatureDepense extends Model
{
    protected $table = 'nature_depenses';

    protected $fillable = ['designation', 'description'];
}
