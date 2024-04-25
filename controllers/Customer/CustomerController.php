<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');
class CustomerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("CustomerModel");
        $this->load->model("AppartmentsModel");
        $this->load->model("BillingModel");
        $this->load->model("Customer_ServicesModel");
        $this->load->model("ServiceModel");
    }
    public function index()
    {
        $this->authmiddleware->checkAuth();
        $companyid = $this->session->userdata("company");
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        // $data['Customer_table']=$this->CustomerModel->getCustomerDetails();
        $data['buildingDetail'] = $this->AppartmentsModel->getBuildingDetail($companyid);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view("customers/customerlist", $data);
        $this->load->view('inc/footer');
    }
    public function create()
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view("customers/addcustomer");
        $this->load->view('inc/footer');
    }

    public function createCustomer()
    {
        $this->authmiddleware->checkAuth();
        $data['company_Id'] = $this->session->userdata('company');
        $data['customer_FirstName'] = $this->input->post("customer_FirstName");
        $data['customer_LastName'] = $this->input->post("customer_LastName");
        $data['customer_Cnic'] = $this->input->post("customer_Cnic");
        $data['customer_MobileNumber'] = $this->input->post("customer_MobileNumber");
        $data["customer_Email"] = $this->input->post("customer_Email");
        $data["customer_Adress"] = $this->input->post("customer_Adress");
        $data["customer_Dob"] = $this->input->post("customer_Dob");
        $data["customer_Status"] = $this->input->post("customer_Status");
        $data["customer_EmergencyNumber"] = $this->input->post("customer_EmergencyNumber");
        $data["customer_Resident"] = $this->input->post("customer_Resident");
        $customer_Id = $this->CustomerModel->insertCustomerDetails($data);
        $this->session->set_userdata('customer_Id', $customer_Id);
        // redirect(base_url("getcustomerdetails"));
        redirect(base_url("addcustomerservices"));
    }
    public function updateCustomer($id)
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        // $data['Customer_type']=$this->CustomerModel->getCustomerType();
        $data['customer_table'] = $this->CustomerModel->getCustomerById($id);
        ////print_r($data);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view('customers/editcustomer', $data);
        $this->load->view('inc/footer');
    }
    public function handleUpdateCustomer($id)
    {
        $this->authmiddleware->checkAuth();
        $data['customer_FirstName'] = $this->input->post("customer_FirstName");
        $data['customer_LastName'] = $this->input->post("customer_LastName");
        $data['customer_Cnic'] = $this->input->post("customer_Cnic");
        $data['customer_MobileNumber'] = $this->input->post("customer_MobileNumber");
        $data["customer_Email"] = $this->input->post("customer_Email");
        $data["customer_Adress"] = $this->input->post("customer_Adress");
        $data["customer_Dob"] = $this->input->post("customer_Dob");
        $data["customer_Status"] = $this->input->post("customer_Status");
        $data["customer_EmergencyNumber"] = $this->input->post("customer_EmergencyNumber");
        $data["customer_Resident"] = $this->input->post("customer_Resident");
        $this->CustomerModel->updateCustomerDetails($data, $id);
        redirect(base_url("Customer/CustomerController/index"));
    }
    public function deleteCustomer($id)
    {
        $this->authmiddleware->checkAuth();
        $this->CustomerModel->deleteCustomer($id);
        $this->AppartmentsModel->upDateAppartmentStatus($id);
        $this->Customer_ServicesModel->upDateCustomerServiceStatus($id);
        
        redirect(base_url("Customer/CustomerController/index"));
    }
    public function validate_Customer_CategoryType($str)
    {
        if ($str == '') {
            $this->form_validation->set_message('validate_Customer_CategoryType', 'Please select a Customer type');
            return FALSE;
        } else {
            return TRUE;
        }
    }



    // get customer to show in customer crud 
    public function getCustomerByBuildingId($id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->CustomerModel->getCustomerByBuildingId($id);
        echo json_encode($data);
    }



    public function getCustomerByBuildingIdForBillingReport($id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->CustomerModel->getCustomerByBuildingIdForBillingReport($id);
        ////print_r($data);
        echo json_encode($data);
    }

    public function getCustomerByBuildingIdForReceivePayemt($id)
    {
        $this->authmiddleware->checkAuth();
        $data = $this->CustomerModel->getCustomerByBuildingIdForReceivePayemt($id);
      
       echo json_encode($data);
    }

    public function checkUserDues()
    {
        $this->authmiddleware->checkAuth();
        $customer_Id = $this->input->post("customerId");
        $data = $this->BillingModel->checkUserDues($customer_Id);
        echo json_encode($data);
    }
    public function getUserHistory($customer_Id)
    {
        $this->authmiddleware->checkAuth();
        $this->load->view("includes/header");
        $this->load->view("includes/sidebar");
        $data['customer'] = $this->CustomerModel->getcustomerHistory($customer_Id);
        $data['appartment'] = $this->CustomerModel->getappartmentsHistory($customer_Id);
        //print_r($data);
        $this->load->view("Customer/customerHistory", $data);
        $this->load->view("includes/footer");
    }
    public function customerHistory($customer_Id)
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        // $data['Customer_type']=$this->CustomerModel->getCustomerType();
        $data['customerdata'] = $this->CustomerModel->getcustomerHistory($customer_Id);
        $data['customerhistory'] = $this->CustomerModel->customerHistory($customer_Id);
        //print_r($data);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view('customers/customerhistory', $data);
        $this->load->view('inc/footer');
    }
    public function editCustomerService($customer_Id)
    {
        $this->authmiddleware->checkAuth();
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('item');
        $data['customerDetails'] = $this->CustomerModel->getCustomerById($customer_Id);
        $data['service_details'] = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
        $data['serviceGernal'] = $this->Customer_ServicesModel->getAllGernalServices();
        $data['serviceUtilites'] = $this->Customer_ServicesModel->getAllUtilites();
        //print_r($data);
        $this->load->view('inc/header');
        $this->load->view('inc/nav', $data);
        $this->load->view('customerservice/updatecustomer_service', $data);
        $this->load->view('inc/footer');
        // //print_r($invoiceDetails);
        // //print_r($data);
        // // $this->load->view('inc/header');
        // // $this->load->view('inc/nav', $data);
        // // $this->load->view('customerservice/updatecustomer_service',$data);
        // // $this->load->view('inc/footer');

    }
    public function updateCustomerService($customer_Id)
    {
        $this->authmiddleware->checkAuth();
        $billingDetails = $this->Customer_ServicesModel->latestInvoiceDetail($customer_Id);
        $data = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
        //print_r($data);
        $updateservice = $this->input->post('selected_services');

        if ($updateservice != '') {
            $servicedata = explode(',', $updateservice);
            foreach ($data as $previousserviceid) {
                $serviceFound = false;
                foreach ($servicedata as $updateserviceid) {
                    if ($previousserviceid->service_Id == $updateserviceid) {
                        $serviceFound = true;
                        // Service found in both previous and updated data, update it
                        //$this->Customer_ServicesModel->updateCustomerService($previousserviceid->customer_service_Id);
                        print_r("alreadypresent: $previousserviceid->service_Id");
                        break;
                    }
                }
                if (!$serviceFound) {
                    // Service exists in previous data but not in updated data, update it
                    $this->Customer_ServicesModel->updateCustomerService($previousserviceid->customer_service_Id);
                    print_r("Service removed: $previousserviceid->service_Price");

                    // Update total amount by subtracting the service price
                    $updateTotalAmount = $billingDetails->customer_TotalAmonut - $previousserviceid->service_Price;
                    $billingid = $billingDetails->billing_Id;
                    $this->Customer_ServicesModel->removeServicePricefromtotaaomnt($updateTotalAmount, $billingid);
                    print_r("total amount after remove: $updateTotalAmount");
                }
            }

            foreach ($servicedata as $updateserviceid) {
                $serviceFound = false;
                foreach ($data as $previousserviceid) {
                    if ($previousserviceid->service_Id == $updateserviceid) {
                        $serviceFound = true;
                        break; // Found a match, no need to continue searching
                    }
                }
                if (!$serviceFound) {

                    // Service exists in updated data but not in previous data, add it
                    $this->Customer_ServicesModel->addCustomerService($updateserviceid, $customer_Id);
                    print_r("New service added: $updateserviceid");

                    // Update total amount by adding the service price
                    $getservicedetial = $this->ServiceModel->getServiceById($updateserviceid);
                    $updateTotalAmount = $billingDetails->customer_TotalAmonut + $getservicedetial->service_Price;
                    $billingid = $billingDetails->billing_Id;
                    $this->Customer_ServicesModel->addServicePricefromtotaaomnt($updateTotalAmount, $billingid);
                    print_r("total amount after add: $updateTotalAmount");
                }
            }
        } else {
            $data = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
            foreach ($data as $previousserviceid) {
                $this->Customer_ServicesModel->updateCustomerService($previousserviceid->customer_service_Id);
                print_r("Service removed: $previousserviceid->service_Id");

                // Update total amount by subtracting the service price
                $updateTotalAmount = $billingDetails->customer_TotalAmonut - $previousserviceid->service_Price;
                $billingid = $billingDetails->billing_Id;
                $this->Customer_ServicesModel->removeServicePricefromtotaaomnt($updateTotalAmount, $billingid);
                print_r("total amount after all value delete: $updateTotalAmount");
            }
        }

        redirect(base_url("getcustomerdetails"));






        //           $data = $this->ServiceModel->getServiceDetailsForBillingLatest($customer_Id);
        //            $updateservice=$this->input->post('selected_services');

        //            $servicedata=explode(',',$updateservice);
        //            print_r($servicedata);
        //            print_r($data);

        //           if(count($servicedata)==1)
        //           {

        //             print('array is 1');

        //           }
        //           else{

        //             print('array is more then 1data ');

        //  foreach($servicedata as $updateserviceid)
        //            {
        //             foreach($data as $previousserviceid)
        //             {
        //            if($previousserviceid->service_Id !== $updateserviceid)
        //            {

        //             $this->Customer_ServicesModel->addCustomerService($updateserviceid,$customer_Id);    
        //             print_r("new servie add");   
        //            }
        //            else
        //            {
        //              print_r("no data found");

        //            }
        //         }
        //            }


        //           }




    }
}
