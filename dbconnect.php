<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $db = "mydb";

    try {
        $connection = new mysqli($host, $dbusername, $dbpassword);
    }
    catch(Error $ex) {
        echo "ошибка подключения к бд.";
        exit();
    }

    $connection->query("CREATE DATABASE IF NOT EXISTS $db");
    $connection->query("USE $db");
    $connection->query(
        "CREATE TABLE IF NOT EXISTS users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE,
        phonenumber VARCHAR(30) NOT NULL UNIQUE,
        password_md5 VARCHAR(70) NOT NULL)"
        );
