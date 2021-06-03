<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function vacantes(){
        return $this->hasMany(Vacante::class);
    }
}
