<?php

class checkpoint extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    function index() {
        $this->load->view('recover/checkpoint');
    }

    function mailsent() {
        $this->load->view('recover/mailsent');
    }

    function sucess() {
        
    }

    function fail() {
        $this->load->view('recover/fail');
    }

}
