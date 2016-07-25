<?php

require_once(APPPATH . 'core/MY_User.php');

class Comment extends MY_User {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
    }

    function index() {
        $this->insertComment();
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

    function getPostComments($post_id, $start) {
        $this->load->model('comment_model');
        $res['comments'] = $this->comment_model->getPostComments($post_id, $start, 3);
        header('Content-Type: application/json');
        echo(json_encode($res['comments']));
    }

    function insertComment() {

        $comment = $this->input->post("comment");
        $post_id = $this->input->post("post_id");
        //validate requred


        $user = $this->getLoggedUser();
        $user_id = $user->user_id;

        $this->load->model('comment_model');
        $this->comment_model->insertComment($user_id, $comment, $post_id);
    }

}
