<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'class/router.php';
require 'class/route.php';
require 'Controller/frontend.php';



$router = new Router($_GET['action']); 

$router->get('/', homepage()); 

$router->get('/post/:id', post($id)); 

$router->run(); 
