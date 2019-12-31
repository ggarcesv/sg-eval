<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sede;

class SedeController extends Controller {

    public function index() {

        $sedes = Sede::orderBy('Id', 'asc')->paginate(10);
        return view('sede.index', compact('sedes'));

    }

    public function create() {

        return view('sede.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'direccion'=>'Required',
            'telefono'=>'Required',
            'estado'=>'Required'
        ]);

        $sede = $request->all();
        Sede::create($sede);
        return redirect('config/sede');

    }

    public function edit($id) {

        $sede = Sede::find($id);
        return view('sede.edit', compact('sede'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'direccion'=>'Required',
            'telefono'=>'Required',
            'estado'=>'Required'
        ]);

        $sede = Sede::find($id);
        $sedeUpdate = $request->all();
        $sede->update($sedeUpdate);
        return redirect('/config/sede');    
    }

}