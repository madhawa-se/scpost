<?php

class Checkpoint_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    function sendRecoveryEmail(){
        $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
    }
}
