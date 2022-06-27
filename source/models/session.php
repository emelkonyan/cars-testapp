<?php

class Session {

    static function get($k) {
        return $_SESSION[$k];
    }

    static function set($k, $v) {
        return $_SESSION[$k] = $v;
    }
}