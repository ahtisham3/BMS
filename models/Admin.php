<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

    
    function userCount()
    {
        $query=$this->db->get('users');
        return $query->num_rows();
    }
    function confirmedOrdersCount()
    {
        $this->db->where('tOrder_status','1');
        $query=$this->db->get('torder');
        return $query->num_rows();
    }
    function pendingOrdersCount()
    {
        $this->db->where('tOrder_status','0');
        $query=$this->db->get('torder');
        return $query->num_rows();
    }
    function allUsers()
    {
        $query=$this->db->get('users');
        return $query->result_array();
    }

}
