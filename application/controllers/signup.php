<?php

class signup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->database();
    }

    function index() {

//        $this->input->post('first_name');
//        $this->input->post('last_name');
//        $this->input->post('user_name');
//        $this->input->post('email');
//        $this->input->post('password');
//        $this->input->post('confirm');

        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
        $this->form_validation->set_rules('user_name', 'user name', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('confirm', 'confirm', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup');
        } else {
            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $username = $this->input->post('user_name');
            $password = $this->input->post('password');
            $email = $this->input->post('email');

            $this->load->model('usersmodel');
            $this->usersmodel->RegisterUsers($firstname, $lastname, $username, $password, $email);
        }
    }

}
