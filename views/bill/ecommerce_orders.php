<?php
  /* 
   * Paging
   */
  //var_dump($_POST["selected"]);


  $iTotalRecords = COUNT($PayDetails);
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);

  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

$records = array();

foreach ($PayDetails as $pay) {
  $id = $pay['pay_Id'];
  $records["data"][]  = array( 
  $pay['EmployeeName'],
   // $pay['pay_Id']
  '<a  href="View_Pay/'.$pay['pay_Id'].'"  id="ViewPay_'.$pay['pay_Id'].'" class="ViewPay" data-id="'.$pay['pay_Id'].'"> '.$pay['pay_Id'] .' </a> '. "".'  <i class="fa fa-eye" aria-hidden="true"></i>'  ,
  $pay['CreatedOn'],
  $pay['Total'],
  $pay['stat'],
   '<a href="delete-Pay/'.$pay['pay_Id'].'" id="confirm-delete-pay" class="btn btn-default confirm-delete-procedure hidden-print data-id="'.$pay['pay_Id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>',
  );
}


  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
?>