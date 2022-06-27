<?php


class Register extends Controller {

    function prepare() {
        if($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            /** 
             * If hackers are interested, here is where the SQL injection goes :)
             * TODO: sanitize inputs to prevent injection
             */
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
            /** Logged users forwarded to dashboard */
            header("Location: /dashboard");
        }
        $this->view = 'register';
    }
}
