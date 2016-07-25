<?php

class MY_User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    function isUserLogged() {

        $ses_user = $this->session->userdata('user');

        if (!($ses_user === NULL) && $ses_user->loggedin === true) {
            return true;
        }
        return false;
    }

    function getLoggedUser() {
        // not check for logged check in the controller 
        $ses_user = $this->session->userdata('user');
        $this->load->model("usersmodel");
        $user=$this->usersmodel->getUserFromId($ses_user->user_id);
        var_dump($user);
    }

}
