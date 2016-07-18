<?php

class Profilemodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUser($profile_id) {
        $query = $this->db->query("select * from users where user_id='$profile_id' limit 1");
        //var_dump("select * from users where user_id='1'");
        return $query->result();
    }

}
