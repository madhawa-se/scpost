<?php

class Article_edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    function index() {

        $this->view(13);
    }

    function view($num) {
        $this->load->model("article_model");
        $indata = $this->article_model->getPost($num);
        $comments = $this->article_model->getComments($num);

        $outdata['posthtml'] = $indata['content'];
        $outdata['details'] = $indata['details'];
        $outdata['comments'] = $comments;
        $this->load->view('article_edit', $outdata);
    }

}
