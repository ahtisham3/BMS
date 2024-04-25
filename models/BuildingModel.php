<?php 
class BuildingModel extends CI_Model 
{
 
    function __construct()
    {
        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
    }
    
    public function getBuildingDetails($companyid)
    {
        $this->second_database->select('a.*, b.building_TypeName as Buildingtypename');
        $this->second_database->from('building_table as a');
        $this->second_database->join('buiding_type as b', 'a.building_type = b.building_typeId', 'inner');
        $this->second_database->where('a.company_Id',$companyid);
        $this->second_database->where('building_Status',1);
        $query = $this->second_database->get();
        return $query->result();
    }
   

    public function getBuildingById($id)
    {
         return $this->second_database->get_where('building_table',array('building_Id'=>$id))->row();     
    }
    public function insertBuildingDetails($data)
    { date_default_timezone_set("Asia/Karachi");
        $data['create_BuildingTime'] = date('Y-m-d H:i:s');
       $this->second_database->insert("building_table", $data);
    }
    public function updateBuildingDetails($data,$id)
    {
        $this->second_database->where('building_Id',$id);
        $this->second_database->update('building_table',$data);
    }
    public function deleteBuilding($id)
    {
        $this->second_database->delete('building_table',array('building_Id'=>$id));
    }
    public function getBuildingType()
    {
        $query = $this->second_database->get('buiding_type');
        return $query->result();
    }
}

?>