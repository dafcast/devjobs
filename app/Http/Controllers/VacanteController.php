<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->simplepaginate(3);
        // dd($vacantes);
        return view('vacantes.index', ['vacantes' => $vacantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicacions = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.create',[
                'categorias' => $categorias,
                'experiencias' => $experiencias,
                'ubicacions' => $ubicacions,
                'salarios' => $salarios
            ]);
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
            'titulo' => ['required','min:8'],
            'categoria' => ['required'],
            'experiencia' => ['required'],
            'ubicacion' => ['required'],
            'salario' => ['required'],
            'descripcion' => 'required|min:50',
            'imagen' => ['required'],
            'skills' => ['required'],
        ]);

        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'],
            'skills' => $data['skills']
        ]);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show',['vacante' => $vacante]);
        // return view('vacantes.show')->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
    }

    public function imagen(Request $request){
        $imagen = $request->file('file');

        // $nombreImagen = $imagen->getClientOriginalName();
        $nombreImagen = time() . '.' . $imagen->extension();
        $path_imagen = $imagen->move(public_path('storage/vacantes'),$nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    public function eliminarimagen(Request $request){
        
        $imagen = $request->get('imagen');


        if( File::exists('storage/vacantes/' . $imagen)){
            File::delete('storage/vacantes/' . $imagen);
        }

        return response('Imagen eliminada', 200);
    }

    public function estado(Vacante $vacante, Request $request){
        $vacante->estado = $request->estado;
        $vacante->save();

        return ['respuesta' => 'correcto'];
    }
}
