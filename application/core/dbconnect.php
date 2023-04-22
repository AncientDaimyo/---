<?php
final class DbConnection
{
    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "root";
    const DBNAME = "mydb";
    private static $instance;
    public $connection;
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
            
        }
        return self::$instance;
    }
    private function __construct()
    {
    }
    private function __clone()
    {
    }
    public function connect() {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';', self::USERNAME, self::PASSWORD);
            $this->connection->query("CREATE DATABASE IF NOT EXISTS " . self::DBNAME);
            $this->connection->query("USE " . self::DBNAME);
            $this->connection->query(
            "CREATE TABLE IF NOT EXISTS users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            email VARCHAR(70) NOT NULL UNIQUE,
            phonenumber VARCHAR(30) NOT NULL UNIQUE,
            password_md5 VARCHAR(70) NOT NULL)"
            );  
        }
        catch(PDOException $e) {
            $_SESSION['flash_message'] = "ошибка подключения к бд: " . $e;
            Route::ErrorPage404();
            exit();
        }
    }
}