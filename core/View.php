<?php

class View {

    protected   $_head, 
                $_body, 
                $_siteTitle = DEFAULT_SITETITLE, 
                $_outputBuffer, 
                $_layout = DEFAULT_LAYOUT;

    public function __construct() 
    {
        
    }

    public function render($viewName)
    {
        $viewAry = explode('/', $viewName);
        $viewString = implode(DS, $viewAry);

        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
            include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
            // include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
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

    public function start($type)
    {
        $this->_outputBuffer = $type;
        ob_start();
    }

    public function end()
    {
        if ($this->_outputBuffer == 'head') {
            ob_get_clean();
        } else if ($this->_outputBuffer == 'body') {
            ob_get_clean();
        } else {
            die('You must first run the start Method.');
        }
    }

    public function siteTitle()
    {
        if ($this->_siteTitle == '') {
            return DEFAULT_SITETITLE;
        }

        return $this->_siteTitle;
    }

    public function setSiteTitle($title)
    {
        $this->_siteTitle = $title;
    }

    public function setLayout($path)
    {
        $this->_layout = $path;
    }
}