<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programa;
use App\Unidad;
use App\UnidadDetalle;


class ProgramaController extends Controller {

    public function index() {

        $programas = Programa::orderBy('id', 'asc')->paginate(10);

        return view('programa.index', compact('programas'));

    }


    public function create() {

        //$escuelaList = Escuela::all()->where('estado', 1) -> pluck('nombre','id');
       // return view('programa.create', compact('escuelaList'));

       return view('programa.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'year'=>'Required',
            'estado'=>'Required'
        ]);


        $programa = $request->all();
        Programa::create($programa);
        return redirect('config/programa');

    }

    public function edit($id) {

        $programa = Programa::find($id);

        //$escuelaList = Escuela::all()->where('estado', 1) -> pluck('nombre','id');
        

        //return view('carrera.edit', compact('carrera','escuelaList'));



    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'year'=>'Required',
            'estado'=>'Required'
        ]);

        $programa = Programa::find($id);
        $programaUpdate = $request->all();
        $programa->update($programaUpdate);
        return redirect('/config/programa');
    }
}