<?php

class AppartmentsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("AppartmentsModel");
    }


    public function index()
    {   
        $this->authmiddleware->checkAuth();
        $companyid=$this->session->userdata('company');
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item'); 
        $data['buildingDetail'] = $this->AppartmentsModel->getBuildingDetail($companyid);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view("appartments/appartmentlist", $data);
        $this->load->view('inc/footer');
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
    // view for create Appartment
    public function create()
    {
        try {
            $this->authmiddleware->checkAuth();
            $companyid = $this->session->userdata('company');
            $data['page_title'] = 'Dashboard';
            $data['user'] = $this->session->userdata('item'); 
            $data['buildingDetail'] = $this->AppartmentsModel->getBuildingDetail($companyid);
            $data['appartmentType'] = $this->AppartmentsModel->getAppartmentsType();
            $this->load->view('inc/header');
            $this->load->view('inc/nav', $data);
            $this->load->view("appartments/addappartment", $data);
            $this->load->view('inc/footer');
        } catch (AuthException $e) { // Assuming AuthException is the exception thrown by checkAuth()
            redirect(base_url("getappartmentdetails"));
        }
        
    }
    // data coming form frontend to save in db for Appartment
    public function createAppartment()
    {
        try{
        $this->authmiddleware->checkAuth();
        //validation pending   
        $data['appartment_Name'] = $this->input->post("appartment_Name");
        $data['floor_Type'] = $this->input->post("floor_table");
        $data['appartment_Type'] = $this->input->post("appartment_Type");
        $data['appartment_Price'] = $this->input->post("appartment_Price");
        $data["appartment_Status"] = $this->input->post("appartment_Status");
        $data["elcMeterNumeber"] = $this->input->post("elcMeterNumeber");
        $data["gasMeterNumber"] = $this->input->post("gasMeterNumber");
        $data["waterConnectionNumber"] = $this->input->post("waterConnectionNumber");
        //print_r($data);
        $this->AppartmentsModel->insertAppartmentsDetails($data);
        redirect(base_url("getappartmentdetails"));
        }
        catch (AuthException $e) {
            redirect(base_url("getappartmentdetails"));
        }

    }
    public function updateAppartment($id)
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item'); 
        $companyid=$this->session->userdata('company');
        $data['data'] = $this->AppartmentsModel->getAppartmentById1($id);
        $data['building_table'] = $this->AppartmentsModel->getBuildingDetail($companyid);
        $data['floor_table'] = $this->AppartmentsModel->getFloorDetailById($id);
        $data['appartment_Type'] = $this->AppartmentsModel->getAppartmentsType();
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view('appartments/editappartment', $data);
        $this->load->view('inc/footer');
    }
    public function handleUpdateAppartment($id)
    {
        $this->authmiddleware->checkAuth();
        $data['appartment_Name'] = $this->input->post("appartment_Name");
        $data['floor_Type'] = $this->input->post("floor_table");
        $data['appartment_Type'] = $this->input->post("appartment_Type");
        $data['appartment_Price'] = $this->input->post("appartment_Price");
        $data["appartment_Status"] = $this->input->post("appartment_Status");
        $this->AppartmentsModel->updateAppartmentsDetails($data, $id);
        redirect(base_url("getappartmentdetails"),'refresh');
    }
    public function deleteAppartment($id)
    {
        $this->authmiddleware->checkAuth();
        $this->AppartmentsModel->deleteAppartments($id);
        redirect(base_url("getappartmentdetails"));
    }

    public function getFloorData($id)
    {
        $this->authmiddleware->checkAuth();
        //$buildingId=$this->input->post('buildingId');
        $data = $this->AppartmentsModel->getFloorData($id);
        echo json_encode($data);
    }
    public function getAppartmentDetailByFloor($id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->AppartmentsModel->getAppartmentById($id);
        echo json_encode($data);
    }
    public function getAppartmentDetail($id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->AppartmentsModel->customer_ServiceAppartmentDetail($id);
        //  print_r($data);
        echo json_encode($data);
    }
    public function getAppartmentsData($floor_id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->AppartmentsModel->getAppartmentsAvailable($floor_id);
        echo json_encode($data);
    }
    public function validate_floor_table($str)
    {
        $this->authmiddleware->checkAuth();
        if ($str == '') {
            $this->form_validation->set_message('validate_Appartment_type', 'Please select a Appartment type');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
