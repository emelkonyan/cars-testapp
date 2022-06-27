<?php

class Logout extends Controller {

    function __construct() {
        Session::set("logged_user", "");
        header("Location: /");
    }
}