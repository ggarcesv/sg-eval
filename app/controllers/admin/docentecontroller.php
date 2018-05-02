<?php

namespace app\controllers\admin;


use app\controllers\basecontroller;
use app\models\docente;
use app\models\sede;
use \Sirius\Validation\Validator;
use illuminate\support\Facades\DB;

class docentecontroller extends basecontroller
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

    public function getLista()
    {

        $docente=docente::select('id','nombre','email','sede_id')->get();
        return $this->render('admin/docente.twig',[
            'docente'=>$docente
        ]);

    }

    public function getCreate()
    {

        $sede=sede::all();

        return $this->render('admin/registro_docente.twig',['sede'=>$sede]);

    }


    public function postCreate()
    {
        $errors=[];
        $result=false;
        $validator=new Validator();
        $validator->add('rut','required');
        $validator->add('nombre','required');
        $validator->add('email','required');
        $validator->add('email','email');

        if ($validator->validate($_POST))
        {
            $user=new docente();
            $user->id=$_POST['rut'];
            $user->nombre=$_POST['nombre'];
            $user->email=$_POST['email'];
            $user->password=password_hash($_POST['rut'], PASSWORD_DEFAULT);
            $user->sede_id=$_POST['sede'];
            $user->save();
            $result=true;
        }else{
            $errors=$validator->getMessages();
        }

        $sede=sede::all();
        return $this->render('admin/registro_docente.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'sede'=>$sede
        ]);

    }

    public function getDatos()
    {
        $userId=$_SESSION['userId'];

        $docente=docente::find($userId);

        return $this->render('admin/mis_datos.twig', ['docente'=>$docente]);
    }


    public function postDatos()
    {
        $userId=$_SESSION['userId'];


        $docente=docente::find($userId);

        $errors=[];
        $result=false;
        $validator=new Validator();
        $validator->add('password','required');
        $validator->add('npassword','required');
        $validator->add('cpassword','required');

        if ($validator->validate($_POST))
        {
            if ($_POST['npassword']==$_POST['cpassword'] && password_verify($_POST['password'], $docente->password)){

                $docente->password=password_hash($_POST['npassword'], PASSWORD_DEFAULT);
                $docente->update();
                $result=true;
            }

        }else{
            $errors=$validator->getMessages();
        }



        return $this->render('admin/mis_datos.twig', [
            'docente'=>$docente,
            'result'=>$result,
            'errors'=>$errors,
        ]);

    }



}