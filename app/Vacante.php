<?php

namespace App;

use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = ['titulo','categoria_id','experiencia_id','ubicacion_id','salario_id','descripcion','imagen','skills'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
