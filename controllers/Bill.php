<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {
	
	public function index($ref){
                $appointment = $this->appointments->getAppointmentdetails($ref);                
                $data['procedures'] = $this->appointments->getProcedures($appointment[0]['appointment_id']);
                $data['appointment'] = $this->appointments->getAppointmentdetails($ref);
                $data['doctors'] = $this->doctors->allDoctors();         
                $data['all_procedures'] = $this->procedures->allProcedures();                 
                $data['bill'] = $this->patients->getBill($ref);               
                $data['settings'] = $this->settings->getSetting('total_tax');
        	$data['page_title'] = 'Billing';
                $data['page_css'] = "assets/pages/css/invoice-2.min.css";                
                $this->load->view('inc/header', $data);
                $this->load->view('inc/nav', $data);
                $this->load->view('bill/index', $data);
                $this->load->view('inc/footer');
	}

        function view_bill($ref){
                $appointment = $this->appointments->getAppointmentdetails($ref);                
                $data['procedures'] = $this->appointments->getProcedures($appointment[0]['appointment_id']);                            
                $data['appointment'] = $this->appointments->getAppointmentdetails($ref);
                $data['doctors'] = $this->doctors->allDoctors();         
                $data['all_procedures'] = $this->procedures->allProcedures();                 
                $data['bill'] = $this->patients->getBill($ref);               
                $data['settings'] = $this->settings->getSetting('total_tax');
                $data['page_title'] = 'Billing';
                $data['page_css'] = "assets/pages/css/invoice-2.min.css";                
                $this->load->view('inc/header', $data);
                $this->load->view('inc/nav', $data);
                $this->load->view('bill/view', $data);
                $this->load->view('inc/footer');
        }

	function all(){
        	$data['page_title'] = 'Billing';
                $this->load->view('inc/header', $data);
                $this->load->view('inc/nav', $data);
                $this->load->view('bill/all', $data);
                $this->load->view('inc/footer');
	}

        function search_bill()
        {
                $data['page_title'] = 'Billing Search';
                $this->load->view('inc/header', $data);
                $this->load->view('inc/nav', $data);
                $this->load->view('bill/search', $data);
                $this->load->view('inc/footer');  
        }

        function select_bill()
        {
                $search = $this->input->post('search');
                $ref = $this->appointments->checkAppointment($search);                
                if($ref==1)                
                {                        
                        redirect('new-bill/'.$search,'refresh');
                }
                else
                {
                        $ref2 = $this->appointments->checkOtherAppointment($search);
                        if($ref2==1)
                        {
                                redirect('new-visit?id='.$search,'refresh');
                        }
                        else
                        {
                                redirect('search-bill','refresh');
                        }
                }
        }

        function update_bill()
        {
                $app = $this->input->post('app');
                $procedures = $this->input->post('procedures');                
                $tax = $this->input->post('tax');
                $discount = $this->input->post('discount');
                $reason = $this->input->post('reason'); 
                $final = $this->input->post('final');
                $paid = $this->input->post('paid');
                $date = date('m/d/Y');
                $time = date('H:i:a');                  

                if($discount==0){ $reason=''; }

                $check = $this->patients->checkBill($app);                

                if($check==1)
                {
                        $array = array("bill_tax"=>$tax,"bill_discount"=>$discount,"bill_reason"=>$reason,"bill_final"=>$final,"bill_date"=>$date,"bill_time"=>$time,"bill_paid"=>$paid);
                        $add = $this->patients->updateBill($app,$array);
                }
                else
                {
                        $array = array("bill_appointment"=>$app,"bill_tax"=>$tax,"bill_discount"=>$discount,"bill_reason"=>$reason,"bill_final"=>$final,"bill_date"=>$date,"bill_time"=>$time,"bill_payment"=>'',"bill_reference"=>'',"bill_paid"=>$paid);
                        $adds = $this->patients->finalBill($array);

                        $ref = 'INV-'.date('y').date('m').date('d').$adds;
                        
                        $array2 = array("bill_reference"=>$ref);
                        $add = $this->patients->updateBill($app,$array2);                        
                }                

                $del = $this->appointments->deleteAttach($app);
                                
                $all = explode(",",$procedures);
                for($i=0;$i<count($all);$i++)
                {
                        $attach_procedure = array('attach_appointment'=>$app,'attach_procedure'=>$all[$i]);              
                        $addAttach = $this->appointments->addAttach($attach_procedure);
                }      

                if($add=1)
                {
                        echo json_encode(1);
                }
                else
                {
                        echo json_encode(0);
                }
        }

}
?>