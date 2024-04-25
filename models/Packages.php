<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packages extends CI_Model
{

    function packagesDetail()
    {
        $query = $this->db->get('packages');
        return $query->result_array();
    }
    function userpackagesDetail($id)
    {
        $this->db->select('userpackage.*,packages.package_name');
        $this->db->where('user_id',$id);
        $this->db->join('packages','packages.package_id=userpackage.package_id');
        $query = $this->db->get('userpackage');

        return $query->result_array();
    }
    function useractivepackagesDetail($id)
    {
        $this->db->select('userpackage.package_period,userpackage.startDate,userpackage.endDate,userpackage.package_period,packages.package_name');
        $this->db->where('status','1');
        $this->db->where('user_id',$id);
         $this->db->join('packages','packages.package_id=userpackage.package_id');
        $query = $this->db->get('userpackage');

        return $query->result_array();
    }
      function getuserpackagesById($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('userpackage');

        return $query->result_array();
    }
    function alluserOrdersDetail()
    {
        $this->db->select('torder.*,userpackage.package_period, userpackage.startDate,userpackage.endDate,userpackage.paymentPrice,userpackage.package_id,packages.package_name');
        $this->db->join('userpackage','userpackage.order_id=torder. tOrder_order_id');
        $this->db->join('packages','packages.package_id=userpackage.package_id');
        $query = $this->db->get('torder');

        return $query->result_array();
    }
    
    function addPackage($dataArray)
    {
          // $this->db->where('user_id', $dataArray['user_id']);
          // $q = $this->db->get('userpackage');
          //   if ($q->num_rows() > 0) {
          //       $this->db->where('user_id',$dataArray['user_id']);
          //       $query2= $this->db->update('userpackage', array('paymentConfirmation' => '1'));
          //       package_period
          //       package_id
          //       endDate
          //           paymentPrice
          //   } 
          //   else {
          //       $ret = 1;
          //   }
            $query1 = $this->db->insert('userpackage', $dataArray);
            if ($query1) {

                 
                  return true;
            }
            else
            {
                  return $query;
            }
        
       
        
    }
    function editExistingPackage($dataArray,$id)
    {       
        $this->db->where('id',$id);
        $query1 = $this->db->update('userpackage', $dataArray);
            if ($query1) {

                  return true;
            }
            else
            {
                  return $query;
            }
        
       
        
    }

    function addOrder($data)
    {
            $query1= $this->db->insert('orders', $data);
            if ($query1) {
                     $this->db->where('order_id', $data['order_id']);
                   $query2= $this->db->update('userpackage', array('paymentConfirmation' => '1'));
                 if($query2)
                 {
                    $this->db->where('order_id', $data['order_id']);
                    $this->db->select('endDate,package_period');
                    $q = $this->db->get('userpackage');
                    $s = $q->result_array();
                  
                     $this->db->where('user_id', $data['user_id']);
                     $queryfinal= $this->db->update('users', array('expiry' => $s[0]['endDate'],'Subscription_type'=>$s[0]['package_period']));
                     if($queryfinal)
                     {
                        return 1;
                     }

                 }

                  
            }
            else
            {
                  return $query;
            }

    }
    function addTorderToDB($data)
    {

          $query1= $this->db->insert('torder', $data);
           if ($query1) {
                 $this->db->where('order_id', $data['tOrder_order_id']);
                   $query2= $this->db->update('userpackage', array('status' => '2'));
                 
                  return true;
            }
            else
            {
                  return $query;
            }

    }
    function confirmOrder($id)
    {
    
            $this->db->where('tOrder_order_id', $id);
            $updtOrder= $this->db->update('torder', array('tOrder_status' => '1'));
            if ($updtOrder) 
            {
                $this->db->where('order_id', $id);
                $this->db->select('endDate,package_period,user_id,package_id');
                $q = $this->db->get('userpackage');
                $s = $q->result_array();
                $this->db->where('user_id', $s[0]['user_id']);
                $updateuserPackagesStatus= $this->db->update('userpackage', array('status'=>'3'));
                $this->db->where('tOrder_order_id', $id);
                $this->db->select('tOrder_paymentDate,tOrder_paymentMethod');
                $q = $this->db->get('torder');
                $paymentDate = $q->result_array();
                $this->db->where('order_id', $id);
                $updateuserPackages= $this->db->update('userpackage', array('paymentDate' => $paymentDate[0]['tOrder_paymentDate'],'paymentMethod'=>$paymentDate[0]['tOrder_paymentMethod'],'paymentConfirmation'=>'1','status'=>'1'));
                if($updateuserPackages)
                {
                    $this->db->where('order_id', $id);
                    $this->db->select('endDate,package_period,user_id,package_id');
                    $q = $this->db->get('userpackage');
                    $s = $q->result_array();
                    $this->db->where('user_id', $s[0]['user_id']);
                    $queryfinal= $this->db->update('users', array('expiry' => $s[0]['endDate'],'Subscription_type'=>$s[0]['package_period'],'package_id'=>$s[0]['package_id']));
                    if($queryfinal)
                    {
                        return 1;
                    }
                }
                else
                {
                    return $updateuserPackages;
                }
            }
            else
            {
                return $updtOrder;
            }
    }
    

   
}
 