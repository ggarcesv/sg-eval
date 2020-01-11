<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Criterio;
use App\RotacionGrupo;

class EvaluacionController extends Controller {

    public function index() {

        $evaluaciones = Evaluacion::orderBy('rotacion_grupo_id', 'asc')->paginate(10);
        return view('evaluacion.index', compact('evaluaciones'));

    }

    public function create() {

        $rotacionGrupoList = RotacionGrupo::all()->where('estado', 1) -> pluck('nombre','id');
        $criterioList = Criterio::all()->where('estado', 1) -> pluck('nombre','id');
        return view('evaluacion.create', compact('criterioList','rotacionGrupoList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rotacion_grupo_id'=>'Required',
            'nota'=>'Required',
        ]);

        $evaluacion = $request->all();
        Evaluacion::create($evaluacion);
        return redirect('evaluacion');

    }

    public function edit($id) {

        $evaluacion = Evaluacion::find($id);
        $rotacionGrupoList = RotacionGrupo::all()->where('estado', 1) -> pluck('nombre','id');
        $criterioList = Criterio::all()->where('estado', 1) -> pluck('nombre','id');

        return view('evaluacion.edit', compact('evaluacion','criterioList','rotacionGrupoList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rotacion_grupo_id'=>'Required',
            'nota'=>'Required'
        ]);

        $evaluacion = Evaluacion::find($id);
        $evaluacionUpdate = $request->all();
        $evaluacion->update($evaluacionUpdate);
        return redirect('evaluacion');    
    }
}