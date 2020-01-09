<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RubricaAutoevaluacionDetalle;


class RubricaAutoevaluacionDetalleController extends Controller {

    public function index() {

        $rubricaAutoevaluacionDetalles = RubricaAutoevaluacionDetalle::orderBy('Id', 'desc')->paginate(10);
        return view('autoevaluaciondetalle.index', compact('rubricaAutoevaluacionDetalles'));

    }

    public function create() {

        return view('autoevaluaciondetalle.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rubrica_autoevaluacion_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubricaAutoevaluacionDetalle = $request->all();
        RubricaAutoevaluacionDetalle::create($rubricaAutoevaluacionDetalle);
        return redirect('autoevaluaciondetalle');

    }

    public function edit($id) {

        $rubricaAutoevaluacionDetalle = RubricaAutoevaluacionDetalle::find($id);
        return view('autoevaluaciondetalle.edit', compact('rubricaAutoevaluacionDetalle'));

    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rubrica_autoevaluacion_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubricaAutoevaluacionDetalle = RubricaAutoevaluacionDetalle::find($id);
        $rubricaAutoevaluacionDetalleUpdate = $request->all();
        $rubricaAutoevaluacionDetalle->update($rubricaAutoevaluacionDetalleUpdate);
        return redirect('autoevaluaciondetalle');    
    }
}