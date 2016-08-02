<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error_block {

    private $error = array();
    private $errors = array();
    private $success=true;

    public function __construct($errorList) {
        foreach ($errorList as $key => $value) {
            if($success && $key==false){
                $success=false;
            }
            pushErr($key,$value);
        }
    }

    function pushErr($key, $errorText) {
        $this->errors[] = array($key=>$errorText);
    }

}
