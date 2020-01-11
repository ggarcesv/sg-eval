<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RotacionGrupo;

class NotasController extends Controller {

    public function index() {

        $rotacionGrupos = RotacionGrupo::all();
        return view('notas.index', compact('rotacionGrupos'));

    }

}