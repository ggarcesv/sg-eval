<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;

class AsignaturaController extends Controller {

    public function index() {

        $asignaturas = Asignatura::orderBy('id', 'asc')->paginate(10);
        return view('asignatura.index', compact('asignaturas'));

    }

    public function create() {

        return view('asignatura.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $asignatura = $request->all();
        Asignatura::create($asignatura);
        return redirect('config/asignatura');

    }

    public function edit($id) {

        $asignatura = Asignatura::find($id);
        return view('asignatura.edit', compact('asignatura'));

    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $asignatura = Asignatura::find($id);
        $asignaturaUpdate = $request->all();
        $asignatura->update($asignaturaUpdate);
        return redirect('/config/asignatura');    
    }
}