<?php

class comment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertComment($user_id,$content,$post_id) {
        $date = date('Y-m-d H:i:s');
        $data = array('user_id' => $user_id, 'post_id' => $post_id, 'comment_code' => '1.1', 'content' => $content, 'date' => $date);
        $states = $this->db->insert("comments", $data);

        return $states;
    }

    public function getComment() {
        return $this->input->post("comment");
    }

    function getComments($user_id, $start, $amount) {
        $this->db->select('*')->from('comments')->join('users', 'comments.user_id = users.user_id')->where('comments.user_id', $user_id)->order_by('date', 'DESC')->limit(5, $start);
        return $this->db->get()->result();
    }

    function getUserComments($user_id, $start, $amount) {
        $this->db->select('*')->from('comments')->join('users', 'comments.user_id = users.user_id')->join('articles', 'articles.post_id = comments.post_id')->where('comments.user_id', $user_id)->order_by('comments.date', 'DESC')->limit($amount, $start);
        return $this->db->get()->result();
    }

    function getPostComments($post_id, $start, $amount) {
        $this->db->select('content,comments.date,users.user_id,users.firstname')->from('comments')->join('articles', 'comments.post_id = articles.post_id')->join('users','comments.user_id=users.user_id')->where('articles.post_id', $post_id)->order_by('comments.date', 'DESC')->limit($amount, $start);
       // var_dump($this->db->get()->result());
        return $this->db->get()->result();
    }

}
