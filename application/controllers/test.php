<?php
require_once(APPPATH.'core/MY_User.php');

class Test extends MY_User {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        print_r($this->getLoggedUser());
    }

}
