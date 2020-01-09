<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RubricaDetalle;


class RubricaDetalleController extends Controller {

    public function index() {

        $rubricaDetalles = RubricaDetalle::orderBy('Id', 'desc')->paginate(10);
        return view('rubricadetalle.index', compact('rubricaDetalles'));

    }

    public function create() {

        return view('rubricadetalle.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rubrica_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubricaDetalle = $request->all();
        RubricaDetalle::create($rubricaDetalle);
        return redirect('rubricadetalle');

    }

    public function edit($id) {

        $rubricaDetalle = RubricaDetalle::find($id);
        return view('rubricadetalle.edit', compact('rubricaDetalle'));

    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'criterio_id'=>'Required',
            'rubrica_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rubricaDetalle = RubricaDetalle::find($id);
        $rubricaDetalleUpdate = $request->all();
        $rubricaDetalle->update($rubricaDetalleUpdate);
        return redirect('rubricadetalle');    
    }
}