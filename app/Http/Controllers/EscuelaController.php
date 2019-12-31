<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;

class EscuelaController extends Controller {

    public function index() {

        $escuelas = Escuela::orderBy('Id', 'asc')->paginate(10);
        return view('escuela.index', compact('escuelas'));

    }

    public function create() {

        return view('escuela.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $escuela = $request->all();
        Escuela::create($escuela);
        return redirect('config/escuela');

    }

    public function edit($id) {

        $escuela = Escuela::find($id);
        return view('escuela.edit', compact('escuela'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $escuela = Escuela::find($id);
        $escuelaUpdate = $request->all();
        $escuela->update($escuelaUpdate);
        return redirect('/config/escuela');    
    }

}