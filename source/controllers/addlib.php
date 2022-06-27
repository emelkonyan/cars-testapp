<?php

class Addlib extends Controller {

    function prepare() {
        /** TODO: the libs controllers should be 
         * in one controller with different methods
         */
        $currentUser = new UserModel();
        $currentUser->subscribe($_POST['lib']);
        /** No view for this controller, forward to dashboard */
        header("Location: /dashboard");
    }
}