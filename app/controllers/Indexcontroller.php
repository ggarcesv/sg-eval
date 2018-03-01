<?php
/**
 * Created by PhpStorm.
 * User: arkurogane
 * Date: 31-12-2017
 * Time: 19:23
 */


namespace App\controllers;

use App\Models\BlogPost;

class IndexController extends BaseController
{
    public function getIndex()
    {

        return $this->render('index.twig');

    }
}
