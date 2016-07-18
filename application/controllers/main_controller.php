

<?php

class Main_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('form_model');
    }

    function index() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
       // $this->form_validation->set_rules('article-title', 'title', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('create_post.php');
        } else {
           $this->load->view('formsuccess');
        }
    }

}
?>


