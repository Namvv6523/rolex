<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

// Category
$router->get('category/list',[App\Controllers\CategoryController::class, 'show']);
$router->get('category/store',[App\Controllers\CategoryController::class, 'store']);
$router->post('category/create',[App\Controllers\CategoryController::class, 'create']);
$router->get('category/detail/{id}',[App\Controllers\CategoryController::class, 'detail']);
$router->post('category/update/{id}',[App\Controllers\CategoryController::class, 'update']);
$router->get('category/delete/{id}',[App\Controllers\CategoryController::class, 'delete']);

// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>