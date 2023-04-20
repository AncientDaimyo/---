<head>
  <meta charset="utf-8" />
  <title>Вход</title>
  <link rel="stylesheet" href="www/style.css" />
</head>
<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));

$file = 'pages/' . $segments[0] . '.php';

if($segments[0] == "")
    header('Location: /pages/main.php');
elseif(file_exists($file))
header("Location: $file");
else
    header('Location: /pages/404.php');