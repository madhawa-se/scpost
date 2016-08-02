<?php

class Article_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getPost($post_id) {
        $content = file_get_contents("postdb/post_$post_id.html");
        $this->db->where('post_id', $post_id);
        $this->db->select('post_id,title, likes, views,shares,date,user_id');
        $query = $this->db->get('articles');
        $data = $query->result_array();
        $userid = $this->getUserData($data[0]['user_id']);
        $data[0]['author'] = $userid->firstname;
        $articleData = array('content' => $content, 'details' => $data[0]);
        return $articleData;
    }

    function getComments($post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->select('content,user_id');
        $query = $this->db->get('comments');
        $commentRows = $query->result();
        foreach ($commentRows as $comment) {
            $userData = $this->getUserData($comment->user_id);
            $comment->user = $userData;
        }
        return $commentRows;
    }

    function getUserData($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->select('firstname');
        $query = $this->db->get('users');
        $userData = $query->result();
        return $userData[0];
    }

    function writePost($post_id, $content) {
        $state = file_put_contents("postdb/post_$post_id.html", $content);
        if ($state === false) {
            return false;
        }
        return true;
    }

    function insertArticleToDB($article_title, $user_id) {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'title' => $article_title,
            'date' => $date,
            'likes' => 0,
            'shares' => 0,
            'views' => 0,
            'user_id' => $user_id,
            'category_id' => 1
        );
        $state = $this->db->insert('articles', $data);
        $insert_id = $this->db->insert_id();
        $resultArray = array('state' => $state, 'insert_id' => $insert_id);
        return $resultArray;
    }

    function insertArticle($data) {
        if (!isset($data['article-content'])) {
            return false;
        }
        if (!isset($data['article-title'])) {
            return false;
        }
        $resultArray = $this->insertArticleToDB($data['article-title'], $data['user_id']);
        if (!$resultArray['state']) {
            return false;
        }
        $state = $this->writePost($resultArray['insert_id'], $data['article-content']);
        return $state;
    }

    ////////////////////////////////////////////////////////

    function baseGetPopular($start, $amount) {
        $this->db->select('*')->from('articles')->order_by('views', 'DESC')->limit($start, $amount);
        return $this->db->get()->result();
    }

    function baseGetLastest($start, $amount) {
        $this->db->select('*')->from('articles')->order_by('date', 'DESC')->limit($start, $amount); //constant
        return $this->db->get()->result();
    }

    ////////////////////////////////////////////////////////

    function getpopular() {
        $this->baseGetPopular();
    }

    function getLast() {
        $this->baseGetLastest();
    }

}
