<?php
class AppartmentsModel extends CI_Model
{

     public function __construct()
     {
        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
     }

    // public function getAppartmentsDetail()
    // {  
    //    $this->second_database->select('a.*, b.building_Name, ft.Appartments_TypeName');
    //    $this->second_database->from('Appartments_table a');
    //    $this->second_database->join('building_table b', 'a.Appartments_Building = b.building_Id');
    //    $this->second_database->join('Appartments_Type ft', 'a.Appartments_Type = ft.Appartments_TypeId');
    //     $query =$this->second_database->get();
    //    return $result = $query->result();
    // }
    public function getAppartmentById($id)
    {
        //only get free appartment
       $this->second_database->select('*');
       $this->second_database->from('appartment_table as apt');
       $this->second_database->join('floor_table as ft', 'apt.floor_Type = ft.floor_Id', 'inner');
       $this->second_database->join('building_table as bt', 'bt.building_Id = ft.floor_Building', 'inner');
       $this->second_database->where('ft.floor_Id', $id);
       $this->second_database->where('apt.appartment_Status', 1);
      // $this->second_database->where('apt.appartment_Status',1);
        $query =$this->second_database->get();
        return $query->result();
    }
    // public function getAppartmentsDetailbyBuilding($id)
    //     {
    //        $this->second_database->select('a.*, b.building_Name, ft.Appartments_TypeName');
    //        $this->second_database->from('Appartments_table a');
    //        $this->second_database->join('building_table b', 'a.Appartments_Building = b.building_Id');
    //        $this->second_database->join('Appartments_Type ft', 'a.Appartments_Type = ft.Appartments_TypeId');
    //        $this->second_database->where('Appartments_Building', $id);
    //         $query =$this->second_database->get();
    //         return $result = $query->result();      
    //     }
    public function insertAppartmentsDetails($data)
    {
        date_default_timezone_set("Asia/Karachi");
        $data['appartment_CreateDate'] = date('Y-m-d H:i:s');
       $this->second_database->insert("appartment_table", $data);
    }
    //     public function getremaingAppartmentsdetails($id)
    // {
    //    $this->second_database->select('ft.*, COUNT(ft.Appartments_Status) as Appartments_used, bt.building_Appartmentss, (bt.building_Appartmentss - COUNT(ft.Appartments_Status)) as remaining_Appartmentss');
    //    $this->second_database->from('building_table as bt');
    //    $this->second_database->join('Appartments_table as ft', 'bt.building_Id = ft.Appartments_Building');
    //    $this->second_database->where('bt.building_Id', $id); 
    //    $this->second_database->group_by('bt.building_Id');
    //     $query =$this->second_database->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->result(); // Return the result if it exists
    //     } else {
    //         return false; // Return false if no results found
    //     }
    // }
    public function getAppartmentById1($id)
    {
       $this->second_database->select('*');
       $this->second_database->from('appartment_table as apt');
       $this->second_database->join('floor_table as ft', 'apt.floor_Type = ft.floor_Id', 'inner');
       $this->second_database->join('building_table as bt', 'bt.building_Id = ft.floor_Building', 'inner');
       $this->second_database->where('apt.appartment_TableId', $id);
        $query =$this->second_database->get();
        return $query->row();
    }
    public function customer_ServiceAppartmentDetail($id)
    {
       $this->second_database->select('*');
       $this->second_database->where('appartment_TableId', $id);
        $query =$this->second_database->get('appartment_table');
        return $query->result();
    }
    public function updateAppartmentsDetails($data, $id)
    {
       $this->second_database->where('appartment_TableId', $id);
       $this->second_database->update('appartment_table', $data);
    }

    public function updateAppartmentsbycustomer( $id)
    {
        $this->second_database->set('appartment_Status', 0);
        $this->second_database->where('appartment_TableId', $id);
        $this->second_database->update('appartment_table');
    }

    public function deleteAppartments($id)
    {
       $this->second_database->delete('appartment_table', array('appartment_TableId' => $id));
    }

    public function getFloorData($id)
    {
       $this->second_database->select('*');
       $this->second_database->from('building_table as b');
       $this->second_database->join('floor_table as ft', 'b.building_Id = ft.floor_Building', 'inner');
       $this->second_database->where('b.building_Id', $id);
        // Execute the query and return the result
        $query =$this->second_database->get();
        return $query->result();
    }
    public function getFlooreDetail()
    {
        $query =$this->second_database->get('floor_table');
        return $query->result();
    }

    public function getFloorDetailById($id)
    {
       $this->second_database->select('*');
       $this->second_database->from('floor_table');
       $this->second_database->where('floor_Building', "(SELECT floor_Building 
                                            FROM floor_table 
                                            LEFT JOIN appartment_table AS apt ON floor_table.floor_Id = apt.floor_Type
                                            WHERE apt.appartment_TableId = $id)", FALSE);

        $query =$this->second_database->get();
        return $query->result();
    }
    public function getBuildingDetail($companyid)
    {
        $query=$this->second_database->query("select * from building_table where building_Status=1 and company_Id= $companyid");
           return $query->result();
    }
    public function getAppartmentsType()
    {
        $query =$this->second_database->get('appartment_type');
        return $query->result();
    }

    public function getAppartmentsData($id)
    {
       $this->second_database->select('ft.*, COUNT(ft.Appartments_Status) as Appartments_used, bt.building_Appartmentss, (bt.building_Appartmentss - COUNT(ft.Appartments_Status)) as remaining_Appartmentss');
       $this->second_database->from('building_table as bt');
       $this->second_database->join('Appartments_table as ft', 'bt.building_Id = ft.Appartments_Building');
       $this->second_database->where('bt.building_Id', $id);
       $this->second_database->group_by('bt.building_Id');
        $query =$this->second_database->get();
        if ($query->num_rows() > 0) {
            return $query->result(); // Return the result if it exists
        } else {
            return false; // Return false if no results found
        }
    }
    public function getAppartmentForBilling($customer_Id)
    {
       $this->second_database->select('*');
       $this->second_database->from('appartment_table');
       $this->second_database->join('customer_appartment', 'appartment_table.appartment_TableId = customer_appartment.appartment_Id', 'join');
       $this->second_database->where('customer_appartment.user_Id', $customer_Id);
        $query =$this->second_database->get();
        return $query->result();
    }

    public function getAppartmentsAvailable($floor_id)
    {
        $query =$this->second_database->query("
        select count(appartment_table.floor_Type) as created,appartment_table.floor_Type,
        floor_table.total_Appartments,(floor_table.total_Appartments-count(appartment_table.floor_Type)) as remaining_Appartments 
        from floor_table left join appartment_table on floor_table.floor_Id=appartment_table.floor_Type group by appartment_table.floor_Type HAVING 
        appartment_table.floor_Type=$floor_id
       ");
        return $result = $query->result();
    }

public function getMetersDetail($customer_Id)
{
$query=$this->second_database->query("
select elcMeterNumeber,	gasMeterNumber,waterConnectionNumber 
from 
appartment_table as at 
join customer_appartment as ca on at.appartment_TableId=ca.appartment_Id
where ca.user_Id=$customer_Id
");
 
return $result=$query->row();
}

    public function upDateAppartmentStatus($id)
    {
        $sql = "UPDATE appartment_table AS a 
        JOIN customer_appartment AS ca ON ca.appartment_Id = a.appartment_TableId 
        SET a.appartment_Status = 1,
          ca.customer_appartment_Status=0
        WHERE ca.user_Id = ?";
       $this->second_database->query($sql, array($id));
    }
}
