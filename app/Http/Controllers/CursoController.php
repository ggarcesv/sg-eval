<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Usuario;
use App\Asignatura;
use App\Carrera;

class CursoController extends Controller {

    public function index() {

        $cursos = Curso::orderBy('id', 'desc')->paginate(10);
        return view('curso.index', compact('cursos'));
    }

    public function create() {

        $docenteList = Usuario::all() ->where('estado', 1) ->where('rol_id', 2) ->pluck('nombre','id');
        $asignaturaList = Asignatura::all() ->where('estado', 1) ->pluck('nombre','id');
        $carreraList = Carrera::all() ->where('estado', 1) ->pluck('nombre','id');

        return view('curso.create', compact('docenteList','asignaturaList','carreraList'));
    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'usuario_id'=>'Required',
            'asignatura_id'=>'Required',
            'year'=>'Required',
            'num_seccion'=>'Required',
            'carrera_id'=>'Required',
            'estado'=>'Required'
            ]);

        $curso = $request->all();
        Curso::create($curso);
        return redirect('curso');

    }

    public function edit($id) {

        $curso = Curso::find($id);
        $docenteList = Usuario::all() ->where('estado', 1) ->where('rol_id', 2) ->pluck('nombre','id');
        $asignaturaList = Asignatura::all() ->where('estado', 1) ->pluck('nombre','id');
        $carreraList = Carrera::all() ->where('estado', 1) ->pluck('nombre','id');

        return view('curso.edit', compact('curso','docenteList','asignaturaList','carreraList'));

    }

    public function detalle($id) {

        $curso = Curso::find($id);
        return view('curso.detalle', compact('curso'));

    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'year'=>'Required',
            'num_seccion'=>'Required',
            'estado'=>'Required',
            'asignatura_id'=>'Required',
            'carrera_id'=>'Required',
            'usuario_id'=>'Required'
        ]);

        $curso = Curso::find($id);
        $cursoUpdate = $request->all();
        $curso->update($cursoUpdate);
        return redirect('curso');    
    }
}