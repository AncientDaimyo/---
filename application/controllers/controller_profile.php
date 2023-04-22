<?php
class Controller_Profile extends Controller
{
    function __construct() {
		$this->model    = new Model_Profile();
		$this->view     = new View();
	}
    function action_index() {
        //Пока не используется метод получения данных прямо из базы
		//$data = $this->model->read("username" , $_SESSION["username"], $_SESSION["password"]);
        $data = 0;
        session_start();
		$this->view->generate('profile_view.php', 'template_view.php', $data);
	}

    function action_change_name() {
        session_start();

		$new        = $_POST["username"];
        $current    = $_SESSION["username"];
        $password   = $_SESSION["password"];

        if ($this->model->is_exist("username", $new)) {
            session_start();
            $_SESSION['flash_message'] = "Имя уже используется";
            header('Location: /profile');
        } 

        $response = $this->model->update("username", $new, $password, $current);

        if($response) {
            $data = $this->model->read("username", $new, $password);
            $_SESSION["username"] = $data["username"];
            header('Location: /profile');
        }
        else {
            session_start();
            $_SESSION['flash_message'] = "Не удалось изменить имя";
            header('Location: /profile');
        }
	}

    function action_change_email() {
        session_start();

		if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $new        = $_POST["email"];
            $current    = $_SESSION["email"];
            $password   = $_SESSION["password"];

            if ($this->model->is_exist("email", $new)) {
                session_start();
                $_SESSION['flash_message'] = "Email уже используется";
                header('Location: /profile');
            }

            $response = $this->model->update("email", $new, $password, $current);

            if($response) {
                $data = $this->model->read("email", $new, $password);
                $_SESSION["email"] = $data["email"];
                header('Location: /profile');
            }
            else {
                session_start();
                $_SESSION['flash_message'] = "Не удалось изменить email";
                header('Location: /profile');
            }
        }
        else {
            session_start();
            $_SESSION['flash_message'] = "Некорректный email";
            header('Location: /profile');
        }
	}

    function action_change_phonenumber() {
        session_start();

        $new = str_replace("\W", "", $_POST['phoneNumber']);

        if(strlen($new) == 11) {
            if($new[0] == 8 ) {
                
                $new[0]     = 7;
                $current    = $_SESSION["phonenumber"];
                $password   = $_SESSION["password"];

                if ($this->model->is_exist("phonenumber", $new)) {
                    session_start();
                    $_SESSION['flash_message'] = "Номер уже используется";
                    header('Location: /profile');
                }

                $response = $this->model->update("phonenumber", $new, $password, $current);
                
                if($response) {
                    $data = $this->model->read("phonenumber", $new, $password);
                    $_SESSION["phonenumber"] = $data["phonenumber"];
                    header('Location: /profile');
                }
                else {
                    session_start();
                    $_SESSION['flash_message'] = "Не удалось изменить номер";
                    header('Location: /profile');
                }
            }
            else
            {
                session_start();
                $_SESSION['flash_message'] = "Неправильный формат номера.";
                header('Location: /profile');
            }
        }
        else {
            session_start();
            $_SESSION['flash_message'] = "Неверная длина номера.";
            header('Location: /profile');
        }
	}

    function action_change_password() {
        session_start();

		$new        = $_POST["password"];
        $current    = md5($_SESSION["password"]."difficulty");

        $response = $this->model->update("password", $new, $current, $_SESSION["username"]);

        if($response) {
            $data = $this->model->read("password", $_SESSION["username"], $new);
            $_SESSION["password"] = $data["password"];
            header('Location: /profile');
        }
        else {
            session_start();
            $_SESSION['flash_message'] = "Не удалось изменить пароль";
            header('Location: /profile');
        }
	}

    function action_logout() {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['phonenumber']);
        unset($_SESSION['password']);
        session_destroy();
        header('Location: /main');
    }
}