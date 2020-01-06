<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programa;
use App\Unidad;
use App\Asignatura;


class ProgramaController extends Controller {

    public function index() {

        $programas = Programa::orderBy('id_programa', 'asc')->paginate(10);

        return view('programa.index', compact('programas'));

    }

    public function detalle($id_programa) {

       
        $programa = Programa::find($id_programa);

        $unidadesList = Unidad::all()->where('estado_unidad', 1)->where('programa_id', $id_programa);

        return view('programa.detalle', compact('programa','unidadesList'));

    }



/*
    public function detalle($id) {

        $programa = Programa::find($id);

        //$asignaturaList = Asignatura::all()->where('estado', 1) -> pluck('nombre','id');

        return view('programa.detalle', compact('programa'));

    }

*/
    public function create() {

       $asignaturaList = Asignatura::all()->where('estado', 1) -> pluck('nombre','id');
       return view('programa.create', compact('asignaturaList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id_programa'=>'Required',
            'nombre_programa'=>'Required',
            'year_programa'=>'Required',
            'estado_programa'=>'Required'
        ]);


        $programa = $request->all();
        Programa::create($programa);
        return redirect('config/programa');

    }

    public function edit($id_programa) {

        $programa = Programa::find($id_programa);
        $asignaturaList = Asignatura::all()->where('estado', 1) -> pluck('nombre','id');
        $unidadesList = Unidad::all()->where('estado_unidad', 1)->where('programa_id', $id_programa);

        return view('programa.edit', compact('programa','asignaturaList', 'unidadesList'));

    }

    public function update(Request $request, $id_programa) {

        $programaUpdate = $this->validate($request, [
            'id_programa'=>'Required',
            'nombre_programa'=>'Required',
            'year_programa'=>'Required',
            'estado_programa'=>'Required'
        ]);

        $programa = Programa::find($id_programa);
        $programa->update($programaUpdate);


        $UnidadUpdate = array($this->validate($request, [
            'id_unidad'=>'Required',
            'nombre_unidad'=>'Required',
            'descripcion_unidad'=>'Required'
        ]));

        //die(var_dump($UnidadUpdate));
        //    (var_dump($id_unidad));


        /*
        $id_unidades = $request->id_unidad;
        $nombre_unidades = $request->nombre_unidad;
        $descripcion_unidades =  $request->descripcion_unidad;
        $i=0;


        foreach($id_unidades as $id_unidad) {

            $instanciaUnidad = Unidad::find($id_unidad);
            $instanciaUnidad->update($UnidadUpdate[$id_unidad]);

        }
        
        */




/*

        foreach ($UnidadUpdate as $unidad) {
            
            (var_dump($unidad));
            (var_dump('------------------------------'));

            $id_unidad=array_column($unidad, 'id_unidad');
            (var_dump($id_unidad));

            $unidad = Unidad::find($id_unidad);
            $unidadUpdate = $unidad->all();
            $unidad->update($unidadUpdate);
        }
*/
        return redirect('/config/programa');
    }
}