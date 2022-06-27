<?php

class Controller{
    protected $view;

    function prepare() {}
    function display() {
        /**
         * Some very, VERY basic template implementation
         * TODO: write a proper template engine
         */
        include("../views/_template.php");
    }
}