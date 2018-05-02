<?php

namespace app\controllers\admin;


use app\controllers\basecontroller;
use app\models\docente;

class indexcontroller extends basecontroller
{
    public function getIndex()
    {
        if (isset($_SESSION['userId']))
        {
            $userId=$_SESSION['userId'];
            $docente=docente::find($userId);

            if($docente)
            {
                return $this->render('admin/index.twig', ['docente'=>$docente]);
            }
        }

        header('Location:' . BASE_URL . 'auth/login');

    }

}