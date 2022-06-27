<?php

class Controller{
    protected $view;

    function prepare() {}
    function display() {
        include("../views/_template.php");
    }
}