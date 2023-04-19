<?php
session_start();
require_once "dbconnect.php";
$rl ="<a href='/pages/main.php'>Главная</a>";

if(isset($_POST["username"])) {
    $new = $_POST["username"];
    $current = $_SESSION["username"];
    $request = $connection->query("SELECT * FROM users WHERE username = '$new'");
    $result = $request->fetch_assoc();
    if(!empty($result)){
        echo "Данное имя уже используется! $rl";
        exit();
    }
    else {
        $request = $connection->query("UPDATE users SET username = '$new' WHERE username = '$current'");
    }
    $request = $connection->query("SELECT * FROM users WHERE username = '$new'");
    $result = $request->fetch_assoc();
    $_SESSION["username"] = $result["username"];
}
elseif(isset($_POST["email"])) {
    $new = $_POST["email"];
    $current = $_SESSION["email"];
    if(filter_var($new, FILTER_VALIDATE_EMAIL)) {
        $new = filter_var($new, FILTER_SANITIZE_EMAIL);
        $request = $connection->query("SELECT * FROM users WHERE email = '$new'");
        $result = $request->fetch_assoc();
        if(!empty($result)){
            echo "Данное имя уже используется! $rl";
            exit();
        }
        else {
            $request = $connection->query("UPDATE users SET email = '$new' WHERE email = '$current'");
        }
        $request = $connection->query("SELECT * FROM users WHERE email = '$new'");
        $result = $request->fetch_assoc();
        $_SESSION["email"] = $result["email"];
    }
    else{
        echo "Некорректный email $rl";
        exit();
    }
}
elseif(isset($_POST["phonenumber"])) {
    
    $new = $_POST["phonenumber"];
    $current = $_SESSION["phonenumber"];
    if(strlen($new) == 11) {
        if($new[0] == 8 || $new[0] == 8) {
            $new[0] = 7;
            $request = $connection->query("SELECT * FROM users WHERE phonenumber = '$new'");
            $result = $request->fetch_assoc();
            if(!empty($result)){
                echo "Данное имя уже используется! $rl";
                exit();
            }
            else {
                $request = $connection->query("UPDATE users SET phonenumber = '$new' WHERE phonenumber = '$current'");
            }
            $request = $connection->query("SELECT * FROM users WHERE phonenumber = '$new'");
            $result = $request->fetch_assoc();
            $_SESSION["phonenumber"] = $result["phonenumber"];
        }
        else
        {
            echo "Неправильный формат номера. $rl";
            exit();
        }
    }
    else {
        echo "Неверная длина номера. $rl";
        exit();
    }
}
elseif(isset($_POST["password"])) {
    $new = md5($_POST["password"]."difficulty");
    $current = $_SESSION["password"];
    $request = $connection->query("UPDATE users SET password_md5 = '$new' WHERE uspassword_md5 = '$current'");
    $request = $connection->query("SELECT * FROM users WHERE upassword_md5 = '$new'");
    $result = $request->fetch_assoc();
    $_SESSION["upassword"] = $result["password_md5"];
}

$connection->close();
header('Location: /pages/profile.php');
exit();











