<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Privilegio;

class RolController extends Controller {

    public function index() {

        $roles = Rol::orderBy('Id', 'asc')->paginate(10);
        return view('rol.index', compact('roles'));

    }

    public function create() {

        $privilegioList = Privilegio::all()->where('estado', 1) -> pluck('nombre','id');

        return view('rol.create', compact('privilegioList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required',
            'privilegio_id'=>'Required'
        ]);

        $rol = $request->all();
        Rol::create($rol);
        return redirect('config/rol');

    }

    public function edit($id) {

        $rol = Rol::find($id);
        $privilegioList = Privilegio::all()->where('estado', 1) -> pluck('nombre','id');

        return view('rol.edit', compact('rol','privilegioList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required',
            'privilegio_id'=>'Required'

        ]);

        $rol = Rol::find($id);
        $rolUpdate = $request->all();
        $rol->update($rolUpdate);
        return redirect('/config/rol');    
    }

}