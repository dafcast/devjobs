<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = ['titulo','categoria_id','experiencia_id','ubicacion_id','salario_id','descripcion','imagen','skills'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function salario(){
        return $this->belongsTo(Salario::class);
    }
    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
}
