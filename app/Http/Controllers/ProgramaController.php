<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programa;
use App\Unidad;
use App\Asignatura;


class ProgramaController extends Controller {

    public function index() {

        $programas = Programa::orderBy('id', 'asc')->paginate(10);

        return view('programa.index', compact('programas'));

    }

    public function detalle($id) {

        $programa = Programa::find($id);
        $unidadesList = Unidad::all()->where('estado', 1)->where('programa_id', $id);
        //$unidadesList = Unidad::all()->where('estado', 1) -> where('id', unidad->id);

        return view('programa.detalle', compact('programa','unidadesList'));

    }



/*
    public function detalle($id) {

        $programa = Programa::find($id);

        //$asignaturaList = Asignatura::all()->where('estado', 1) -> pluck('nombre','id');

        return view('programa.detalle', compact('programa'));

    }

*/
    public function create() {

       $asignaturaList = Asignatura::all()->where('estado', 1) -> pluck('nombre','id');
       return view('programa.create', compact('asignaturaList'));

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
        $asignaturaList = Asignatura::all()->where('estado', 1) -> pluck('nombre','id');
        $unidadesList = Unidad::all()->where('estado', 1)->where('programa_id', $id);

        return view('programa.edit', compact('programa','asignaturaList', 'unidadesList'));

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