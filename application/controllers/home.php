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
        $post['popposts'] = $this->article_model->getPopularPosts();
        $this->load->view('home', $post);
    }

    function getPopularPosts() {
        $this->load->model('Article_model');
        $pop = $this->Article_model->getPopularPosts();
        header('Content-Type: application/json');
        echo(json_encode($pop));
    }

}
