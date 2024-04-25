<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Site extends CI_Controller {

    function Sites_list(){
                
                $data['page_title'] = 'Dashboard';
                $data['site'] = $this->Sites->allSites();         
                $this->load->view('inc/header');
                $this->load->view('inc/nav', $data);
                $this->load->view('Site/list', $data);
                $this->load->view('inc/footer');
    }


    function add_site(){
                
                $data['page_title'] = 'Dashboard';
                
                $data['Clients'] = $this->Clients->allClients(); 

                
                $this->load->view('inc/header');
                $this->load->view('inc/nav', $data);
                $this->load->view('Site/add', $data);
                $this->load->view('inc/footer');

                }

        function edit_site($id){

            //  $data['page_css'] = 'css/bootstrap.min.css';
                
                $data['page_title'] = 'Dashboard';
                $data['Clients'] = $this->Clients->allClients();  
                $data['detail'] = $this->Sites->getSite($id);

                $this->load->view('inc/header');
                $this->load->view('inc/nav', $data);
                $this->load->view('Site/edit', $data);
                $this->load->view('inc/footer');
        }

        function new_site(){

                $name = $this->input->post('name');
                $adress = $this->input->post('address');
                $phone = $this->input->post('phone');
                $client = $this->input->post('Client');

                $add_site = array('Name'=>$name,'Address'=>$adress,'Number'=>$phone,'C_Id'=>$client);
                $added = $this->Sites->addit($add_site);
                if($added==1)
                {       
                    redirect('sites','refresh');       
                }                
        }

        function update_site()
        {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $adress = $this->input->post('address');
                $phone = $this->input->post('phone');
                $client = $this->input->post('Client');
                $status = $this->input->post('Status');

             
                $edit_Site = array('Name'=>$name,'Address'=>$adress,'Number'=>$phone, 'C_Id'=>$client ,'status'=>$status);
                
                $updated = $this->Sites->updateSite($id,$edit_Site);

                if($updated==1)
                {       
                        redirect('sites','refresh');       
                }                
        }


        


        function SiteOfClient()
        {

                $id = $this->input->post('val');    

                $result["res"] = $this->Sites->siteAgainstClient($id);
                
                echo json_encode($result);
        }


        // function delete_procedure($id){                
        //         $delete = $this->procedures->deleteProcedure($id);
        //         if($delete==1)
        //         {       
        //                 redirect('procedures','refresh');       
        //         }                
        // }
}
?>