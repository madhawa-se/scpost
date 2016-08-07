<?php

class Article_edit extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    function index() {
        $this->view(45);
    }

    function view($num) {
        $this->load->model("article_model");
        $indata = $this->article_model->getPost($num);
 
        $this->outdata['posthtml'] = $indata['content'];
        $this->outdata['details'] = $indata['details'];

        //$outdata['ses_user']= $this->session->userdata('user');
        $this->load->view('article_edit', $this->outdata);
    }

}
