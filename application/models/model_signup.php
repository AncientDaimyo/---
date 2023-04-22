<?php
require_once "application/core/dbconnect.php";
class Model_Signup extends Model
{
    public function get_data() {
        return array(
            //SQL запрос
        );
    }

    public function create($username, $email, $phonenumber, $password) {

        $db = DbConnection::getInstance();
        $db->connect();
        $query_string = "INSERT INTO users (username, email, phonenumber, password_md5) VALUES('$username', '$email', '$phonenumber', '$password')";
        $response = $db->connection->query($query_string);
        $db->connection = null;
        return $response;
    }

    public function is_exist($type, $object) {
        $db = DbConnection::getInstance();
        $db->connect();
        $query_string = "SELECT * FROM users WHERE " . $type . " = " . "'$object'";
        $response = $db->connection->query($query_string);
        $response = $response->fetch(PDO::FETCH_ASSOC);
        $db->connection = null;
        if(!empty($response)){
            return true;
        }
        else {
            return false;
        }
    }
}