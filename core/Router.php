<?php
    class Router {
        public static function route($url)
        {
            //controller
            $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
            $controller_name = $controller;
            array_shift($url);

            //methods
            $method = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
            $method_name = $method;
            array_shift($url);
            
            // params
            $queryParams = $url;

            $dispatch = new $controller($controller_name, $method);

            if (method_exists($controller, $method)) {
                call_user_func_array([$dispatch, $method], $queryParams);
            }else {
                die('That method is not exists in the controller "'.$controller_name.'"');
            }
        }
    }