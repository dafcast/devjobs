<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function index(Vacante $vacante)
    {
        // $candidatos = $vacante->candidatos;
        return view('candidatos.index',['vacante' => $vacante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        $nombreArvhivo = time() . '.' .$data['cv']->extension();
        $data['cv']->move(public_path('storage/cv/'), $nombreArvhivo);

        
        //Envio a base de datos con DB

        // DB::table('candidatos')->insert([
        //     'nombre' => $data['nombre'],
        //     'email' => $data['email'],
        //     'cv' => $data['cv'],
        //     'vacante_id' => $data['vacante_id'],
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        //Envio a base de datos con instancia de modelo (no requiere fillable)

        // $candidato = new Candidato();
        // $candidato->nombre = $data['nombre'];
        // $candidato->email = $data['email'];
        // $candidato->cv = $nombreArvhivo;
        // $candidato->vacante_id = $data['vacante_id'];  
        // $candidato->save();

        //Envio a base de datos con instancia de modelo (no requiere fillable)

        // // $data['cv'] = $nombreArvhivo;        
        // $candidato = new Candidato();
        // $candidato->fill($data);
        // $candidato->cv = $nombreArvhivo;
        // $candidato->save();

        // $data['cv'] = $nombreArvhivo;
        // $candidato = new Candidato($data);
        // $candidato->save();

        // $data['cv'] = $nombreArvhivo;
        // Candidato::create($data);


        $vacante = Vacante::find($data['vacante_id']);
        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArvhivo
        ]);

        $vacante->user->notify(new NuevoCandidato($vacante));


        return back()->with('estado','datos enviados, en los proximos dias sera contactado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
