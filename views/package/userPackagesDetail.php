<?php 
$subType ='';
if($user[0]['Subscription_type']=='M')
{
$subType='Monthly';
}
elseif ($user[0]['Subscription_type']=='Y') {
    $subType='Yearly'; } 
 else
 {
    $subType='Trial';
 }
 if($userPackages[0]['package_period']=='M')
 {
    $m="selected";
    $y='';
 } 
 else {
    $y="selected";
    $m=''; 
 }
    
 // print_r($activepackage);
?>
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>User Packages</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                       <!--  <ul class="page-breadcrumb breadcrumb">
                    
                            <li>
                                <span>Edit Package</span>
                            </li>
                        </ul> -->
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                           
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Packages History</h3>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed">
                                                <thead  id="package-table">
                                                    <tr>
                                                        <th width="10%">Invoice#</th>
                                                          <th width="20%">Package Name</th>
                                                        <th width="10%">Period</th>
                                                        <th width="20%">Start Date</th>
                                                        <th width="20%">End Date</th>
                                                        <th width="10%">Payment Status </th>
                                                        <th width="10%">Amount</th>
                                                        <th width="10%">Status</th>
                                                       

                                                        <!-- <th width="10%">Price</th> -->
                                                    </tr>
                                                </thead>

                                        <tbody>
                                            <?php foreach($userPackages as $list){
                                                if($list['package_period']=='M') $list['package_period'] = 'Montly';
                                                elseif ($list['package_period']=='Y') $list['package_period'] ='Yearly';
                                                else $list['package_period'] ='Trial';

                                                if($list['paymentConfirmation']=='0')$list['paymentConfirmation']='Pending'; else $list['paymentConfirmation'] ="Paid";
                                                if($list['status']=='0' || $list['status']=='2' ) $status="Not Activated"; else if($list['status']=='3') $status='deactive'; else $status='Activated';                                                        
                                                ?>
                                                <tr>
                                                    <td><?php echo $list['order_id']; ?></td>
                                                    <td><?php echo $list['package_name']; ?></td>
                                                    <td><?php echo $list['package_period']; ?></td>
                                                    <td><?php echo $list['startDate']; ?></td>
                                                    <td><?php echo $list['endDate']; ?></td>
                                                    <td><?php echo $list['paymentConfirmation']; ?></td>
                                                    <td><?php echo $list['paymentPrice']; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                   
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <a href="<?php echo base_url('newPackage'); ?>" class=" btn btn-primary btn-sm pull-right" style="color:white"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Change Plan</a> 
                                        <h3 class="panel-title">Active Package Detail </h3>
                                      </div>
                                      <div class="panel-body">

                                       <dl>
                                        <?php 
                                        if($activepackage[0]['package_period']=='Y')
                                        {
                                            $activepackage[0]['package_period']="Yearly";
                                        }
                                        else if($activepackage[0]['package_period']=='M')
                                        {
                                            $activepackage[0]['package_period']="Montly";
                                        }
                                        else
                                        {
                                            $activepackage[0]['package_period']="Trial";
                                        }
                                         ?>
                                          <dt>Package Name: <?php echo $activepackage[0]['package_name'];?></dt>
                                          <dd>Package Period: <?php echo $activepackage[0]['package_period'];?></dd>
                                          <dd>Start Date: <?php echo $activepackage[0]['startDate'];?></dd>
                                           <dd>End Date: <?php echo $activepackage[0]['endDate'];?></dd>
                                            <dd class="pull-right"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></dd>
                                        </dl>

                                      </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


