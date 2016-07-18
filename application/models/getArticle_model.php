<?php

class getArticle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getpopular() {
        $this->db->select('*')->from('articles')->order_by('views', 'DESC')->limit(8);
        return $this->db->get()->result();
    }

    function getLast() {
        $this->db->select('*')->from('articles')->order_by('date', 'DESC')->limit(4); //constant
        return $this->db->get()->result();
    }

}
