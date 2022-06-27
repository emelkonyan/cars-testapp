<?php

class Addlib extends Controller {

    function prepare() {
        $currentUser = new UserModel();
        $currentUser->subscribe($_POST['lib']);
        
        header("Location: /dashboard");
    }
}