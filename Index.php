<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));

$file = 'pages/' . $segments[0] . '.php';

if($segments[0] == ""){
    require "pages/main.php";
}
elseif(file_exists($file))
    require $file;
else
    require 'pages/404.php';