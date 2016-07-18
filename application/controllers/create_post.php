<?php

class Create_post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

    function index() {
        $this->form_validation->set_rules('article-name', 'article name', 'required');
        $this->form_validation->set_rules('summernote', 'post content', 'required|min_length[5]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('create_post');
        } else {

            $this->load->database();
            $data = array('article-title' => $this->input->post('article-name'), 'article-content' => $this->input->post('summernote'));
            $this->load->model("article_model");
            $state = $this->article_model->insertArticle($data);
            if ($state) {
                echo "success";
            } else {
                echo "fail";
            }
        }
    }

}
