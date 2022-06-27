<?php

class RemoveLib extends Controller {

    function prepare() {
        $currentUser = new UserModel();

        $libid = $_POST['libid'];

        $currentUser->unsubscribe($libid);
        
        header("Location: /dashboard");
    }
}