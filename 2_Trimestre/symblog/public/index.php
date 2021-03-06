<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
// use Dotenv;


// $dotenv = new Dotenv\Dotenv(__DIR__);
// $dotenv =  Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv =  Dotenv\Dotenv::createImmutable(__DIR__ . '/..');

$dotenv->load();



$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_NAME'],
    'username'  => $_ENV['DB_USER'],
    'password'  => $_ENV['DB_PASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
]);
/* 
var_dump(getenv('DB_HOST'));
var_dump(getenv('DB_USER'));
var_dump($dotenv); */


$capsule->SetAsGlobal();


$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES

);
var_dump($request->getUri()->getPath());

$routerContainer = new RouterContainer();


$map = $routerContainer->getMap();

$map->get('index', '/symblog/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction',
    'auth' => true
]);

// $map->get('index', '/symblog/', '../index.php');
$map->get('addBlog', '/symblog/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction',
    'auth' => true
]);
$map->get('registrar', '/symblog/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);

$map->post('saveUser', '/symblog/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);

$map->post('saveBlog', '/symblog/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction',
    'auth' => true
]);
$map->get('login', '/symblog/users/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);

$map->post('saveLogin', '/symblog/users/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'

]);
$map->get('admin', '/symblog/users/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);
$map->get('logout', '/symblog/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout'
]);
$matcher = $routerContainer->getMatcher();

$route = $matcher->match($request);

$handlerData = $route->handler;
$controllerName = $handlerData['controller'];
$actionName = $handlerData['action'];

$needsAuth = $handlerData['auth'] ?? false;
$sessionUserId = $_SESSION['userId'] ?? null;
/* 
echo "<br>";
var_dump($needsAuth);
echo "<br>";
var_dump($sessionUserId); */

if ($needsAuth && !$sessionUserId) {

    header('Location: /symblog/users/login');
} else {


    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}
/* 
if (!$route) {
    echo 'No route  ';
} else {

    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    echo $response->getBody();
} */
//  var_dump($route);
/* 
 echo '<br><br>Visualización del handler<br><br>';
 var_dump($route->handler);

  */

/* $route = $_GET['route'] ?? '/';
if ($route == '/') {
    require '../index.php';
} elseif ($route == 'addblog') {
    require '../addBlog.php';
} elseif ($route == 'about') {
    require '../about.php';
} elseif ($route == 'contact') {
    require '../contact.php';
} else {
    echo "No route";
}
 */