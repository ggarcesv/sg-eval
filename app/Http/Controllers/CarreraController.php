<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrera;
use App\Escuela;

class CarreraController extends Controller {

    public function index() {

        $carreras = Carrera::orderBy('id', 'asc')->paginate(10);

        return view('carrera.index', compact('carreras'));

    }

    public function create() {

        $escuelaList = Escuela::all()->where('estado', 1) -> pluck('nombre','id');

        return view('carrera.create', compact('escuelaList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required',
            'escuela_id'=>'Required'

        ]);


        $carrera = $request->all();
        Carrera::create($carrera);
        return redirect('config/carrera');

    }

    public function edit($id) {

        $carrera = Carrera::find($id);

        $escuelaList = Escuela::all()->where('estado', 1) -> pluck('nombre','id');
        

        return view('carrera.edit', compact('carrera','escuelaList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required',
            'escuela_id'=>'Required'
        ]);

        $carrera = Carrera::find($id);
        $carreraUpdate = $request->all();
        $carrera->update($carreraUpdate);
        return redirect('/config/carrera');
    }
}