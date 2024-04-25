<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Model {

	function allSites()
	{
		$query = $this->db->get('site');
		return $query->result_array();
	}


    function addit($add_site)
    {
        $query = $this->db->insert('site', $add_site);
        if($query)  
        {
            return 1;
        }
    }


    function updateSite($id,$update_site)
    {
    	$this->db->where('S_Id', $id);
		$query = $this->db->update('site', $update_site);
		if($query)
    	{
    		return 1;
    	}
    }

  //   function deleteProcedure($id)
  //   {
  //   	$this->db->where('procedure_id', $id);
		// $query = $this->db->delete('procedures');
		// if($query)
		// {
		// 	return 1;
		// }
  //   }


    function totalSites()
    {        
        $query = $this->db->get('site');
        if($query)
        {
            return $query->num_rows();
        }
    }



  function getSite($id)
    {        
         $query =  $this->db->query("SELECT c.Name as CName, s.* from Site s join Client c  on s.C_Id = c.C_Id where s.S_Id = $id");
         if($query)
        {
            return $query->result_array();
        }
    }      




  function siteAgainstClient($id)
    {        
     
          $query =  $this->db->query("SELECT s.S_Id , s.Name from Site s join Client c  on s.C_Id = c.C_Id where c.C_Id = $id");
        
        // return $id;
         if($query)
        { 
            return $query->result_array();
        }
    }      

    
    // function getSite($id)
    // {        
    //     $this->db->where('S_Id',$id);
    //     $query = $this->db->get('site');
    //     if($query)
    //     {
    //         return $query->result_array();
    //     }
    // }      

}
