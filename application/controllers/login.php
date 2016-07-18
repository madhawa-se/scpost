<?php

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
    }

    function index() {
        $this->form_validation->set_rules('username', 'first name', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            echo 'sucess';
            $this->load->model('usersmodel');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $state = $this->usersmodel->authUser($username, $password);
            if ($state === FALSE) {
                $this->load->view('login');
            } else {
                $this->usersmodel->setUser($state);
            }
        }
    }

    function saveUser() {
        $this->load->library('session');
    }

}
