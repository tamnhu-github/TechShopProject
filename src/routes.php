<?php

use App\Router;
use App\Controllers\PostController;
use App\Controllers\UserController;


// Usage:
$router = new Router();

// Add routes
$router->addRoute('/\//', [new PostController(), 'index']);
$router->addRoute('/\/post/', [new PostController(), 'index']);
$router->addRoute('/\/post\/index/', [new PostController(), 'index']);
$router->addRoute('/\/post\/show\/(\d+)/', [new PostController(), 'show']);
$router->addRoute('/\/post\/create/', [new PostController(), 'create']);
$router->addRoute('/\/post\/update\/(\d+)/', [new PostController(), 'update']);
$router->addRoute('/\/post\/delete\/(\d+)/', [new PostController(), 'delete']);

//Add User routes
$router->addRoute('/\//', [new UserController(), 'index']);
$router->addRoute('/\/user/', [new UserController(), 'index']);
$router->addRoute('/\/user\/index/', [new UserController(), 'index']);
$router->addRoute('/\/user\/show\/(\d+)/', [new UserController(), 'show']);
$router->addRoute('/\/user\/create/', [new UserController(), 'create']);
$router->addRoute('/\/user\/update\/(\d+)/', [new UserController(), 'update']);
$router->addRoute('/\/user\/delete\/(\d+)/', [new UserController(), 'delete']);
