<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

$baseUrl='';
$baseDir= str_replace(basename($_SERVER['SCRIPT_NAME']), '',$_SERVER['SCRIPT_NAME']);

$baseUrl='http://'.$_SERVER['HTTP_HOST'].$baseDir;

define('BASE_URL',$baseUrl);

$dotenv= new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route']?? '/';


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$router = new RouteCollector();

$router->filter('auth', function (){
    if (!isset($_SESSION['userId']))
    {
        header('Location:' . BASE_URL . 'auth/login');
        return false;
    }
});

$router->controller('/auth', app\controllers\authcontroller::class);

$router->group(['before'=>'auth'], function ($router){
$router->controller('/admin', app\controllers\admin\indexcontroller::class);
$router->controller('admin/docente',app\controllers\admin\docentecontroller::class);
$router->controller('admin/academico',app\controllers\admin\academicocontroller::class);
$router->controller('admin/criterios',app\controllers\admin\criterioscontroller::class);
$router->controller('admin/evaluacion',app\controllers\admin\evaluacioncontroller::class);
});

$router->controller('/', app\controllers\indexcontroller::class);

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;
