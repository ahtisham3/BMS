<?php 
Class Customer_ServicesController extends CI_Controller 
{
   
    public function __construct()
   {
       parent::__construct();
       $this->load->model("Customer_ServicesModel");
       $this->load->model("AppartmentsModel");  
   }

   public function create()
   {   
    $data['page_title'] = 'Dashboard';
    $companyid=$this->session->userdata('company');
    $data['user'] = $this->session->userdata('item');
       $customer_Id = $this->session->userdata('customer_Id');
       $data['customerdata']=$this->Customer_ServicesModel->getCustomerData($customer_Id);
       $data['buildingDetail']=$this->Customer_ServicesModel->getBuildingDetail($companyid);
       $data['serviceGernal']=$this->Customer_ServicesModel->getAllGernalServices();
       $data['serviceUtilites']=$this->Customer_ServicesModel->getAllUtilites();
       $this->load->view('inc/header');
       $this->load->view('inc/nav', $data);
       $this->load->view('customerservice/addcustomer_services',$data);
       $this->load->view('inc/footer');
       
    }
    
   public function createCustomer_Services()
   {
    $companyid=$this->session->userdata('company');
   
       //services
      // $data['company_Id']=$this->session->userdata('company');
       $userId=$this->input->post("user_id");
       $serviceId=$this->input->post("selected_services");
       $getServiceId=explode(',',$serviceId);
       foreach($getServiceId as $serviceId)
       {
        $this->Customer_ServicesModel->addCustomerService($serviceId,$userId,$companyid);
       }
       //utilityservice 
    //    $userId=$this->input->post("user_id");
    //    $utilityServiceId=$this->input->post("selected_utilitiesservices");
    //    $getutilityServiceId=explode(',',$utilityServiceId);
    //    foreach($getutilityServiceId as $utilityserviceId)
    //    {
    //     $this->Customer_ServicesModel->addCustomerService($utilityserviceId,$userId);
    //    }
     
    //apparmtent service 
      // $data['company_Id']=$this->session->userdata('company');
        $appartmentId['user_Id']=$this->input->post("user_id");
        $appartmentId['appartment_Id']=$this->input->post("appartment_table");
        $this->Customer_ServicesModel->addCustomerAppartment($appartmentId);
       
        // update apparmten and asssing to custmoer 
        $updateappartmentid=$this->input->post("appartment_table");
        $this->AppartmentsModel->updateAppartmentsbycustomer($updateappartmentid);

        //total bill 
        $totalBill['discontAmont']=$this->input->post("discontAmont");
       $totalBill['user_Id'] = $this->input->post("user_id");
       $totalBill['company_Id']=$companyid;
       $totalAmountInput = $this->input->post("totalAmountInput"); 
      //  print_r($totalBill);
       if (is_numeric($totalAmountInput)) {
           $totalBill['customer_TotalAmonut'] = $totalAmountInput;
       } else {
           $totalBill['customer_TotalAmonut'] = 0;
       } 
       //print_r($totalBill);  
       $this->Customer_ServicesModel->addBillingDetails($totalBill);
        redirect(base_url("initialinvoice"));
   }
        public function insertdetails()
        {
        // $customer_Id = $this->session->userdata('customer_Id');
        // print_r($customer_Id);
        }

//dynamic function 
}
?>