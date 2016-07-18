<?php

class Article extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    function index() {
        $this->load->model("article_model");
        $data['posthtml'] = $this->article_model->getPost(13);
        $this->load->view('article', $data);
    }

    function view($num) {
        $this->load->model("article_model");
        $indata = $this->article_model->getPost($num);
        $comments = $this->article_model->getComments($num);
        $this->outdata['posthtml'] = $indata['content'];
        $this->outdata['details'] = $indata['details'];
        $this->outdata['comments'] = $comments;
        //$outdata['ses_user']= $this->session->userdata('user');
        $this->load->view('article', $this->outdata);
    }

}
