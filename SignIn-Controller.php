<?php

require_once "dbconnect.php";
$rl ="<a href='/pages/main.php'>Главная</a>";

if(filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
    $email= filter_var($_POST['login'], FILTER_SANITIZE_EMAIL);
    $password = md5($_POST['password']."difficulty");
    $request = $connection->query("SELECT * FROM users WHERE email = '$email' AND password_md5 = '$password'");
    $emailRequest = $request->fetch_assoc();
    if(count($emailRequest) == 0){
        echo "Такой пользователь не найден.";
        exit();
    }
    else if(count($emailRequest) == 1){
        echo "Логин или пароль введены неверно";
        exit();
    }

    session_start();
    $_SESSION["username"] = $emailRequest['username'];
    $_SESSION["email"] = $emailRequest['email'];
    $_SESSION["phonenumber"] = $emailRequest['phonenumber'];
    $_SESSION["password"] = $emailRequest['password'];

    $connection->close();

    header('Location: /pages/profile.php');
}
else{
    $phoneNumber = str_replace("\W", "", $_POST['login']);
    if($phoneNumber[0] == 8 || $phoneNumber[0] == 8) {
        $phoneNumber[0] = 7;
    }
    else {
        echo "Логин или пароль введены неверно";
        exit();
    }
    $password = md5($_POST['password']."difficulty");
    $request = $connection->query("SELECT * FROM users WHERE phonenumber = '$phoneNumber' AND password_md5 = '$password'");
    $phoneNumberRequest = $request->fetch_assoc();
    if(count($phoneNumberRequest) == 0){
        echo "Такой пользователь не найден.";
        exit();
    }
    else if(count($phoneNumberRequest) == 1){
        echo "Логин или пароль введены неверно";
        exit();
    }

    session_start();
    $_SESSION["username"] = $phoneNumberRequest['username'];
    $_SESSION["email"] = $phoneNumberRequest['email'];
    $_SESSION["phonenumber"] = $phoneNumberRequest['phonenumber'];
    $_SESSION["password"] = $phoneNumberRequest['password'];

    $connection->close();

    header('Location: /pages/profile.php');
}
