<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Ubicacion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $vacantes = Vacante::where('estado',true)->latest()->get();
        $ubicacions = Ubicacion::all();
        return view('inicio.index', ['vacantes' => $vacantes, 'ubicacions' => $ubicacions]);
    }
}
