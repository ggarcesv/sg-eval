<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrica;

class RubricaController extends Controller {

    public function index() {

        $rubricas = Rubrica::orderBy('Id', 'desc')->paginate(10);
        return view('rubrica.index', compact('rubricas'));

    }

    public function create() {

        //$aspectoList = Aspecto::all()->where('estado', 1) -> pluck('nombre','id');
        //return view('criterio.create', compact('aspectoList'));

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

      //  $criterio = Criterio::find($id);
      //  $aspectoList = Aspecto::all()->where('estado', 1) -> pluck('nombre','id');

     //   return view('rubrica.edit', compact('criterio','aspectoList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'modulo_id'=>'Required',
            'asignacion_carrera_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubrica = Criterio::find($id);
        $rubricaUpdate = $request->all();
        $rubrica->update($rubricaUpdate);
        return redirect('rubrica');    
    }
}