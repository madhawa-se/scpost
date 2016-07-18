<?php

class User_log extends MY_Controller {

    private $viewphp;

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->library('session');
        $user_data = $this->session->userdata('user');
        if (!$user_data === NULL && !$user_data === FALSE) {
            $this->viewphp = 'nevigations/nevigation_log';
        } else {
            $this->viewphp = 'nevigations/nevigation_none';
        }
    }

}
