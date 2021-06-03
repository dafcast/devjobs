<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * @param \App\Categoria $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria){

        $vacantes = $categoria->vacantes->where('estado', true);
        return view('categorias.show',['vacantes' => $vacantes, 'categoria' => $categoria]);
    }
}
