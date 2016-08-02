<?php

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->model('article_model');
    }

    function index() {

        $post = array();
        $this->load->view('home');
    }


}
