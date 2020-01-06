<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;

class ModuloController extends Controller {

    public function index() {

        $modulos = Modulo::orderBy('Id', 'asc')->paginate(10);
        return view('modulo.index', compact('modulos'));

    }

    public function create() {

        return view('modulo.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $modulo = $request->all();
        Modulo::create($modulo);
        return redirect('config/modulo');

    }

    public function edit($id) {

        $modulo = Modulo::find($id);

        return view('modulo.edit',compact('modulo'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $modulo = Modulo::find($id);
        $moduloUpdate = $request->all();
        $modulo->update($moduloUpdate);
        return redirect('/config/modulo');    
    }

}