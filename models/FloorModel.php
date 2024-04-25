<?php 
class floorModel extends CI_Model 
{
        
    function __construct()
    {
        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
    }
    public function getFloorDetail()
    {  
        $this->second_database->select('a.*, b.building_Name, ft.floor_TypeName');
        $this->second_database->from('floor_table a');
        $this->second_database->join('building_table b', 'a.floor_Building = b.building_Id');
        $this->second_database->join('floor_Type ft', 'a.floor_Type = ft.floor_TypeId');
        $query = $this->second_database->get();
       return $result = $query->result();
    }
    public function getFloorById($id)
    {
         return $this->second_database->get_where('floor_table',array('floor_Id'=>$id))->row();           
    } 
    public function getFloorDetailbyBuilding($id)
        {
            $this->second_database->select('a.*, b.building_Name, ft.floor_TypeName');
            $this->second_database->from('floor_table a');
            $this->second_database->join('building_table b', 'a.floor_Building = b.building_Id');
            $this->second_database->join('floor_Type ft', 'a.floor_Type = ft.floor_TypeId');
            $this->second_database->where('floor_Building', $id);
            $query = $this->second_database->get();
            return $result = $query->result();      
        }
    public function insertFloorDetails($data)
    {
        $data['create_floorTime'] = date('Y-m-d H:i:s');
       $this->second_database->insert("floor_table", $data);
    }
//     public function getremaingfloordetails($id)
// {
//     $this->second_database->select('ft.*, COUNT(ft.floor_Status) as floor_used, bt.building_Floors, (bt.building_Floors - COUNT(ft.floor_Status)) as remaining_floors');
//     $this->second_database->from('building_table as bt');
//     $this->second_database->join('floor_table as ft', 'bt.building_Id = ft.floor_Building');
//     $this->second_database->where('bt.building_Id', $id); 
//     $this->second_database->group_by('bt.building_Id');
//     $query = $this->second_database->get();
    
//     if ($query->num_rows() > 0) {
//         return $query->result(); // Return the result if it exists
//     } else {
//         return false; // Return false if no results found
//     }
// }
    public function updateFloorDetails($data,$id)
    {
        $this->second_database->where('floor_Id',$id);
        $this->second_database->update('floor_table',$data);
    }
    public function deleteFloor($id)
    {
        $this->second_database->delete('floor_table',array('floor_Id'=>$id));
    }
    public function getBuildingDetail( $companyid)
    {
         $query=$this->second_database->query("select * from building_table where building_Status=1 and company_Id= $companyid");
           return $query->result();
       
    }

    
    public function getFloorTypeDetail()
    {
        $query = $this->second_database->get('floor_type');
        return $query->result();
    }
    public function getFloorData($id)
{
    $this->second_database->select('ft.*, COUNT(ft.floor_Status) as floor_used, bt.building_Floors, (bt.building_Floors - COUNT(ft.floor_Status)) as remaining_floors');
    $this->second_database->from('building_table as bt');
    $this->second_database->join('floor_table as ft', 'bt.building_Id = ft.floor_Building');
    $this->second_database->where('bt.building_Id', $id); 
    $this->second_database->group_by('bt.building_Id');
    $query = $this->second_database->get();
    if ($query->num_rows() > 0) {
        return $query->result(); // Return the result if it exists
    } else {
        return false; // Return false if no results found
    }
}
}
?>