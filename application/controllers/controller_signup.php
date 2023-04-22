<?php
class Controller_Signup extends Controller
{
    function __construct()
	{
		$this->model    = new Model_Signup();
		$this->view     = new View();
	}

	function action_index()
	{	
        session_start();

		$this->view->generate('signup_view.php', 'template_view.php');
	}

    function action_registration() {
        $username       = $this->check_name($_POST['username']);
        $email          = $this->check_email($_POST['email']);
        $phonenumber    = $this->check_phonenumber($_POST['phonenumber']);
        $password       = $this->check_password($_POST['password'], $_POST['password_ash']);
        if(empty($username) || empty($username) || empty($username) || empty($username)) {
            die();
        }
        else {
            try {
                $this->model->create($username, $email, $phonenumber, $password);
                $this->createSession($username, $email, $phonenumber, $password);
                header('Location: /profile');
            }
            catch (Error $ex) {
                $this->error("Ошибка регистрации: " . $ex);
            }
        }
    }

    private function check_name($username) {
        if(strlen($username) < 3 || strlen($username) > 90) {
            $this->error("Недопустимая длина имени");
        }
        else {
            if($this->model->is_exist("username", $username)){
                $this->error("Данное имя уже используется!");
            }
            else {
                return $username;
            }
        }
    }

    private function check_email($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(strlen($email) < 5 || strlen($email) > 90) {
                $this->error("Недопустимая длина email.");
            }
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if($this->model->is_exist("email", $email)){
                $this->error("Почта уже используется");
            }
            else {
                return $email;
            }
        }
        else {
            $this->error("Неверный формат почты");
        }
    }

    private function check_phonenumber($phonenumber) {
        $phonenumber = str_replace("\W", "", $phonenumber);
        if(strlen($phonenumber) == 11) {
            if($phonenumber[0] == 8 || $phonenumber[0] == 8) {
                $phonenumber[0] = 7;
                if($this->model->is_exist("phonenumber", $phonenumber))
                {
                    $this->error("Номер уже используется");
                }
                else {
                    return $phonenumber;
                }
            }
            else
            {
                $this->error("Неправильный формат номера.");   
            }
        }
        else {
            $this->error("Неверная длина номера.");
        }
    }

    private function check_password($password, $password_ash) {
        if(strlen($password) > 5) {
            if($password != $password_ash) {
                $this->error("Пароли не совпадают");
            }
            else {
                $password = md5($password."difficulty");
                return $password;
            }
        }
        else {
            $this->error("Пароль слишком короткий.");
        }
    }

    private function error($error_message) {
        session_start();
        $_SESSION['flash_message'] = $error_message;
        header('Location: /signup');
    }

    private function createSession($username, $email, $phonenumber, $password) {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["phonenumber"] = $phonenumber;
        $_SESSION["password"] = $password;
    }
}

