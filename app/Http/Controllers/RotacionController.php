<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RotacionGrupo;
use App\Modulo;
use App\Curso;

class RotacionController extends Controller {

    public function index() {

        $rotaciones = RotacionGrupo::orderBy('Id', 'asc')->paginate(10);
        return view('rotacion.index', compact('rotaciones'));

    }

    public function create() {

        $cursoList = Curso::all()->where('estado', 1) -> pluck('nombre','id');
        $moduloList = Modulo::all()->where('estado', 1) -> pluck('nombre','id');

        return view('rotacion.create', compact('cursoList','moduloList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'rotacion_num'=>'Required',
            'modulo_id'=>'Required',
            'asignatura_seccion_curso_id'=>'Required',
            'estado'=>'Required',
            'fecha_inicio'=>'Required',
            'fecha_termino'=>'Required'
        ]);

        $rotacion = $request->all();
        RotacionGrupo::create($rotacion);
        return redirect('rotacion');

    }

    public function edit($id) {

        $rotacion = RotacionGrupo::find($id);
        $cursoList = Curso::all()->where('estado', 1) -> pluck('nombre','id');
        $moduloList = Modulo::all()->where('estado', 1) -> pluck('nombre','id');

        return view('rotacion.edit', compact('rotacion','cursoList','moduloList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'rotacion_num'=>'Required',
            'modulo_id'=>'Required',
            'asignatura_seccion_curso_id'=>'Required',
            'estado'=>'Required',
            'fecha_inicio'=>'Required',
            'fecha_termino'=>'Required'
        ]);

        $rotacion = RotacionGrupo::find($id);
        $rotacionUpdate = $request->all();
        $rotacion->update($rotacionUpdate);
        return redirect('rotacion');    
    }

}