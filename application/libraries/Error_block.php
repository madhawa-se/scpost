<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error_block {

    private $error = array();
    private $errors = array();
    private $success = true;

    function genErr($errorList) {
        //var_dump($errorList);
        foreach ($errorList as $key => $value) {
            if ($this->success && $value == false) {
                $this->success = false;
            }
            $this->pushErr($key, $value);
        }
        $this->error['success'] = $this->success;
        $this->error['error'] = $errorList;
        return (json_encode($this->error));
    }

    function pushErr($key, $errorText) {
        $this->errors[] = array($key => $errorText);
    }

}
