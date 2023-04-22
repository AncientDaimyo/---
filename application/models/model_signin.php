<?php
require_once "application/core/dbconnect.php";
class Model_Signin extends Model
{
    public function get_data() {
        return array(
            //SQL запрос
        );
    }

    public function db_authentificate($login, $password, $type) {

        $db = DbConnection::getInstance();
        $db->connect();
        $query_string = "SELECT * FROM users WHERE " . $type . " = " . "'$login'" . " AND password_md5 = " . "'$password'";
        $response = $db->connection->query($query_string);
        $db->connection = null;
        return $response;
    }
}