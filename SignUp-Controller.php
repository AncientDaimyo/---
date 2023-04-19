<?php

require_once "dbconnect.php";
$rl ="<a href='/pages/main.php'>Главная</a>";
$username = $_POST['username'];

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
}

$phoneNumber = str_replace("\W", "", $_POST['phoneNumber']);
if(strlen($phoneNumber) == 11) {
    if($phoneNumber[0] == 8 || $phoneNumber[0] == 8) {
        $phoneNumber[0] = 7;
    }
    else
    {
        echo "Неправильный формат номера. $rl";
    }
}
else {
    echo "Неверная длина номера. $rl";
}

$password = $_POST['password'];
$passwordAsh = $_POST['passwordAsh'];

if(strlen($username) < 3 || strlen($username) > 90) {
	echo "Недопустимая длина имени $rl";
	exit();
}
else if(strlen($email) < 5 || strlen($email) > 90) {
	echo "Недопустимая длина email. $rl";
	exit();
}

if(strlen($password) > 5) {
    if($password != $passwordAsh) {
        echo "Пароли не совпадают $rl";
        exit();
    }
}
else {
    echo "Пароль слишком короткий. $rl";
}



$password = md5($password."difficulty");



$request = $connection->query("SELECT * FROM users WHERE username = '$username'");
$nameRequest = $request->fetch_assoc();
if(!empty($nameRequest)){
    echo "Данное имя уже используется! $rl";
	exit();
}
$request = $connection->query("SELECT * FROM users WHERE email = '$email'");
$emailRequest = $request->fetch_assoc();
if(!empty($emailRequest)){
    echo "Данный email уже используется! $rl";
	exit();
}
$request = $connection->query("SELECT * FROM users WHERE phonenumber = '$phoneNumber'");
$phoneNumberRequest = $request->fetch_assoc();
if(!empty($phoneNumberRequest)){
    echo "Данный номер телефона уже используется! $rl";
	exit();
}

$connection->query("INSERT INTO users (username, email, phonenumber, password_md5)
	VALUES('$username', '$email', '$phoneNumber', '$password')");
$connection->close();
exit();