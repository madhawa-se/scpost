<?php

class Comment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
    }

    function index() {
        $this->load->model('comment_model');
        $comment = $this->comment_model->getComment();
        echo 'ooo  ' . $comment;
        $this->comment_model->insertComment($comment);
    }

    function getComments() {
        $this->load->model('comment_model');
        $res['comments'] = $this->comment_model->getComments(1, 0, 10);
        $this->load->view('activelogs/comments', $res);
    }

    function getUserComments($start) {
        $this->load->model('comment_model');
        $res['comments'] = $this->comment_model->getUserComments(1, $start, 2);
        header('Content-Type: application/json');
        echo(json_encode($res['comments']));
    }

    function getPostComments($post_id,$start) {
        $this->load->model('comment_model');
        $res['comments'] = $this->comment_model->getPostComments($post_id, $start, 3);
        header('Content-Type: application/json');
        echo(json_encode($res['comments']));
    }

}
