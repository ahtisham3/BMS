
<?php
class BillingReportController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Customer_ServicesModel");
    $this->load->model("AppartmentsModel");
    $this->load->model("CustomerModel");
    $this->load->model("ServiceModel");
    $this->load->model("BillingModel");
    $this->load->model("DashboardModel");
    $this->load->library('AuthMiddleware');
  }
  public function index()
  {

    try{
    $this->authmiddleware->checkAuth();
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
    $companyid = $this->session->userdata('company');
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $data['buildingDetail'] = $this->AppartmentsModel->getBuildingDetail($companyid);
    $this->load->view('billingreports/pendingbills', $data);
    $this->load->view('inc/footer');
    }
    catch(customeexception $e) {
         echo "error in billing reportcontroller index function" . $e->getMessage();
         $file = __FILE__;       // Get the file name
         $function = __FUNCTION__; // Get the function name
         $line = __LINE__;       // Get the line number
     
         echo "Exception caught in file '$file', function '$function', line $line";
    }
 
  }
  public function finalizeUtilities()
  {
    $this->authmiddleware->checkAuth();
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
    $companyid = $this->session->userdata('company');
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $data['buildingDetail'] = $this->AppartmentsModel->getBuildingDetail($companyid);
    $this->load->view('billingreports/addutilities', $data);
    $this->load->view('inc/footer');
  }
  public function salesReport()
  {
    $this->authmiddleware->checkAuth();
   
    $companyid = $this->session->userdata('company');
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
     $data['salesdata']=$this->DashboardModel->salesReport($companyid);
    
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $this->load->view('BillingReport/salesReport',$data);
    $this->load->view('inc/footer');

  }

  public function expenceReport()
  {   
    $this->authmiddleware->checkAuth();
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
    $companyid = $this->session->userdata('company');
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $data['buildingDetail'] = $this->AppartmentsModel->getBuildingDetail($companyid);
  $this->load->view('BillingReport/expencereport',$data);
   $this->load->view('inc/footer');
  }

  public function expencehistory($buildingId)
  {
    $this->authmiddleware->checkAuth();
      $data=$this->DashboardModel->expenceHistory($buildingId);
      if(!$data)
      {
        //////print_r('no data font');
      }
       else 
       {
        echo json_encode($data);
       }
      
     
  }

  public function financelReport()
  {
    $this->authmiddleware->checkAuth();
   
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
    $companyid = $this->session->userdata('company');
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $data['revenuReport']=$this->DashboardModel->yearlyRevenuReport($companyid);
   $data['expenceReport'] = $this->DashboardModel->yearlyExpenceReport($companyid);
    ////print_r($data);
    $this->load->view('BillingReport/yearlyFinancelReport',$data);
    $this->load->view('inc/footer');


  }
}

?>





