<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignaturaSeccionCurso;

class AsignaturaDocenteCursoController extends Controller {

    public function index() {

        $cursos = AsignaturaSeccionCurso::orderBy('id', 'desc')->paginate(10);
        return view('curso.index', compact('cursos'));
    }

    public function create() {

        return view('curso.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'year'=>'Required',
            'semestre'=>'Required',
            'num_seccion'=>'Required',
            'estado'=>'Required',
            'asignatura_id'=>'Required',
            'carrera_id'=>'Required',
            'usuario_id'=>'Required'
            ]);

        $curso = $request->all();
        AsignaturaSeccionCurso::create($curso);
        return redirect('curso/asignaturadocentecurso');

    }

    public function edit($id) {

        $curso = AsignaturaSeccionCurso::find($id);
        return view('curso.edit', compact('curso'));

    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'year'=>'Required',
            'semestre'=>'Required',
            'num_seccion'=>'Required',
            'estado'=>'Required',
            'asignatura_id'=>'Required',
            'carrera_id'=>'Required',
            'usuario_id'=>'Required'
        ]);

        $curso = AsignaturaSeccionCurso::find($id);
        $cursoUpdate = $request->all();
        $curso->update($cursoUpdate);
        return redirect('curso/asignaturadocentecurso');    
    }
}