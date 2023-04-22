<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="/wwwroot/css/remove-browser-style.css" />
	<link rel="stylesheet" type="text/css" href="/wwwroot/css/style.css" />
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title>Главная</title>
</head>
<body>
	<?php 
		require_once 'application/views/'.$content_view; 
	?>
</body>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</html>