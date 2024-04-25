<?php
class ServiceModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
    }
    
    public function getServiceDetails()
    {
       $this->second_database->select('a.*, b.Service_TypeName as Servicetypename');
       $this->second_database->from(' service_table as a');
       $this->second_database->join('service_type as b', 'a.service_CategoryType = b.service_TypeId', 'inner');
        $query= $this->second_database->get();
        return $query->result();
    }

    public function getServiceById($id)
    {
         return  $this->second_database->get_where('service_table',array('Service_id'=>$id))->row();    
    }

    public function getServiceByIdfullresult($id)
    {
        // $this->db->select('*');
        // $this->db->from('service_table');
        // $this->db->where('Service_id',$id);
        // $query=$this->db->get();
        // return $query->result();
        return $this->second_database->get_where('service_table',array('Service_id'=>$id))->row();
    }

    public function insertServiceDetails($data)
    {
        $data['create_ServiceTime'] = date('Y-m-d H:i:s');
      $this->second_database->insert("Service_table", $data);
    }

    public function updateServiceDetails($data,$id)
    {
       $this->second_database->where('Service_id',$id);
       $this->second_database->update('Service_table',$data);
        
    }

    public function updateServiceStatus($customerId )
    {  
            $this->second_database->set('customer_service_Status', 1);
           $this->second_database->where('user_Id', $customerId);
           $this->second_database->where('customer_service_Status',0);
           $this->second_database->update('customer_service_table');
    }

    public function deleteService($id)
    {
       $this->second_database->delete('service_table',array('service_id'=>$id));
    }

    public function getServiceType()
    {
        $query =  $this->second_database->get('service_type');
        return $query->result();
    }

    public function getServiceDetailsForBilling($customerId)
    {
       $this->second_database->select('*');
       $this->second_database->from('customer_service_table');
       $this->second_database->join('service_table', 'customer_service_table.service_Id = service_table.service_id');
       $this->second_database->where('customer_service_table.user_Id', $customerId);
       
        $query =  $this->second_database->get();
        return $query->result();
    }
// used in service update module 
    public function getServiceDetailsForBillingLatest($customerId)
    {
       $query=  $this->second_database->query("SELECT * 
       FROM customer_service_table 
       JOIN service_table ON customer_service_table.service_Id = service_table.service_id 
       WHERE customer_service_table.user_Id = $customerId
       and customer_service_Status=1
       AND MONTH(customer_service_table.service_Created) = MONTH(CURDATE())
       ORDER BY customer_service_table.service_Created DESC
       ");
        return $query->result();
    }

    public function getServiceDetailsForBillingprevious($customerId)
    {
       $query=  $this->second_database->query("SELECT * 
       FROM customer_service_table 
       JOIN service_table ON customer_service_table.service_Id = service_table.service_id 
       WHERE customer_service_table.user_Id = $customerId
       and customer_service_Status=0
       ORDER BY customer_service_table.service_Created DESC
       ");
        return $query->result();
    }

    public function getServiceDetailsForutilities($customerId)
    {
       $this->second_database->select('*');
       $this->second_database->from('customer_service_table');
       $this->second_database->join('service_table', 'customer_service_table.service_Id = service_table.service_id');
       $this->second_database->where('service_table.service_CategoryType=1');
       $this->second_database->where('customer_service_table.user_Id', $customerId);
        $query =  $this->second_database->get();
        return $query->result();
    }
    public function getServiceDetailsForGernal($customerId)
    {
       $this->second_database->select('*');
       $this->second_database->from('customer_service_table');
       $this->second_database->join('service_table', 'customer_service_table.service_Id = service_table.service_id');
       $this->second_database->where('service_table.service_CategoryType=2');
       $this->second_database->where('customer_service_table.user_Id', $customerId);
        $query =  $this->second_database->get();
        return $query->result();
    }
}

?>