<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Model
{
    function getSetting($name)
    {
        $this->db->where('setting_name', $name);
        $query = $this->db->get('settings');
        return $query->result_array();
    }

    function checkLogin($loginEmail, $loginPassword)
    {
        $this->db->where('user_password', $loginPassword);
        $this->db->where("(user_email='$loginEmail' OR user_username='$loginEmail')", NULL, FALSE);

        $query = $this->db->get('users');
        return $query->num_rows();
    }
    function checkAdminLogin($loginEmail, $loginPassword)
    {
        $this->db->where('pass', $loginPassword);
        $this->db->where('email', $loginEmail);

        $query = $this->db->get('admin');
        return $query->num_rows();
    }

    function user_active($loginEmail, $loginPassword)
    {
        $this->db->where('active=', 1);
        $this->db->where('user_password', $loginPassword);
        $this->db->where("(user_email='$loginEmail' OR user_username='$loginEmail')", NULL, FALSE);

        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function user_details($loginEmail, $loginPassword)
    {
        $this->db->where('user_password', $loginPassword);
        $this->db->where("(user_email='$loginEmail' OR user_username='$loginEmail')", NULL, FALSE);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function register($reg_array)
    {
        $query = $this->db->insert('company', $reg_array);
        if ($query) {
            return $this->db->insert_id();
        }
    }

    function check_name($name)
    {
        $ret = 0;

        $this->db->where('user_username', $name);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $ret =  0;
        } else {
            $ret = 1;
        }
        return $ret;
    }



    function create_user($reg_array)
    {
        $query = $this->db->insert('users', $reg_array);
        if ($query) {
            return $this->db->insert_id();
        }
    }

    function is_expired($loginEmail, $loginPassword)
    {
        $ret = 0;


        $query = $this->db->query("SELECT * FROM users where user_username = '$loginEmail' AND user_password = '$loginPassword' AND active = 1 AND expiry > CURRENT_DATE() ");

        // return $query->result_array();

        if ($query->num_rows() > 0) {
            $ret = 1;
        } else {
            $ret = 0;
        }
        return $ret;
    }
}
