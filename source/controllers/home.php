<?php


class Home extends Controller {

    function __construct() {
        $this->view = 'home';
    }

    function prepare() {
        $m = new LibrariesModel();
        if($_GET) {
            /** GET search/filtration */
            $search = $_GET['search'];
            $this->search = $search;
            $this->libs = $m->searchLibs($search);
        } else {
            /** No search, display top 10 */
            $this->libs = $m->getFirst10Libs();
        }
        /** A little helper function to generate the dropdown code with the proper selected option */
        $this->platformHtml = $m->getPlatformsHtml(@$_GET['search']['platform']);
        
        if(UserModel::isLogged()) {
            $currentUser = new UserModel();
            /** We collect the current user's subs
             *  so we can disable double subscribing
             */
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