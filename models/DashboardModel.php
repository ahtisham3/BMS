<?php
Class DashboardModel extends CI_Model
{
    function __construct()
    {

        parent::__construct();
        $this->second_database = $this->load->database('second_database', TRUE);
    }
    public function getSalesByMonth($company_id)
    {
        $query= $this->second_database->query("
        SELECT 
        payment_Status,
        invoice_Date,
        SUM(customer_billingdetails.customer_TotalAmonut ) AS totalSales
    FROM
        customer_billingdetails
        where month(customer_billingdetails.invoice_Date)=month(CURRENT_DATE)
        and company_Id=$company_id
    GROUP BY 
        payment_Status
    ORDER BY 
    payment_Status DESC");
        return $query->result();
    }
    public function getTotalCustomer($companyid)
    {
        $query =  $this->second_database->query("
        SELECT count(month(create_CustomerTime)) AS total_customers,
         date(create_CustomerTime) 
         FROM 
         customer_table 
         where company_Id=$companyid
         GROUP BY 
         month(create_CustomerTime) order by 
         month(create_CustomerTime) DESC limit 2");
         return $result = $query->result();
    }
    public function getDefaltersByBuilding($company_id)
    {
      $query= $this->second_database->query("
                SELECT 
                building_table.building_Name,
                MONTHName(customer_billingdetails.invoice_Date) AS invoice_month,
                SUM(customer_billingdetails.customer_TotalAmonut) AS total_amount
            FROM 
                customer_table 
            JOIN 
                customer_billingdetails ON customer_table.customer_Id = customer_billingdetails.user_ID
            JOIN 
                customer_appartment ON customer_appartment.user_Id = customer_billingdetails.user_Id
            JOIN 
                appartment_table ON customer_appartment.appartment_Id = appartment_table.appartment_TableId
            JOIN 
                floor_table ON appartment_table.floor_Type = floor_table.floor_Id
            JOIN 
                building_table ON floor_table.floor_Building = building_table.building_Id
            WHERE 
                customer_billingdetails.payment_Status = 0
                AND customer_billingdetails.invoice_EndDate < CURDATE()
                and building_table.company_Id=$company_id
            GROUP BY 
                building_table.building_Id,
                MONTH(customer_billingdetails.invoice_Date)
            ORDER BY 
                building_table.building_Id,
                MONTH(customer_billingdetails.invoice_Date)
      ");
      return $query->result();
    }
    public function getRevenyByBuilding($company_id)
    {
        $query= $this->second_database->query("
        SELECT 
        building_table.building_Name,
        monthname(customer_billingdetails.invoice_Date) AS invoice_month,
       SUM(customer_billingdetails.customer_TotalAmonut ) AS total_amount,
       sum(customer_billingdetails.discontAmont) as discount_amont
    FROM 
        customer_table 
    JOIN 
        customer_billingdetails ON customer_table.customer_Id = customer_billingdetails.user_ID
    JOIN 
        customer_appartment ON customer_appartment.user_Id = customer_billingdetails.user_Id
    JOIN 
        appartment_table ON customer_appartment.appartment_Id = appartment_table.appartment_TableId
    JOIN 
        floor_table ON appartment_table.floor_Type = floor_table.floor_Id
    JOIN 
        building_table ON floor_table.floor_Building = building_table.building_Id
    WHERE 
        customer_billingdetails.payment_Status = 1 and
       month(customer_billingdetails.invoice_Date)=MONTH(CURRENT_DATE())
       and building_table.company_Id=$company_id
    GROUP BY 
        building_table.building_Id
    ORDER BY 
        building_table.building_Id
      ");
      return $query->result();
    }
    public function serviceWiseData($company_id)
    {
        $query= $this->second_database->query("
        select servicecount.service_Count*service_table.service_Price as totalrevenu,service_table.service_Name
        ,servicecount.service_Date
        from service_table left join (
           SELECT 
            date(service_Created) AS service_Date,
            service_Id,
            COUNT(service_Id) AS service_Count
        FROM  
            customer_service_table
        WHERE 
        month(service_Created) = month(CURDATE()) 
        and company_Id=$company_id
      
        GROUP BY 
            service_Id) as servicecount on servicecount.service_Id=service_table.service_id
            order by servicecount.service_Date DESC
        ");
        return $query->result();
    }
    public function salesReport($companyId) {

        $query= $this->second_database->query("SELECT building_table.building_Name, ft.floor_Name,
         at.appartment_Name, ca.user_Id, ct.customer_FirstName, cbd.customer_TotalAmonut,
          cbd.payment_Status, ct.customer_LastName, ct.customer_Status, ct.customer_Id,
           cbd.created_at,cbd.discontAmont,cbd.customer_TotalAmonut-cbd.discontAmont as totaldiscount
        FROM building_table
        LEFT JOIN floor_table AS ft ON building_table.building_Id = ft.floor_Building
        LEFT JOIN appartment_table AS at ON ft.floor_id = at.floor_Type
        LEFT JOIN customer_appartment AS ca ON at.appartment_TableId = ca.appartment_Id
        LEFT JOIN customer_table AS ct ON ca.user_Id = ct.customer_Id
        LEFT JOIN customer_billingdetails AS cbd ON ct.customer_Id = cbd.user_Id
        WHERE building_table.company_Id = $companyId
        and    month(cbd.created_at)=month(CURRENT_DATE)
          
            AND cbd.payment_Status = 1
       ");
        return $query->result();
       
    }
    public function expenceHistory($buildingId)
    {
        $this->second_database->select(' ed.expence_Name,expence_Type.expence_Name as typeexpence, ed.expence_Price, ed.expence_Date, MONTHNAME(ed.expence_Date) AS expence_Month
       , YEAR(ed.expence_Date) AS expence_Year');
        $this->second_database->from('expence_details as ed');
        $this->second_database->join('expence_Type', 'ed.expence_Type = expence_Type.expence_TypeId');
        $this->second_database->join('building_table', 'ed.expence_BuildingId = building_table.building_Id');
        $this->second_database->where('MONTH(ed.expence_Date)', date('m'));
        $this->second_database->where('building_Id',$buildingId);
        $query=$this->second_database->get();
        return $result=$query->result();
    }
    public function expenceType()
    {
      $this->second_database->select('*');
      $this->second_database->from('expence_type');
      $query=$this->second_database->get();
      return $result=$query->result();
    }
    public function new_Expence($data)
    {   
        $inserted= $this->second_database->insert("expence_details", $data);
         if ($inserted) {
            return true;
        } else {
            return false;
        }
    }
    public function yearlyRevenuReport($company_id)
    {
        $query= $this->second_database->query("SELECT  sum(cbd.customer_TotalAmonut) as total_Revenu,monthname(cbd.created_at) as mothwiserevenu, sum(cbd.discontAmont)  as totalDiscount
        FROM building_table
        LEFT JOIN floor_table AS ft ON building_table.building_Id = ft.floor_Building
        LEFT JOIN appartment_table AS at ON ft.floor_id = at.floor_Type
        LEFT JOIN customer_appartment AS ca ON at.appartment_TableId = ca.appartment_Id
        LEFT JOIN customer_table AS ct ON ca.user_Id = ct.customer_Id
        LEFT JOIN customer_billingdetails AS cbd ON ct.customer_Id = cbd.user_Id
        WHERE building_table.company_Id = $company_id
      
            AND ct.customer_Status = 1
            AND cbd.payment_Status = 1
            group by month(cbd.created_at)
       ");
        return $query->result();
    }
    public function yearlyExpenceReport($company_id)
    {
        $this->second_database->select('monthname(ed.expence_Date) AS month, SUM(ed.expence_Price) AS totalexpense');
        $this->second_database->from('expence_details AS ed');
        $this->second_database->group_by( 'month(ed.expence_Date)');
        $this->second_database->where('ed.company_Id', $company_id);
            $query = $this->second_database->get();
            return $query->result();
    }
}

?>



