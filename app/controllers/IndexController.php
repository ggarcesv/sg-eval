<?php

namespace App\Controllers;

use App\Models\BlogPost;

class IndexController extends BaseController
{
    public function getIndex()
    {

        return $this->render('index.twig');

    }
}
