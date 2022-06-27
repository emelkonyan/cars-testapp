<?php


class Login extends Controller {

    function prepare() {
        if($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
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
            header("Location: /dashboard");
        }
        $this->view = 'login';
    }
}
