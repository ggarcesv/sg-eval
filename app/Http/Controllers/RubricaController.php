<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrica;
use App\Modulo;
use App\AsignacionCarrera;

class RubricaController extends Controller {

    public function index() {

        $rubricas = Rubrica::orderBy('Id', 'desc')->paginate(10);
        return view('rubrica.index', compact('rubricas'));

    }

    public function create() {

        $moduloList = Modulo::all()->where('estado', 1) -> pluck('nombre','id');
        $asignacionCarreraList = AsignacionCarrera::all()->where('estado', 1) -> pluck('nombre','id');
        return view('rubrica.create', compact('moduloList','asignacionCarreraList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'modulo_id'=>'Required',
            'asignacion_carrera_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubrica = $request->all();
        Rubrica::create($rubrica);
        return redirect('rubrica');

    }

    public function edit($id) {

        $rubrica = Rubrica::find($id);
        $moduloList = Modulo::all()->where('estado', 1) -> pluck('nombre','id');
        $asignacionCarreraList = AsignacionCarrera::all()->where('estado', 1) -> pluck('nombre','id');

        return view('rubrica.edit', compact('rubrica','moduloList','asignacionCarreraList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'modulo_id'=>'Required',
            'asignacion_carrera_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubrica = Rubrica::find($id);
        $rubricaUpdate = $request->all();
        $rubrica->update($rubricaUpdate);
        return redirect('rubrica');    
    }
}