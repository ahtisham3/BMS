<?php

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class BuildingController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BuildingModel");
        $this->load->model('DashboardModel');
        $this->load->library('session');
    }
    public function index()
    {
        try{
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $companyid = $this->session->userdata('company');
        $data['user'] = $this->session->userdata('item');
        $data['data'] = $this->BuildingModel->getBuildingDetails($companyid);
        if($data['data'] == ''){
            // $this->session->set_userdata('error_message', 'Building details not found.');
            redirect(base_url('dashboard'));
        }
        // $data['items'] = $this->Items->allitems();
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view('buildings/buildinglist', $data);
        $this->load->view('inc/footer');
        }
        catch(Exception $e){
            redirect(base_url('dashboard'));
        }
    }
    // view for create building
    public function create()
    {
        
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        $data['data'] = $this->BuildingModel->getBuildingType();
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view("buildings/addbuilding", $data);
        $this->load->view('inc/footer');
    }
    // data coming form frontend to save in db for building
    public function createBuilding()
    {
        $this->authmiddleware->checkAuth();
        $data['company_Id'] = $this->session->userdata('company');
        $data['building_Name'] = $this->input->post("building_Name");
        $data['building_Location'] = $this->input->post("building_Location");
        $data['building_Floors'] = $this->input->post("building_Floors");
        $data['building_Status'] = $this->input->post("building_Status");
        $data["building_Type"] = $this->input->post("building_Type");
        $this->BuildingModel->insertBuildingDetails($data);
        redirect(base_url('getbuildingdetails'));
    }
    public function updateBuilding($id)
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        $data['building_Type'] = $this->BuildingModel->getBuildingType();
        $data['data'] = $this->searchBuilidingById($id);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view('buildings/edit', $data);
        $this->load->view('inc/footer');
    }
    public function handleUpdateBuilding($id)
    {
        $this->authmiddleware->checkAuth();
        $data['building_Name'] = $this->input->post("building_Name");
        $data['building_Location'] = $this->input->post("building_Location");
        $data['building_Floors'] = $this->input->post("building_Floors");
        $data['building_Status'] = $this->input->post("building_Status");
        $data["building_Type"] = $this->input->post("building_Type");
        $this->BuildingModel->updateBuildingDetails($data, $id);
        redirect(base_url("getbuildingdetails"));
    }
    public function deleteBuilding($id)
    {
        $this->authmiddleware->checkAuth();
        $this->BuildingModel->deleteBuilding($id);
        redirect(base_url("getbuildingdetails"));
    }
    public function searchBuilidingById($id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->BuildingModel->getBuildingById($id);
        if ($data) {
            return $data;
        } else {
            return null;
        }
    }
 
    public function expencebuilding()
    {
        $this->authmiddleware->checkAuth();
          $buildingid=$this->input->post('building_id');
           $this->session->set_userdata('building_id',$buildingid);

           $data['page_title'] = 'Dashboard';
           $data['user'] = $this->session->userdata('item');
           $data['expence_Type'] = $this->DashboardModel->expenceType();
          
           $this->load->view('inc/header');
           $this->load->view('inc/nav', $data);
           $this->load->view('expense/add', $data);
           $this->load->view('inc/footer');

    }
    public function new_expence()
    {
        $this->authmiddleware->checkAuth();   
        $data['expence_BuildingId']=$this->session->userdata('building_id');
        $data['expence_Price']=$this->input->post('cost');
        $data['expence_Date']=$this->input->post('monthdate');
     
      $data['expence_Type']=$this->input->post('expense_Type');
      $data['expence_Name']=$this->input->post('name');
      $data['company_Id'] = $this->session->userdata('company');
    
    
        $inserttrue=$this->DashboardModel->new_expence($data);
        if($inserttrue==true)
        {
            redirect(base_url('getbuildingdetails'),'refresh');
        }
        else
        {
            redirect(base_url('expencebuilding'));
        }

    }

    // public function validate_building_type($str)
    // {
    //     if ($str == '') {
    //         $this->form_validation->set_message('validate_building_type', 'Please select a building type');
    //         return FALSE;
    //     } else {
    //         return TRUE;
    //     }
    // }

}
