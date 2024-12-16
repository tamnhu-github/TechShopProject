<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\PostController;
use App\Controllers\UserController;
use App\Router;

require __DIR__. '/src/routes.php';

$uri = $_SERVER['REQUEST_URI'];

$router->match($uri);

// Try to match differents URIs
// $uri = '/post';
// $uri = '/post/index';
// $uri = '/post/show/1';
// $uri = '/';
// $uri = '/post/create';
// $uri = '/post/update/2';




// Old version of index
/*
$controller = new PostController();

$action = $_GET['action'] ?? 'index';
$postId = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($postId);
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $controller->update($postId);
        break;
    case 'delete':
        $controller->delete($postId);
        break;
    default:
        echo '404 Not Found';
}
*/