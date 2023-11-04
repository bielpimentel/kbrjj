<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;

    public function torneios() {
        return $this->belongsToMany('App\Models\Torneio');
    }
}
