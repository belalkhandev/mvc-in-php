<?php
    class View {

        protected $_head, $_body, $_siteTitle, $_outputBuffer, $_layout = DEFAULT_LAYOUT;

        public function __construct() 
        {
            
        }

        public function render($viewName)
        {
            $viewAry = explode('/', $viewName);
            $viewString = implode(DS, $viewAry);

            if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
                include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
                include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
            }else {
                die('The \"'.$viewName . '\" Does not exists');
            }
        }

        public function content($type)
        {
            if($type == 'head') {
                return $this->_head;
            }else if($type == 'body') {
                return $this->_body;
            }

            return false;
        }
    }