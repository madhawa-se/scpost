<?php

require_once(APPPATH . 'core/MY_User.php');

class Create_post extends MY_User {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

    function index() {
        $this->load->view('create_post');
//        if (!$this->isUserLogged()) {
//            redirect('/login');
//        }
//        $this->form_validation->set_rules('article-name', 'article name', 'required');
//        $this->form_validation->set_rules('summernote', 'post content', 'required|min_length[5]');
//        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
//
//        //echo 'summer note ' . $this->input->post('summernote') . "  is logeged " . $this->isUserLogged();
//        if ($this->form_validation->run() == FALSE) {
//
//            $this->load->view('create_post');
//        } else {
//            if ($this->isUserLogged()) {
//                $user = $this->getLoggedUser();
//
//                $this->load->database();
//                $data = array('user_id' => $user->user_id, 'article-title' => $this->input->post('article-name'), 'article-content' => $this->input->post('summernote'));
//                $this->load->model("article_model");
//                $state = $this->article_model->insertArticle($data);
//                if ($state) {
//                    echo "success";
//                } else {
//                    echo "fail";
//                }
//            } else {
//                redirect('/login');
//            }
//        }
    }

    function validate() {


        $articleContent = $this->input->post('summernote');
        $articlePic = $this->input->post('article-pic');
        $articleName = $this->input->post('article-name');
        $articleBorder = $this->input->post('article-border');

        $this->load->library('Error_block');

        $articleName_success = $this->form_validation->required($articleName);
        $articleContent_success = $this->form_validation->min_length($articleContent, 5);
        //$articleBorder_success = $this->form_validation->required($articleBorder_success);
        $articlePic_success = $this->form_validation->required($articlePic);

        $genErr = $this->error_block->genErr(array('name' => $articleName_success, 'content' => $articleContent_success, 'pic' => $articlePic_success));
        var_dump($genErr);
        if (json_decode($genErr)->success === TRUE) {
            if ($this->isUserLogged()) {
                $user = $this->getLoggedUser();

                $this->load->database();
                $data = array('user_id' => $user->user_id, 'article-title' => $articleName, 'article-content' => $articleContent, 'article-pic' => $articlePic);
                $this->load->model("article_model");
                $state = $this->article_model->insertArticle($data);

                // echo "db query" . $this->db->last_query();
                if ($state) {
                    $genErr = $this->error_block->genErr(array('saved' => true));
                } else {
                    $genErr = $this->error_block->genErr(array('saved' => false));
                }
            } else {
                $genErr = $this->error_block->genErr(array('logged' => false));
            }
        } else {
            
        }
        echo 'query ';
        echo $this->db->last_query();
        // header('Content-Type: application/json');
        echo($genErr);
    }

}
