<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrera;


class CarreraController extends Controller {

    public function index() {

        $carreras = Carrera::orderBy('Id', 'asc')->paginate(10);

        return view('carrera.index', compact('carreras'));

    }





    public function create() {

        return view('carrera.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $carrera = $request->all();
        Carrera::create($carrera);
        return redirect('config/carrera');

    }

    public function edit($id) {

        $carrera = Carrera::find($id);
        return view('carrera.edit', compact('carrera'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $carrera = Carrera::find($id);
        $carreraUpdate = $request->all();
        $carrera->update($carreraUpdate);
        return redirect('/config/carrera');
    }
}