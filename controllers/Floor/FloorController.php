<?php 
Class FloorController extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("floorModel"); 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
    }
public function index()
{
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
    $companyid=$this->session->userdata('company');
    $data['building_table']=$this->floorModel->getBuildingDetail($companyid);
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $this->load->view("floors/floorlist",$data);
    $this->load->view('inc/footer');
   
}
public function dynamicFloorDeatils($id)
{
    $data=$this->floorModel->getFloorDetailbyBuilding($id);
     
    if (!$data) {
        echo "Data not found";
    } else {
       
        echo json_encode($data); 
    }   
}
// view for create Floor
public function create()
{    

    $companyid=$this->session->userdata('company');
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');  
    $data['data']=$this->floorModel->getBuildingDetail($companyid);
    $data['floor_Type']=$this->floorModel->getFloorTypeDetail();
    $this->load->view('inc/header');
    $this->load->view('inc/nav', $data);
    $this->load->view("floors/addfloor");
    $this->load->view('inc/footer');
    
}

// data coming form frontend to save in db for floor
public function getFloorData() {
    $buildingId = $this->input->post('buildingId');
    $floorData = $this->floorModel->getFloorData($buildingId);
    echo json_encode($floorData);
}
public function createFloor()
{
    $data['floor_Type']=$this->floorModel->getFloorTypeDetail();
    $data['floor_Name']=$this->input->post("floor_Name");
    $data['floor_Building']=$this->input->post("floor_Building");
    $data['floor_Type']=$this->input->post("floor_Type");
    $data['floor_Status']=$this->input->post("floor_Status");
    $data["total_Appartments"]=$this->input->post("total_Appartments");
    $this->floorModel->insertFloorDetails($data);
   
    redirect(base_url('getfloordetails'));
      
}
public function updateFloor($id)
{
    $data['page_title'] = 'Dashboard';
    $data['user'] = $this->session->userdata('item');
    $companyid=$this->session->userdata('company');
    $data['building_table']=$this->floorModel->getBuildingDetail($companyid);
    $data['floor_Type']=$this->floorModel->getFloorTypeDetail();
      $data['data']=$this->floorModel->getFloorById($id);
      $this->load->view('inc/header');
      $this->load->view('inc/nav', $data);
      $this->load->view('floors/editfloor', $data);
      $this->load->view('inc/footer');
}
public function handleUpdateFloor($id)
{
    $data['floor_Name']=$this->input->post("floor_Name");
    $data['floor_Building']=$this->input->post("floor_Building");
    $data['floor_Type']=$this->input->post("floor_Type");
    $data['floor_Status']=$this->input->post("floor_Status");
    $data["total_Appartments"]=$this->input->post("total_Appartments");
    $this->floorModel->updateFloorDetails($data, $id);
     redirect(base_url("getfloordetails") );
}
public function deleteFloor($id)
{  
       $this->floorModel->deleteFloor($id);
       redirect(base_url("getfloordetails") );
}
 public function searchBuilidingById($id)
 {
    $data=$this->FloorModel->getFloorById($id);
    if ($data) {
        return $data;
    } else {
        return null; 
    }
 }
 public function validate_Floor_type($str) {
    if ($str == '') {
        $this->form_validation->set_message('validate_Floor_type', 'Please select a Floor type');
        return FALSE;
    } else {
        return TRUE;
    }
}
    public function validate_Building($str) {
        if ($str == '') {
            $this->form_validation->set_message('validate_Building', 'Please select a Building ');
            return FALSE;
        } else {
            return TRUE;
        }
}
}

?>
