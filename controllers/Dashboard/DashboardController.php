<?php
class DashboardController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('BillingModel');
      $this->load->model("Customer_ServicesModel");
      $this->load->model('DashboardModel');
   }
   public function index()
    {
      $this->authmiddleware->checkAuth();
      $data['page_title'] = 'Dashboard';
      $data['user'] = $this->session->userdata('item');
      $companyid = $this->session->userdata('company');
         $getnewinvoicecustomerdata = $this->BillingModel->getAllBillingDetails();
         $sales['monthly']=$this->DashboardModel->getSalesByMonth($companyid);
         $sales['totalCustomer']=$this->DashboardModel->getTotalCustomer($companyid);
         $sales['Defalters']=$this->DashboardModel->getDefaltersByBuilding($companyid);
         $sales['buildingRevenu']=$this->DashboardModel->getRevenyByBuilding($companyid);
         $sales['serviceWiseData']=$this->DashboardModel->serviceWiseData($companyid);
        // print_r( $sales['totalCustomer']);
         // print_r( $sales['serviceWiseData']);
          $this->newInvoice($getnewinvoicecustomerdata);
         //$this->render_SideBar($userRole);
         $this->load->view('inc/header');
         $this->load->view('inc/nav', $data);
         // $this->load->view("includes/header");
          $this->load->view("sales_dashboard",$sales);
         $this->load->view('inc/footer');
         // $this->load->view("includes/footer");
       
       
   }
   public function render_SideBar($userRole)
   {
      switch ($userRole) {
         case 'admin':
            $this->load->view('includes/sidebar');
            break;
         case 'manager':
            $this->load->view('includes/sidebar_Manager');
            break;
         default:
            $this->load->view('includes/sidebar');
            break;
      }
   }
   public function newInvoice($data)
   {  $this->authmiddleware->checkAuth();
      $companyid = $this->session->userdata('company');
      if ($data) {
        // foreach ($data as $row) {
           
           $serviceUpdate=$this->BillingModel->refreshServiceDetails($data);
           $data= $this->BillingModel->refreshBillingDetails($data);
            
           foreach($data as $resultdata)
           {
            $updateBill['company_Id']= $companyid;
           $updateBill['user_Id']=$resultdata->user_Id;
           $updateBill['customer_TotalAmonut']=$resultdata->totalbill;
           $this->Customer_ServicesModel->addBillingDetails($updateBill);
           }
        //   print_r($serviceUpdate);
           foreach ($serviceUpdate as $serviceData) {
            if (!empty($serviceData) && is_array($serviceData)) {
                foreach ($serviceData as $service) {
                     $servicedetail['company_Id']=$companyid;
                    $servicedetail['user_Id'] = $service->user_Id;
                    $servicedetail['service_Id'] = $service->service_Id;
                    $this->Customer_ServicesModel->updateServicesByMonth($servicedetail);
                }
            }
        }
        // }
      } else {
          echo "";
      }
   }
}
