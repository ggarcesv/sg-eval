<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aspecto;

class AspectoController extends Controller {

    public function index() {

        $aspectos = Aspecto::orderBy('Id', 'asc')->paginate(10);
        return view('aspecto.index', compact('aspectos'));

    }

    public function create() {

        return view('aspecto.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'ponderacion'=>'Required',
            'estado'=>'Required'
        ]);

        $aspecto = $request->all();
        Aspecto::create($aspecto);
        return redirect('config/aspecto');

    }

    public function edit($id) {

        $aspecto = Aspecto::find($id);
        return view('aspecto.edit', compact('aspecto'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'ponderacion'=>'Required',
            'estado'=>'Required'
        ]);

        $aspecto = Aspecto::find($id);
        $aspectoUpdate = $request->all();
        $aspecto->update($aspectoUpdate);
        return redirect('/config/aspecto');    
    }

}