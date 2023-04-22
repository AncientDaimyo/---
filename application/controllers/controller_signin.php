<?php
class Controller_Signin extends Controller
{
    function __construct()
	{
		$this->model    = new Model_Signin();
		$this->view     = new View();
	}

	function action_index()
	{	
        session_start();
		$this->view->generate('signin_view.php', 'template_view.php');
	}

    function action_auth() {
        if(!empty($_POST['login'] && !empty($_POST['password']))) {
            $login      = $_POST['login'];
            $password   = md5($_POST['password']."difficulty");
            $type       = $this->determ_login_type($login);

            if($type == "email") {
                $login = filter_var($login, FILTER_SANITIZE_EMAIL);
            }
            elseif($type == "phonenumber") {
                $login = str_replace("\W", "", $login);
                if($login[0] == 8) {
                    $login[0] = 7;
                }
            }
            $response = $this->model->db_authentificate($login, $password, $type);   
            $this->check_response($response);
        }
        else {
            $_SESSION['flash_message'] = "Вы не ввели логин или пароль";
            header('Location: /signin');
        } 
        
    }

    private function determ_login_type($login) {
        if(filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return "email";
        }
        else{
            return "phonenumber";
        }
    }

    private function check_response($response) {
        $response = $response->fetch(PDO::FETCH_ASSOC);
        switch ($response) {
            case 0:
                session_start();
                $_SESSION['flash_message'] = "Такой пользователь не найден.";
                header('Location: /signin');
                break;
            case 1:
                session_start();
                $_SESSION['flash_message'] = "Логин или пароль введены неверно";
                header('Location: /signin');
                break;
            default:
                $this->createSession($response);
                header('Location: /profile');
                break;
        }
    }

    private function createSession($response) {
        session_start();
        $_SESSION["username"] = $response["username"];
        $_SESSION["email"] = $response["email"];
        $_SESSION["phonenumber"] = $response["phonenumber"];
        $_SESSION["password"] = $response["password_md5"];
    }
}
