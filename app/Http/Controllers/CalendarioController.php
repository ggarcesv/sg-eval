<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendario;

class CalendarioController extends Controller {

    public function index() {

        $calendarios = Calendario::orderBy('Id', 'asc')->paginate(10);
        return view('calendario.index', compact('calendarios'));

    }

    public function create() {

        return view('calendario.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'fecha'=>'Required',
            'estado'=>'Required',
            'asignatura_seccion_curso_id'=>'Required'

        ]);

        $calendario = $request->all();
        Calendario::create($calendario);
        return redirect('calendario');

    }

    public function edit($id) {

        $calendario = Calendario::find($id);
        return view('calendario.edit', compact('calendario'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'fecha'=>'Required',
            'estado'=>'Required',
            'asignatura_seccion_curso_id'=>'Required'
        ]);

        $calendario = Calendario::find($id);
        $calendarioUpdate = $request->all();
        $calendario->update($calendarioUpdate);
        return redirect('calendario');    
    }

}