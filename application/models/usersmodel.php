<?php

class Usersmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUsers() {

        $query = $this->db->query('SELECT * FROM users');
        return $query->result();
    }

    function RegisterUsers($firstname, $lastname, $username, $password, $email) {
        $this->db->trans_begin();
        $options = array('cost' => 9);

        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $data = array('username' => $username, 'password' => $password);
        $state = $this->db->insert('login', $data);
        if ($state === false) {
            return array('status' => 'false');
        }
        $insert_id = $this->db->insert_id();
        $data = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'state' => 0, 'login_id' => $insert_id);
        $state = $this->db->insert('users', $data);
        if ($state === false) {
            return array('status' => 'false');
        }
        $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);

        $data = array('login_id' => $insert_id, 'hash' => $random_hash);
        //hash isn't unique plz check for exsisting hash
        $state = $this->db->insert('hash', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo "rollback";
        } else {
            $this->db->trans_commit();
            echo "commit";
        }
        if (!$state === false) {
            return array('status' => 'true', 'hash' => $random_hash,'login_id'=>$insert_id);
        }
    }

    function authUser($username, $password) {
        $query = $this->db->where('username', $username)->get('login');
        $num = $query->num_rows();
        if (!($num > 0)) {
            return false;
        }
        $resulset = $query->result();
        $login_id = $resulset[0]->login_id;
        $hashed_password = $resulset[0]->password;
        $verify = password_verify($password, $hashed_password);

        if ($verify === TRUE) {
            return $this->getUser($login_id);
        } else {
            return false;
        }
    }

    function activeToken($login_id, $hash) {
        $query = $this->db->where(array('login_id' => $login_id, 'hash' => $hash))->get('hash');
        $num = $query->num_rows();
        if (!($num > 0)) {
            echo "Cannot activate.invalid token";
        } else {
             echo "activated";
        }
    }

    function confirmUser() {

        function authUser($username, $password) {
            $query = $this->db->where('username', $username)->query('login');
            $num = $query->num_rows();
            if (!$num > 0) {
                return false;
            }
            $login_id = $query[0]->login_id;
            $querylogin = $this->db->where('login_id', $login_id)->query('hash');
            $querylogin->result();
            if (!$querylogin->num_rows() > 0) {
                return false;
            }
            $hashed_password = $querylogin[0]->hash;
            $verify = password_verify($password, $hashed_password);
            if ($verify === FALSE) {
                return false;
            } else {
                return getUser($login_id);
            }
        }

    }

    function getUser($login_id) {

        $query = $this->db->select('*')->where('login_id', $login_id)->get('users');
        return $query->result()[0];
    }

    function getUserFromId($user_id) {

        $query = $this->db->select('*')->where('user_id', $user_id)->get('users');
        return $query->result()[0];
    }

    function setUser($userarr) {
        //bad move to controller
        $userarr->loggedin = true;
        $this->session->set_userdata(array('user' => $userarr));
    }

}
