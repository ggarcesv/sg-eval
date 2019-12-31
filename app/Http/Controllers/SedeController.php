<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sede;

class SedeController extends Controller {

    public function index() {

        $sedes = sede::orderBy('Id', 'asc')->paginate(10);
        return view('sede.index', compact('sedes'));

    }

    public function create() {

        return view('sede.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'nombre'=>'Required',
            'direccion'=>'Required',
            'telefono'=>'Required',
            'estado'=>'Required'
        ]);

        $sede = $request->all();
        sede::create($sede);
        return redirect('config/sede');

    }

    public function edit($id) {
        
        $sede = sede::find($id);
        return view('sede.edit', compact('sede'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'nombre'=>'Required',
            'direccion'=>'Required',
            'telefono'=>'Required',
            'estado'=>'Required'
        ]);

        $sede = sede::find($id);
        $sedeUpdate = $request->all();
        $sede->update($sedeUpdate);
        return redirect('/config/sede');    
    }

}