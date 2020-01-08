<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripcion;

class InscripcionController extends Controller {

    public function index() {

        $inscripciones = Inscripcion::orderBy('Id', 'desc')->paginate(10);
        
        return view('inscripcion.index', compact('inscripciones'));

    }

    public function create() {

        return view('inscripcion.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'curso_id'=>'Required',
            'usuario_id'=>'Required',
            'estado'=>'Required'
        ]);

        $inscripcion = $request->all();
        Inscripcion::create($inscripcion);
        return redirect('inscripcion');

    }

    public function edit($id) {

        $inscripcion = Inscripcion::find($id);
        return view('inscripcion.edit', compact('inscripcion'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'curso_id'=>'Required',
            'usuario_id'=>'Required',
            'estado'=>'Required'
        ]);

        $inscripcion = Inscripcion::find($id);
        $inscripcionUpdate = $request->all();
        $inscripcion->update($inscripcionUpdate);
        return redirect('inscripcion');    
    }

}