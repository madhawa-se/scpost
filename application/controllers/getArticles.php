<?php

class getArticles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    function getPost() {
        
    }

    function getLast() {
        $this->load->model('getArticle_model');
        $latest = $this->getArticle_model->getLast();
        header('Content-Type: application/json');
        echo(json_encode($latest));
    }

    function getpopular() {
        $this->load->model('getArticle_model');
        $latest = $this->getArticle_model->getpopular();
        header('Content-Type: application/json');
        echo(json_encode($latest));
    }

}
