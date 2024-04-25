


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
                            <h1>Admin</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                    
                            <li>
                                <span>Admin Dashboard</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="tiles">
                                     <div class="col-sm-12 col-md-2">
                                        <a href="<?php echo base_url('admin/users'); ?>">
                                            <div class="tile bg-blue">
                                                <div class="corner"> </div>
                                                <div class="tile-body">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="text-center"> Users </div>
                                                    <div class="number"> <?php echo $adminUserCount; ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                     <div class="col-sm-12 col-md-4">
                                        <a href="<?php echo base_url('Items'); ?> ">
                                            <div class="tile bg-green">
                                                <div class="corner"> </div>
                                                <div class="tile-body">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="text-center"> Orders </div>
                                                    <div class="number"> <?php echo $adminCorderCount; ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <a href="<?php echo base_url('Items'); ?> ">
                                            <div class="tile bg-red">
                                                <div class="corner"> </div>
                                                <div class="tile-body">
                                                    <i class="fa fa-cart-arrow-down"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="text-center"> Pending Orders </div>
                                                    <div class="number"> <?php echo $adminPorderCount; ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <table class="table table-bordered table-striped table-condensed">
                                        <thead class="bg-blue" id="package-table">
                                            <tr>
                                                <th width="10%">Invoice No</th>
                                                <th width="10%">Email</th>
                                                <th width="20%">Package Period</th>
                                                  <th width="20%">Package Start Date</th>
                                                  <th width="20%">Package End Date</th>
                                                  <th width="20%">Package Name</th>
                                                  <th>Method</th>
                                                <th width="20%">Transaction#</th>
                                                <th width="20%">Amount </th>
                                                <th width="20%">Payment Date</th>
                                                <th width="20%">Attached Recipt</th>
                                                <th width="20%">Status</th>
                                                <th width="20%">Action</th>

                                                <!-- <th width="10%">Price</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                            foreach($userPackages as $list){
                                                if($list['tOrder_status']=='0') $status="Pending"; else $status="Aproved";
                                                if($list['tOrder_paymentMethod']=='1') $method="Bank Transfer"; elseif($list['tOrder_paymentMethod']=='2') $method="Mobile Payment"; else $method=" Credit/Debit Card";                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $list['tOrder_order_id']; ?></td>
                                                    <td><?php echo $list['tOrder_email']; ?></td>
                                                  <td><?php echo $list['package_period']; ?></td>
                                                    <td><?php echo $list['startDate']; ?></td>
                                                      <td><?php echo $list['endDate']; ?></td>
                                                        <td><?php echo $list['package_name']; ?></td>
                                                    <td><?php echo $method; ?></td>
                                                    <td><?php echo $list['tOrder_transactionNo']; ?></td>
                                                    <td><?php echo $list['tOrder_amount']; ?></td>
                                                    <td><?php echo $list['tOrder_paymentDate']; ?></td>
                                                    <td><button class="io" id="<?php echo $list['tOrder_order_id']; ?>" ff="<?php echo base_url('assets/').$list['tOrder_attachRecipt']; ?>" ><img src="<?php echo base_url('assets/').$list['tOrder_attachRecipt']; ?>" width="100px" height="100px"></button></td>
                                                    <td><?php echo $status; ?></td>
                                                   
                                                     <?php if($list['tOrder_status']=='0')

                                                     { ?>
                                                    <td><a href="<?php echo base_url('admin/confirmOrder/'.$list['tOrder_order_id']) ?>" class="orderConfirm btn btn-primary" order="<?php echo $list['tOrder_order_id'];?>" >Confirm</a>
                                                 </td>
                                                     <?php } else
                                                     {?>
                                                         <td><a style="pointer-events: none;" href="<?php echo base_url('confirmOrder/'.$list['tOrder_order_id']) ?>" class="orderConfirm btn btn-primary" order="<?php echo $list['tOrder_order_id'];?>" >Confirmed</a>
                                                 </td>
                                                     <?php }?>
                                                
                                                </tr>
                                                <div id="<?php echo $list['tOrder_order_id']; ?>" class="modal">
                                                  <span class="closee" id="<?php echo $list['tOrder_order_id']; ?>">&times;</span>
                                                  <img class="modal-content" src="<?php echo base_url('assets/').$list['tOrder_attachRecipt']; ?>" id="img01">
                                                  <div id="caption"></div>
                                                </div>
                                              
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
