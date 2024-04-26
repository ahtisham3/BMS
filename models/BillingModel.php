<?php

use LDAP\Result;

class BillingModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
    }

    public function getCompanyDetails($customerId)
    {
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('company_id',$customerId);
        $query = $this->db->get();
      
        return $query->row();
       

    }
    public function getBillingDetailsForBilling($customerId)
    {
        $this->second_database->select('*');
        $this->second_database->from('customer_billingdetails');
        $this->second_database->where('customer_billingdetails.user_Id', $customerId);
        $this->second_database->order_by('customer_billingdetails.invoice_Date', 'DESC');
        $this->second_database->limit(1);
        $query = $this->second_database->get();
        return $query->row();
    }
    public function getBillingDetailOfPrevousMonth($customerId)
    {
        $this->second_database->select('*');
        $this->second_database->from('customer_billingdetails');
        $this->second_database->where('customer_billingdetails.user_Id', $customerId);
        $this->second_database->where('customer_billingdetails.payment_Status', 0);
        $this->second_database->order_by('customer_billingdetails.invoice_Date', 'DESC');
        $query = $this->second_database->get();
        return $query->result();
    }

    public function getUtilitiesType()
    {
        $query = $this->second_database->query("select * from utilitie_billtype");
        return $query->result();
    }
    public function insertUtilityBill($data)
    {
        // $billid=$this->session->userdata('billing_Id');
        // print_r($billid);

        $data['created_Date'] = date('Y-m-d ');
        $this->second_database->insert('customer_utilitiebills', $data);
    }
    public function getServiceUtilities($customerId)
    {
        $query = $this->second_database->query("SELECT * 
     FROM `customer_utilitiebills` 
     LEFT JOIN `utilitie_billtype` ON `customer_utilitiebills`.`bill_Name` = `utilitie_billtype`.`bill_TypeId`
     where `customer_Id` =$customerId
     and month(receiving_Date)=0
     ORDER BY `created_Date` DESC
     ");
        return $query->result();
    }
    public function ReceivedupdatePaymentStatus($customerId)
    {
        $this->second_database->set('payment_Status', 1);
        $this->second_database->where('user_Id', $customerId);
        $this->second_database->update('customer_billingdetails');
    }
    public function updateUtilityStatus($customerId)
    {
        $this->second_database->set('customer_utilitystatus', 1);
        $this->second_database->where('user_Id', $customerId);
        $this->second_database->update('customer_billingdetails');
    }
    public function invoiceClearenceDate($customerId)
    {
        $this->second_database->set('created_at', 'NOW()', false);
        $this->second_database->where('user_Id', $customerId);
        $this->second_database->update('customer_billingdetails');
    }
    public function getAllBillingDetails()
    {
        $query = $this->second_database->query("SELECT user_id, MAX(invoice_Date) AS invoice_Date 
    FROM customer_billingdetails 
    GROUP BY user_id 
    HAVING 
        (DAY(MAX(invoice_Date)) = DAY(CURDATE() - INTERVAL 30 DAY) AND MONTH(MAX(invoice_Date)) <> MONTH(CURDATE()))
        OR
        (MAX(invoice_Date) < CURDATE() - INTERVAL 30 DAY AND MONTH(MAX(invoice_Date)) <> MONTH(CURDATE()));
    ");
        return $query->result();
    }
    public function refreshBillingDetails($data)
    {
        $result = array();
        foreach ($data as $row) {
            $this->second_database->select('cst.user_Id, at.appartment_Price + SUM(st.service_Price) AS totalbill, SUM(st.service_Price) AS total_service_price');
            $this->second_database->from('customer_service_table AS cst');
            $this->second_database->join('service_table AS st', 'st.service_id = cst.service_Id', 'left');
            $this->second_database->join('customer_appartment AS ca', 'cst.user_Id = ca.user_Id', 'left');
            $this->second_database->join('appartment_table AS at', 'ca.appartment_Id = at.appartment_TableId', 'left');
            $this->second_database->where('cst.user_Id', $row->user_id);
            $this->second_database->group_by('cst.user_Id');
            $query = $this->second_database->get();
            $result[] = $query->row();
        }
        return $result;
    }
    public function refreshServiceDetails($data)
    {
        $result = array();
        foreach ($data as $row) {
            $query = $this->second_database->query("select customer_service_table.user_Id,
    customer_service_table.service_Id,
    service_Created from customer_service_table
    where  customer_service_table.user_Id=$row->user_id   
    and   customer_service_Status=1
     AND date(service_Created) = date(CURDATE() - INTERVAL 1 day)
    GROUP by user_Id,service_Id");
            $result[] = $query->result();
        }
        return $result;
    }
    public function checkUserDues($customerId)
    {
        $this->second_database->select('*');
        $this->second_database->from('customer_billingdetails');
        $this->second_database->where('user_Id', $customerId);
        $this->second_database->where('MONTH(invoice_Date)', date('m'));
        $this->second_database->where('MONTH(created_at)', date('m'));
        $this->second_database->where('payment_Status', 1);
        $query = $this->second_database->get();
        return $query->result();
    }
    public function updateUtilityRecDate($billid)
    {

         
        $query = $this->second_database->query(
            "UPDATE customer_utilitiebills 
                SET receiving_Date = CURDATE() 
                WHERE billing_Id = $billid"
        );
    }
    public function updateTotalpayment($billing_Id,$discontAmont)
    {
        $query = $this->second_database->query(
            "UPDATE customer_billingdetails 
                SET
                 discontAmont=$discontAmont
                WHERE billing_Id = $billing_Id"
        );
        if($query)
        {
            return true;
        }
        else
        {   return false; }
    }
        
    }

