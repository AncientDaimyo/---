<?php
require_once "application/core/dbconnect.php";
class Model_Profile extends Model
{
    public function get_data() {
        return array (
            //vfccbd
        );
    }

    public function is_exist($type , $object) {
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

    public function read($type, $object, $password) {
        $db = DbConnection::getInstance();
        $db->connect();
        $query_string = "SELECT * FROM users WHERE " . $type . " = " . "'$object'" . " AND password_md5 = " . "'$password'";
        $response = $db->connection->query($query_string);
        $response = $response->fetch(PDO::FETCH_ASSOC);
        $db->connection = null;
        return $response;
    }
    public function update($type, $object, $password, $current ) {
        if($type == "password")
        {
            $db = DbConnection::getInstance();
            $db->connect();
            $query_string = "UPDATE users SET " . $type . " = " . "'$object'" . " WHERE username = " . "'$current'" . " AND password_md5 = " . "'$password'";
            $response = $db->connection->query($query_string);
            $db->connection = null;
            return $response;
        }
        else {
            $db = DbConnection::getInstance();
            $db->connect();
            $query_string = "UPDATE users SET " . $type . " = " . "'$object'" . " WHERE " . $type . " = " . "'$current'" . " AND password_md5 = " . "'$password'";
            $response = $db->connection->query($query_string);
            $db->connection = null;
            return $response;
        }
    }
}