<?php

require_once "dbconnect.php";
$rl ="<a href='/pages/main.php'>Главная</a>";
session_start();


$login = $_POST['login'];
$password = md5($_POST['password']."difficulty");
auth($login, $password, $connection);




function auth($login, $password, $connection) {
    if($_POST['login'] != "") {
        $LoginType = loginType($login);
        $login = $LoginType[0];
        $type = $LoginType[1];
        $response = authRequest($login, $type, $password, $connection);
        switch ($response) {
            case 0:
                $_SESSION['flash_message'] = "Такой пользователь не найден.";
                header('Location: /pages/signin.php');
                break;
            case 1:
                $_SESSION['flash_message'] = "Логин или пароль введены неверно";
                header('Location: /pages/signin.php');
                break;
            default:
                createSession($response);
                header('Location: /pages/profile.php');
                break;
        }
    }
    else {
        $_SESSION['flash_message'] = "вы не ввели логин";
        header('Location: /pages/signin.php');
    } 
}

function loginType($login) {
    if(filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $login= filter_var($_POST['login'], FILTER_SANITIZE_EMAIL);
        return [$login,'email'];
    }
    else{
        $phoneNumber = str_replace("\W", "", $_POST['login']);
        if($phoneNumber[0] == 8 || $phoneNumber[0] == 8) {
            $phoneNumber[0] = 7;
        }
        return [$login,'phonenumber'];
    }
}

function authRequest($login, $type, $password, $connection) {
    $request = $connection->query("SELECT * FROM users WHERE '$type' = '$login'");
    $response = $request->fetch_assoc();
    if(empty($response)){
        return 0;
    }
    else if($response['password_md5'] != $password){
        return 1;
    }
    return $requestArr;
};

function createSession($response) {
    session_start();
    $_SESSION["username"] = $response['username'];
    $_SESSION["email"] = $response['email'];
    $_SESSION["phonenumber"] = $response['phonenumber'];
    $_SESSION["password"] = $response['password'];
}

$connection->close();