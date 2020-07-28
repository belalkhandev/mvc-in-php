<?php
    require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helpers.php');
    
    if (!function_exists('dnd')) {
        function dnd($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
            die();
        }
    }