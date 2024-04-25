      <?php
      class Customer_ServicesModel extends CI_Model
      {

        public function __construct()
        {
          parent::__construct();
          $this->second_database = $this->load->database('second_database', TRUE);
        }
        public function getCustomerData($customer_id)
        {
          return $this->second_database->get_where('Customer_table', array('Customer_id' => $customer_id))->row();
        }
        public function getBuildingDetail($companyid)
        {
          $query = $this->second_database->query("select * from building_table where building_Status=1 and company_Id= $companyid");
          return $query->result();
        }
        public function getCustomerBillingDetail($customer_id)
        {
          $query = $this->second_database->query("select * from customer_billingdetails where user_Id=$customer_id order by invoice_Date desc limit 1 ");
          return $query->row();
        }

        public function getAllGernalServices()
        {
          $query = $this->second_database->query("select * from service_table where service_CategoryType=2");
          return $query->result();
        }
        public function getAllUtilites()
        {
          $query = $this->second_database->query(" select * from utilitie_billtype ");
          return $query->result();
        }
        public function addCustomerService($serviceId, $userId,$companyid)
        {
          $serviceData = array(
            'service_Id' => $serviceId,
            'user_Id' => $userId,
            'customer_service_Status' => 1,
            'service_Created' => date('Y-m-d'),
            'company_Id'=>$companyid
          );
          $this->second_database->insert('customer_service_table', $serviceData);
        }
        public function updateCustomerBill($finalamont, $billing_Id)
        {
          $this->second_database->set('customer_TotalAmonut', $finalamont);
          $this->second_database->where('billing_Id', $billing_Id);
          $this->second_database->update('customer_billingdetails');
        }
        public function updateServicesByMonth($servicedetail)
        {
          $servicedetail['customer_service_Status'] = 0;
          $servicedetail['service_Created'] = date('Y-m-d');
          $this->second_database->insert('customer_service_table', $servicedetail);
        }
        public function addCustomerAppartment($appartmentId)
        {
          $appartmentId['customer_appartment_Created'] = date('Y-m-d H:i:s');
          $appartmentId['customer_appartment_Status'] = 1;
          $this->second_database->insert('customer_appartment', $appartmentId);
        }

        public function addBillingDetails($totalBill)
        {
          date_default_timezone_set("Asia/Karachi");
          $totalBill['create_BillingTime'] = date('Y-m-d H:i:s');
          $totalBill['invoice_Date'] = date('Y-m-d');
          $totalBill['invoice_EndDate'] = date('Y-m-d', strtotime('+10 days'));
          $totalBill['customer_utilitystatus'] = 0;
          $this->second_database->insert('customer_billingdetails', $totalBill);
        }

        public function latestInvoiceDetail($customer_id)
        {
          $query = $this->second_database->select('*')
            ->from('customer_billingdetails')
            ->where('user_Id', $customer_id)
            ->order_by('create_BillingTime', 'DESC')
            ->limit(1)
            ->get();
          return $query->row();
        }

        

        public function getCustomerServiceDetails($customer_id)
        {
          $this->second_database->select('apt.appartment_Name, apt.appartment_Price, service_table.service_Name, service_table.service_Price');
          $this->second_database->from('customer_table as ct');
          $this->second_database->join('customer_appartment as cp', 'ct.customer_Id = cp.user_Id');
          $this->second_database->join('appartment_table as apt', 'cp.appartment_Id = apt.appartment_TableId');
          $this->second_database->join('customer_service_table as cst', 'ct.customer_Id = cst.user_Id');
          $this->second_database->join('service_table', 'cst.service_Id = service_table.service_id');
          $this->second_database->where('ct.customer_Id', 18);
          $query = $this->second_database->get();
          return $result = $query->result();
        }

        public function updateCustomerService($updateserviceid)
        {

          $this->second_database->where('customer_service_Id', $updateserviceid);
          $this->second_database->delete('customer_service_table');
        }
        public function removeServicePricefromtotaaomnt($updateTotalAmount, $billingid)
        {

          $this->second_database->set('customer_TotalAmonut', $updateTotalAmount); // Set the new total amount
          $this->second_database->where('billing_Id', $billingid); // Specify the condition for updating
          $this->second_database->update('customer_billingdetails'); // Update the table

        }
        public function addServicePricefromtotaaomnt($updateTotalAmount, $billingid)
        {

          $this->second_database->set('customer_TotalAmonut', $updateTotalAmount); // Set the new total amount
          $this->second_database->where('billing_Id', $billingid); // Specify the condition for updating
          $this->second_database->update('customer_billingdetails'); // Update the table

        }
        public function upDateCustomerServiceStatus($id)
    {
      $this->second_database->set('customer_appartment_Status', 0);
      $this->second_database->where('user_Id', $id);
      $this->second_database->update('customer_appartment');
    }
      }

      ?>