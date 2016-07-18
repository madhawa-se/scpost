<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    function index() {

        $this->load->library('pagination');
        $config['base_url'] = 'users?=';
        $config['total_rows'] = 11;
        $config['per_page'] = 5;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='activex'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $this->load->model('usersmodel');
        $Data['usersData'] = $this->usersmodel->getUsers();

        $Data['pagination'] = $this->pagination->create_links();
        $this->load->view('users', $Data);
    }

    function profile($profile_id) {
        $this->load->model('profilemodel');
        $Data['userData'] = $this->profilemodel->getUser($profile_id);
        //var_dump($Data['userData']);
        $this->load->view("user_profile", $Data);
    }

    function islogged() {
        
    }

}
