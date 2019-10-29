<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Docente;

class IndexController extends BaseController {

    public function getIndex() {
        
            header('Location:' . BASE_URL . 'auth/login');
    }
}
