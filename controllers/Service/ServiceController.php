<?php 
Class ServiceController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("ServiceModel");
    }
    public function index()
{
   
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');  
    $data['service_table']=$this->ServiceModel->getserviceDetails();
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $this->load->view("services/servicelist",$data);
    $this->load->view('inc/footer');
   
}
public function create()
{
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item'); 
    $data['service_type']=$this->ServiceModel->getServiceType();
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $this->load->view("services/addservice",$data);
    $this->load->view('inc/footer');
}
public function createService()
{
   
   // $this->form_validation->set_rules('total_Appartments', 'total_Appartments', 'required|numeric');
    
 
    $data['service_Name']=$this->input->post("service_Name");
    $data['service_CategoryType']=$this->input->post("service_type");
    $data['service_Price']=$this->input->post("service_Price");
    $data['Service_Status']=$this->input->post("Service_Status");
    $data["service_Discountable"]=$this->input->post("service_Discountable");
    $this->ServiceModel->insertServiceDetails($data);
    redirect( base_url("getservicedetails"));
     
}
public function updateService($id)
{
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item'); 
    $data['service_type']=$this->ServiceModel->getServiceType();
      $data['service_table']=$this->ServiceModel->getServiceById($id);
      $this->load->view('inc/header');
      $this->load->view('inc/nav', $data);
      $this->load->view('services/editservice', $data);
      $this->load->view('inc/footer');
    
}
public function handleUpdateService($id)
{
    $data['service_Name']=$this->input->post("service_Name");
    $data['service_CategoryType']=$this->input->post("service_type");
    $data['service_Price']=$this->input->post("service_Price");
    $data['Service_Status']=$this->input->post("Service_Status");
    $data["service_Discountable"]=$this->input->post("service_Discountable");
    $this->ServiceModel->updateServiceDetails($data, $id);
     redirect(base_url("getservicedetails") );
}

public function deleteService($id)
{
       $this->ServiceModel->deleteService($id);
       redirect(base_url("Service/ServiceController/index") );
}

public function getServiceById($id)
{
    
    $data=$this->ServiceModel->getServiceByIdfullresult($id);
    header('Content-Type: application/json');
    //print_r($data);
   echo json_encode($data);
    
}
public function validate_service_CategoryType($str) {
    if ($str == '') {
        $this->form_validation->set_message('validate_service_CategoryType', 'Please select a Service type');
        return FALSE;
    } else {
        return TRUE;
    }
}
//     public function validate_Building_type($str) {
//         if ($str == '') {
//             $this->form_validation->set_message('validate_Building_type', 'Please select a Building type');
//             return FALSE;
//         } else {
//             return TRUE;
//         }
// }

}

?>