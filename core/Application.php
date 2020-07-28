<?php
    class Application {
        public function __construct()
        {
            $this->setReporting();
            $this->_unregisterGlobals();
        }

        private function setReporting()
        {
            if(DEBUG) {
                error_reporting(E_ALL);
                ini_set('display_error', 1);
            } else {
                error_reporting(0);
                ini_set('diplay_error', 0);
                ini_set('log_errors', 1);
                ini_set('error_log', ROOT . DS . 'tmp' . DS . 'errors.log');  
            }
        }

        private function _unregisterGlobals()
        {
            if(ini_get('register_globals')) {
                $globalsAry = ['_SESSION', '_COOKIE', '_GET', '_POST', 'REQUEST', '_SERVER', '_ENV', '_FILES'];
                foreach($globalsAry as $g) {
                    foreach($GLOBALS[$g] as $k => $v) {
                        if ($GLOBALS[$k] === $v) {
                            unset($GLOBALS[$k]);
                        }
                    }
                }
            }
        }
    }