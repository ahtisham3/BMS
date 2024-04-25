<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comp extends CI_Model
{

    function comp_Info()
    {
        $company_id =  $this->session->userdata('company');
        $this->db->where('company_id',  $company_id);
        $query = $this->db->get('company');
        return $query->result_array();
    }

    function addExpense($added)
    {
        $query = $this->db->insert('expense', $added);

        if ($query) {
            return 1;
        }
    }

    function getExpense($id)
    {
        $this->db->where('expense_id', $id);
        $query = $this->db->get('expenses');
        return $query->result_array();
    }

    function update_comp($id, $updated)
    {
        $this->db->where('company_id', $id);
        $query = $this->db->update('company', $updated);
        if ($query) {
            return 1;
        }
    }

    function deleteExpense($id)
    {
        $this->db->where('expense_id', $id);
        $query = $this->db->delete('expenses');
        if ($query) {
            return 1;
        }
    }
}
