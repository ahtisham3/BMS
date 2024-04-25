<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Model {

	function allClients()
	{
		$query = $this->db->get('client');
		return $query->result_array();
	}
	
    function addClient($add_cl)
    {
    	$query = $this->db->insert('client', $add_cl);

    	if($query)
    	{
    		return 1;
    	}

    }

    function updateClient($id,$update_cl)
    {
    	$this->db->where('C_Id', $id);
		$query = $this->db->update('client', $update_cl);
		if($query)
    	{
    		return 1;
    	}
    }



    function totalClients()
    {        
        $query = $this->db->get('client');
        if($query)
        {
            return $query->num_rows();
        }
    }

    function getClient($id)
    {        
        $this->db->where('C_Id',$id);
        $query = $this->db->get('client');
        if($query)
        {
            return $query->result_array();
        }
    }      
}


// $(document).on('click','.ranges',function(){
//         var client =   $('#main_search_client option:selected').attr('value');
//         var employee =  $('#main_search_employee option:selected').attr('value');
//         var dates = $("#main_search_dates").val();
//         $.ajax({
//             type: "POST",        
//                  url: "Search",                           
//                  dataType: "json",        
//                  data: {EmpId: employee ,clientId: client , Dates:dates},
//                  cache: false,  

//                  beforeSend: function(){ 
//                     $('.final').hide();                     
//                     $('.noresults').hide();
//                     $('.loading').show();    

//                 //alert("inside ajax");                     
//                 },
//                 success: function(msg) {    
//                     console.log(msg);
                  
//                   var json_data = msg;             
//                    var length = json_data.results.length;          
//                    setTimeout(function(){               
//                        $('.loading').hide();    
//                        if(length==0)
//                         {   $('.noresults').show(); }
//                        else
//                        {
//                             for(var i=0;i<length;i++)
//                            {
//                                 //alert(json_data.results[i].Job_Id);
//                                 $('#search_'+json_data.results[i].Job_Id).show();
//                            }
//                        }
//                    }, 1000);                                                           
//                 },
//                 error: function (req, status, err) {
//                     console.log(err);
//                                     }
//         });
// });

