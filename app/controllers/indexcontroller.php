<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Docente;

class IndexController extends BaseController {

    public function getIndex() {

            if (isset($_SESSION['userId'])) {
    
                $userId=$_SESSION['userId'];
                $docente=docente::find($userId);
    
                if($docente) {
                    return $this->render('index.twig');
                }
            }
            header('Location:' . BASE_URL . 'auth/login');
    }
}
