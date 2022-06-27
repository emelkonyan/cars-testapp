<?php


class Home extends Controller {

    function __construct() {
        $this->view = 'home';
    }

    function prepare() {
        $m = new LibrariesModel();
        if($_GET) {
            $search = $_GET['search'];
            $this->search = $search;
            $this->libs = $m->searchLibs($search);
        } else {
            $this->libs = $m->getFirst10Libs();
        }

        $this->platformHtml = $m->getPlatformsHtml(@$_GET['search']['platform']);
        
        if(UserModel::isLogged()) {
            $currentUser = new UserModel();
            $subs = $currentUser->getSubs();
            $usersSubs = [];
            foreach($subs as $s) {
                $sub = json_decode($s['payload']);
                $usersSubs[] = $sub->name;
            }

            $this->userSubs = $usersSubs;
        }
    }
}