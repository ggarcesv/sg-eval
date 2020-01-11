<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RotacionAlumnoDetalle;


class RotacionDetalleController extends Controller {

    public function index() {

        $rotacionesDetalles = RotacionAlumnoDetalle::orderBy('usuario_id', 'asc')->paginate(10);
        return view('rotaciondetalle.index', compact('rotacionesDetalles'));

    }

    public function create() {

        return view('rotaciondetalle.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'rotacion_grupo_id'=>'Required',
            'usuario_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rotacionDetalle = $request->all();
        RotacionAlumnoDetalle::create($rotacionDetalle);
        return redirect('rotaciondetalle');

    }

    public function edit($id) {

        $rotacionDetalle = RotacionAlumnoDetalle::find($id);
        return view('rotaciondetalle.edit', compact('rotacionDetalle'));

    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'rotacion_grupo_id'=>'Required',
            'usuario_id'=>'Required',
            'estado'=>'Required'
        ]);

        $rotacionDetalle = RotacionAlumnoDetalle::find($id);
        $rotacionDetalleUpdate = $request->all();
        $rotacionDetalle->update($rotacionDetalleUpdate);
        return redirect('rotaciondetalle');    
    }
}