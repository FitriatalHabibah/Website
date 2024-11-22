<?php

header("Content-Type: application/json; charset=UTF-8");

include 'app/Routes/DoaRoutes.php';

use app\Routes\DoaRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$doaRoutes = new DoaRoutes();
$doaRoutes->handle($method, $path);
