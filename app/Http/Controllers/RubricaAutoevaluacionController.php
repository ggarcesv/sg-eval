<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RubricaAutoevaluacion;


class RubricaAutoevaluacionController extends Controller {

    public function index() {

        $rubricaAutoevaluaciones = RubricaAutoevaluacion::orderBy('Id', 'desc')->paginate(10);
        return view('autoevaluacion.index', compact('rubricaAutoevaluaciones'));

    }

    public function create() {

       
        return view('autoevaluacion.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $rubricaAutoevaluacion = $request->all();
        RubricaAutoevaluacion::create($rubricaAutoevaluacion);
        return redirect('autoevaluacion');

    }

    public function edit($id) {

        $rubricaAutoevaluacion = RubricaAutoevaluacion::find($id);

        return view('autoevaluacion.edit', compact('rubricaAutoevaluacion'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $rubricaAutoevaluacion = RubricaAutoevaluacion::find($id);
        $rubricaAutoevaluacionUpdate = $request->all();
        $rubricaAutoevaluacion->update($rubricaAutoevaluacionUpdate);
        return redirect('autoevaluacion');    
    }
}