<?php

class Dashboard extends Controller {

    function __construct() {
        $this->view = 'dashboard';
    }

    function prepare() {

        $this->user['name'] = Session::get("logged_user");
        $this->user['id'] = Session::get("logged_user_id");

        $currentUser = new UserModel();

        $this->subs = $currentUser->getSubs();
    }
}