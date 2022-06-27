<?php

class RemoveLib extends Controller {

    function prepare() {
        /** TODO: the libs controllers should be 
         * in one controller with different methods
         */
        $currentUser = new UserModel();

        $libid = $_POST['libid'];

        $currentUser->unsubscribe($libid);
        
        header("Location: /dashboard");
    }
}