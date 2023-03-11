<?php 

    function redirect($path) {

        if($path !== '/') {
            header('Location: ' . baseUrl . $path);
        } else {
            header('Location: ' . baseUrl);
        }

    }

    function back() {

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }

    function url($path) {
        
        if($path !== '/') {
            return baseUrl . $path;
        } else {
            return baseUrl;
        }

    }

    function asset($path) {
        return baseUrl . 'assets/' . $path;
    }

    function dd(...$var) {

        var_dump($var);
        die;

    }