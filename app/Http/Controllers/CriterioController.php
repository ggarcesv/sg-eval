<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criterio;
use App\Aspecto;

class CriterioController extends Controller {

    public function index() {

        $criterios = Criterio::orderBy('Id', 'asc')->paginate(10);
        return view('criterio.index', compact('criterios'));

    }

    public function create() {

        $aspectoList = Aspecto::all()->where('estado', 1) -> pluck('nombre','id');
        return view('criterio.create', compact('aspectoList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'aspecto_id'=>'Required',
            'estado'=>'Required'
        ]);

        $criterio = $request->all();
        Criterio::create($criterio);
        return redirect('config/criterio');

    }

    public function edit($id) {

        $criterio = Criterio::find($id);
        $aspectoList = Aspecto::all()->where('estado', 1) -> pluck('nombre','id');

        return view('criterio.edit', compact('criterio','aspectoList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'aspecto_id'=>'Required',
            'estado'=>'Required'
        ]);

        $criterio = Criterio::find($id);
        $criterioUpdate = $request->all();
        $criterio->update($criterioUpdate);
        return redirect('/config/criterio');    
    }
}