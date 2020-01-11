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

        $criterioList = Criterio::all()->where('estado', 1) -> pluck('nombre','id');
        return view('evaluacion.create', compact('criterioList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rotacion_grupo_id'=>'Required',
            'observacion'=>'Required'
        ]);

        $criterio = $request->all();
        Criterio::create($criterio);
        return redirect('evaluacion');

    }

    public function edit($id) {

        //$criterio = Criterio::find($id);
        //$aspectoList = Aspecto::all()->where('estado', 1) -> pluck('nombre','id');

        return view('evaluacion.edit', compact('criterio','aspectoList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rotacion_grupo_id'=>'Required',
            'observacion'=>'Required'
        ]);

        $evaluacion = Criterio::find($id);
        $evaluacionUpdate = $request->all();
        $evaluacion->update($evaluacionUpdate);
        return redirect('evaluacion');    
    }
}