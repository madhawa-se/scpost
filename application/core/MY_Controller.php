<?php

class MY_Controller extends CI_Controller {

    public $outdata = array();
    public $user_data;
    public $ses_user;

    public function __construct() {
        parent::__construct();
        $this->setView();
    }

    function setView() {
        $this->load->library('session');
        $this->outdata['ses_user'] = $this->session->userdata('user');

        if (!($this->outdata['ses_user'] === NULL) && $this->outdata['ses_user']->loggedin === true) {
            $this->outdata['nev'] = 'nevigations/nevigation_log';
        } else {
            $this->outdata['nev'] = 'nevigations/nevigation_none';
        }
        //load view true plz..
        //var_dump($this->outdata);
    }

}
