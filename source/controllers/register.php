<?php


class Register extends Controller {

    function prepare() {
        if($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(UserModel::checkIfExists($username)) {
                $this->error = 'Username exists';
            } else {
                UserModel::registerUser($username, $password);
                $this->view = 'registered';
            }
        }
    }
    
    function __construct() {
        if(UserModel::isLogged()) {
            header("Location: /dashboard");
        }
        $this->view = 'register';
    }
}
