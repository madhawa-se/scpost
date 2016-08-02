<?php

class Article extends MY_Controller {

    private $postPagiAmount = 10; //constant
    private $postPopularIndex = 0;
    private $postLatestIndex = 0;

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

    function getLast() {
        $this->load->model('article_model');
        $latest = $this->article_model->getLast();
        header('Content-Type: application/json');
        echo(json_encode($latest));
    }

    function getpopular() {
        $this->load->model('article_model');
        $popular = $this->article_model->getpopular();
        header('Content-Type: application/json');
        echo(json_encode($popular));
    }

    function getPopularPosts($index) {
        $this->load->model('article_model');
        $popular = $this->article_model->baseGetPopular($this->postPagiAmount, $index);
        header('Content-Type: application/json');
        echo(json_encode($popular));
    }

    function getLatestPosts($index) {
        $this->load->model('article_model');
        $popular = $this->article_model->baseGetLastest($this->postPagiAmount, $index);
        header('Content-Type: application/json');
        echo(json_encode($popular));
    }

}
