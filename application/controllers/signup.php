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
            $state = $this->usersmodel->RegisterUsers($firstname, $lastname, $username, $password, $email);
            if ($state['status'] == TRUE) {
                //echo $state['hash'];
                $msg = "Dear $firstname thanks you for join with us. To activate your account please click this link.<a href='http://localhost/science_posts/index.php/signup/activate/{$state['login_id']}" . "/" . "{$state['hash']}'>Activate my account</a>";
                $state = $this->sendEmail($email, "$msg");
            } else {
                echo "fail";
            }
        }
    }

    function sendEmail($to, $msg) {
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from("science@gmail.com", 'admin');
        $this->email->to("$to");
        $this->email->cc('account activation');
        $this->email->bcc('account activation');

        $this->email->subject('Email Test');
        $this->email->message("$msg");

        $state = $this->email->send();
    }

    function activate($user_id, $hash) {
       $this->load->model('usersmodel');
       $state = $this->usersmodel->activeToken($user_id, $hash);
    }

}
