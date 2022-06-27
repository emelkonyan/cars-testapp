<?php


class Login extends Controller {

    function prepare() {
        if($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            /** 
             * If hackers are interested, here is where the SQL injection goes :)
             * TODO: sanitize inputs to prevent injection
             */
            $u = UserModel::loginUser($username, $password);
            if($u) {
                Session::set("logged_user", $username);
                Session::set("logged_user_id", $u['id']);
                header("Location: /dashboard");
            } else {
                $this->error = 'Bad credentials';
            }
        }
    }
    
    function __construct() {
        if(UserModel::isLogged()) {
            /** Logged users go to dashboard */
            header("Location: /dashboard");
        }
        $this->view = 'login';
    }
}
