<?php
class CustomerModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
    }
    public function getCustomerDetails()
    {
        $this->second_database->select('a.*, b.Customer_TypeName as Customertypename');
        $this->second_database->from(' Customer_table as a');
        $this->second_database->join('Customer_type as b', 'a.Customer_CategoryType = b.Customer_TypeId', 'inner');
        $this->second_database->where('a.customer_Status', '1');
        $query = $this->second_database->get();
        return $query->result();
    }
    public function getCustomerById($id)
    {
        return  $this->second_database->get_where('Customer_table', array('Customer_id' => $id))->row();
    }
    public function insertCustomerDetails($data)
    {
        date_default_timezone_set("Asia/Karachi");
        $data['create_CustomerTime'] = date('Y-m-d H:i:s');
        $this->second_database->insert("customer_table", $data);
        return $this->second_database->insert_id();
    }
    public function updateCustomerDetails($data, $id)
    {
        $this->second_database->where('Customer_id', $id);
        $this->second_database->update('Customer_table', $data);
    }
    public function deleteCustomer($id)
    {
        $this->second_database->set('customer_Status', '0');
        $this->second_database->where('Customer_id', $id);
        $this->second_database->update('Customer_table');
    }
    public function getCustomerType()
    {
        $query =$this->second_database->get('Customer_type');
        return $query->result();
    }

    public function getCustomerByBuildingId($buildingId)
    {
        $this->second_database->select('building_table.building_Name, ft.floor_Name, at.appartment_Name, ca.user_Id, ct.customer_FirstName,ct.customer_LastName,ct.customer_Status,ct.customer_Id');
        $this->second_database->from('building_table');
        $this->second_database->join('floor_table as ft', 'building_table.building_Id = ft.floor_Building', 'left');
        $this->second_database->join('appartment_table as at', 'ft.floor_id = at.floor_Type', 'left');
        $this->second_database->join('customer_appartment as ca', 'at.appartment_TableId = ca.appartment_Id', 'left');
        $this->second_database->join('customer_table as ct', 'ca.user_Id = ct.customer_Id', 'left');
        $this->second_database->where('building_table.building_Id', $buildingId);
        $this->second_database->where('ct.customer_Status', 1);
        $query = $this->second_database->get();
        return $query->result();
    }

    public function getCustomerByBuildingIdForBillingReport($buildingId)
    {
        $this->second_database->select('building_table.building_Name, ft.floor_Name, at.appartment_Name, ca.user_Id, ct.customer_FirstName,cbd.customer_TotalAmonut, cbd.payment_Status,
        cbd.customer_TotalAmonut,cbd.billing_Id,
        ct.customer_LastName,ct.customer_Status,ct.customer_Id');
        $this->second_database->from('building_table');
        $this->second_database->join('floor_table as ft', 'building_table.building_Id = ft.floor_Building', 'left');
        $this->second_database->join('appartment_table as at', 'ft.floor_id = at.floor_Type', 'left');
        $this->second_database->join('customer_appartment as ca', 'at.appartment_TableId = ca.appartment_Id', 'left');
        $this->second_database->join('customer_table as ct', 'ca.user_Id = ct.customer_Id', 'left');
        $this->second_database->join('customer_billingdetails as cbd', 'ct.customer_Id = cbd.user_Id', 'left');
        $this->second_database->where('building_table.building_Id', $buildingId);
        $this->second_database->where('ct.customer_Status', 1);
        $this->second_database->where('cbd.payment_Status', 0);
        $this->second_database->where('cbd.customer_utilitystatus', 0);
        $query = $this->second_database->get();
        // print_r($query);
        return $query->result();
    }

    public function getCustomerByBuildingIdForReceivePayemt($buildingId)
    {
        $this->second_database->select('building_table.building_Name, ft.floor_Name, at.appartment_Name, ca.user_Id, ct.customer_FirstName,cbd.customer_TotalAmonut, cbd.payment_Status,
        cbd.customer_TotalAmonut,monthname(cbd.invoice_Date) as invoicemonth,
        ct.customer_LastName,ct.customer_Status,ct.customer_Id');
        $this->second_database->from('building_table');
        $this->second_database->join('floor_table as ft', 'building_table.building_Id = ft.floor_Building', 'left');
        $this->second_database->join('appartment_table as at', 'ft.floor_id = at.floor_Type', 'left');
        $this->second_database->join('customer_appartment as ca', 'at.appartment_TableId = ca.appartment_Id', 'left');
        $this->second_database->join('customer_table as ct', 'ca.user_Id = ct.customer_Id', 'left');
        $this->second_database->join('customer_billingdetails as cbd', 'ct.customer_Id = cbd.user_Id', 'left');
        $this->second_database->where('building_table.building_Id', $buildingId);
        $this->second_database->where('ct.customer_Status', 1);
        $this->second_database->where('cbd.payment_Status', 0);
        $this->second_database->where('cbd.customer_utilitystatus', 1);
        $query = $this->second_database->get();
        // print_r($query);
        return $query->result();
    }
    public function getnewcount($customer_Id)
    {

       $this->second_database->select('count(ca.user_Id)');
       $this->second_database->from('building_table');
       $this->second_database->join('floor_table AS ft', 'building_table.building_Id = ft.floor_Building', 'left');
       $this->second_database->join('appartment_table AS at', 'ft.floor_id = at.floor_Type', 'left');
       $this->second_database->join('customer_appartment AS ca', 'at.appartment_TableId = ca.appartment_Id', 'left');
       $this->second_database->join('customer_table AS ct', 'ca.user_Id = ct.customer_Id', 'left');
       $this->second_database->join('customer_billingdetails AS cbd', 'ct.customer_Id = cbd.user_Id', 'left');
       $this->second_database->where('building_table.company_Id', $customer_Id);
       $this->second_database->where('DAY(invoice_Date)', 'DAY(CURRENT_DATE)', FALSE);
       $this->second_database->where('ct.customer_Status', 1);
       $this->second_database->where('cbd.payment_Status', 0);
       $this->second_database->where('cbd.customer_utilitystatus', 0);

        $query =$this->second_database->get();
    
        // print_r($query);
        return $query->row();
    }

    public function getPendingBillCount($customer_Id)
    {
        $this->second_database->select('count(ca.user_Id)');
        $this->second_database->from('building_table');
        $this->second_database->join('floor_table as ft', 'building_table.building_Id = ft.floor_Building', 'left');
        $this->second_database->join('appartment_table as at', 'ft.floor_id = at.floor_Type', 'left');
        $this->second_database->join('customer_appartment as ca', 'at.appartment_TableId = ca.appartment_Id', 'left');
        $this->second_database->join('customer_table as ct', 'ca.user_Id = ct.customer_Id', 'left');
        $this->second_database->join('customer_billingdetails as cbd', 'ct.customer_Id = cbd.user_Id', 'left');
        $this->second_database->where('building_table.company_Id', $customer_Id);
       $this->second_database->where('DAY(invoice_Date)', 'DAY(CURRENT_DATE)', FALSE);
        $this->second_database->where('ct.customer_Status', 1);
        $this->second_database->where('cbd.payment_Status', 0);
        $this->second_database->where('cbd.customer_utilitystatus', 1);
        $query = $this->second_database->get();
        // print_r($query);
        return $query->row();
    }
    public function getcustomerHistory($customer_Id)
    {
        $this->second_database->select('*');
        $this->second_database->from('customer_table');
        $this->second_database->where('customer_Id', $customer_Id);
        $query = $this->second_database->get();
        return $query->row();
    }
    public function getappartmentsHistory($customer_Id)
    {
        $this->second_database->select('*');
        $this->second_database->from('appartment_table as at');
        $this->second_database->join('customer_appartment as ct', 'at.appartment_TableId=ct.appartment_Id', 'left');
        $this->second_database->where('ct.user_Id', $customer_Id);
        $query = $this->second_database->get();
        return $query->result();
    }

    public function customerHistory($customer_Id)
    {
      $query=$this->second_database->query("
      SELECT cbd.user_Id, cbd.customer_TotalAmonut,building_table.company_id,date(cbd.created_at) as paymentdata,
      ct.customer_FirstName,ct.customer_LastName,building_table.building_Name,cbd.invoice_Date as invoicedata,cbd.discontAmont as discountamont
        FROM building_table
        LEFT JOIN floor_table AS ft ON building_table.building_Id = ft.floor_Building
        LEFT JOIN appartment_table AS at ON ft.floor_id = at.floor_Type
        LEFT JOIN customer_appartment AS ca ON at.appartment_TableId = ca.appartment_Id
        LEFT JOIN customer_table AS ct ON ca.user_Id = ct.customer_Id
        LEFT JOIN customer_billingdetails AS cbd ON ct.customer_Id = cbd.user_Id
        where ct.customer_Id=$customer_Id
      ");
       return $query->result();
    }
}
