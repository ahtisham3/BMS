           
          <style>
            .notification-link::after {
    content: attr(data-count);
    position: absolute;
    top: 5px;
    right: 20px;
    background: #345283;
    color: white;
    border-radius: 18%;
    padding: 3px;
    font-size: 17px;
}
.notification-pendingbill-link::after{
    content: attr(data-count);
    position: absolute;
    top: 5px;
    right: 20px;
    background: #345283;
    color: white;
    border-radius: 18%;
    padding: 3px;
    font-size: 17px;

}

          </style>
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
                                        <!-- <?php print_r($user); ?> -->
                                        <h1>Dashboard</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <?php //echo $user[0]['expiry'];
                            $datetime1 = strtotime(date('Y-m-d'));
                            $date2= strtotime($user[0]['expiry']);
                            $calculate_seconds= $date2 - $datetime1;
                            $days = floor($calculate_seconds / (24 * 60 * 60 ));
                            if($days<0)
                            { ?>
                                <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="portlet-body">
                                            <div class="row text-center">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="tiles">
                                                        <h3>Data</h3>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-4">
                                                                <!-- <a href="<?php echo base_url('Employees'); ?>"> -->
                                                                <div class="tile bg-dark">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                    <div class="tile-object">
                                                                        <div class="name"> Employees </div>
                                                                        <!-- <div class="number"> <?php echo $total_doctors; ?> </div> -->
                                                                    </div>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-12 col-md-8">
                                                                <a href="<?php echo base_url('createbuildingdetail'); ?> " style="pointer-events: none">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-users"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="text-center"> Building </div>
                                                                            <div class="number"> <?php echo $total_Items; ?> </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-12 col-md-8">
                                                                <a href="<?php echo base_url('Items'); ?> " style="pointer-events: none">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-users"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="text-center"> Building </div>
                                                                            <div class="number"> <?php echo $total_Items; ?> </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!-- <div class="col-sm-12 col-md-4">
                                                                <a href="<?php echo base_url('sites'); ?>">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="name">Sites</div> -->
                                                            <!-- <div class="number"> <?php echo $total_patients; ?> </div> -->
                                                            <!-- </div>
                                                                    </div>
                                                                </a>
                                                            </div> -->


                                                            <div class="col-sm-12 col-md-4">
                                                                <!-- <a href="<?php echo base_url('Expiry'); ?>"> -->
                                                                <div class="tile bg-dark">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-history"></i>
                                                                    </div>
                                                                    <div class="tile-object">
                                                                        <div class="name">Expiry</div>
                                                                        <!-- <div class="number"> <?php echo $total_patients; ?> </div> -->
                                                                    </div>
                                                                </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-8 col-md-8">
                                                                <a href="<?php echo base_url('add-expense'); ?>" style="pointer-events: none">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Expense</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                                <div class="col-sm-12 col-md-4">
                                                                <a href="<?php echo base_url('upgradePackage'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-credit-card"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="name"> Upgrade Your Package </div>
                                                                            <!-- <div class="number"> <?php echo $total_doctors; ?> </div> -->
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4">
                                                                <a href="<?php echo base_url('company'); ?> " style="pointer-events: none">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-building-o"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="name"> Business Info </div>
                                                                            <!-- <div class="number"> <?php echo $total_doctors; ?> </div> -->
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <!-- <div class="col-sm-8 col-md-8">
                                                                <a href="<?php echo base_url('calender'); ?>">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Roster</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div> -->
                                                            <div class="col-sm-12 col-md-12">

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="tiles">
                                                        <h3>Finance</h3>
                                                        <div class="col-sm-12 col-md-12">
                                                            <a href="<?php echo base_url('new-sale'); ?>" style="pointer-events: none">
                                                                <div class="tile bg-dark">
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-calendar-plus-o"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Sales</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('sales'); ?>" style="pointer-events: none">
                                                                <div class="tile bg-dark">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Sales Today</h4>
                                                                    </div>
                                                                    <div class="tile-object">
                                                                        <div class="number"> <?php echo $total_Sales_today; ?> </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <!-- <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('financials'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Financial</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                         -->
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('financials'); ?>" style="pointer-events: none">
                                                                <div class="tile bg-dark">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Sales Dashboard</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('reps'); ?>" style="pointer-events: none">
                                                                <div class="tile bg-dark">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Reports</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!-- <div class="col-sm-12 col-md-6">
                                                                <a href="<?php echo base_url('reports'); ?>">
                                                                    <div class="tile bg-green-meadow">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Reports</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                        </div>       -->
                                                        <!-- <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('search-bill'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Billing</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                                            

                                                                        <?php }
                            else{

                             
                             ?>
                           
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="portlet-body">
                                            <div class="row text-center">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="tiles">
                                                        <h3>Data</h3>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-4">
                                                                <!-- <a href="<?php echo base_url('Employees'); ?>"> -->
                                                                <div class="tile bg-blue-steel">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-users"></i>
                                                                    </div>
                                                                    <div class="tile-object">
                                                                        <div class="name"> Employees </div>
                                                                        <!-- <div class="number"> <?php echo $total_doctors; ?> </div> -->
                                                                    </div>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-12 col-md-8">
                                                                <a href="<?php echo base_url('getbuildingdetails'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-building"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="text-center"> Building </div>
                                                                            <!-- <div class="number"> <?php echo $total_Items; ?> </div> -->
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <!-- <div class="col-sm-12 col-md-8">
                                                                <a href="<?php echo base_url('createbuildingdetail'); ?> " style="pointer-events: none">
                                                                    <div class="tile bg-dark">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-users"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="text-center"> Building </div>
                                                                            <div class="number"> <?php echo $total_Items; ?> </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div> -->


                                                            <!-- <div class="col-sm-12 col-md-4">
                                                                <a href="<?php echo base_url('sites'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="name">Sites</div> -->
                                                            <!-- <div class="number"> <?php echo $total_patients; ?> </div> -->
                                                            <!-- </div>
                                                                    </div>
                                                                </a>
                                                            </div> -->


                                                            <div class="col-sm-12 col-md-4">
                                                                <!-- <a href="<?php echo base_url('Expiry'); ?>"> -->
                                                                <div class="tile bg-red-intense">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-history"></i>
                                                                    </div>
                                                                    <div class="tile-object">
                                                                        <div class="name">Expiry</div>
                                                                        <!-- <div class="number"> <?php echo $total_patients; ?> </div> -->
                                                                    </div>
                                                                </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-8 col-md-4">
                                                                <a href="<?php echo base_url('getfloordetails'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-list" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Floor</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-4 col-md-4">
                                                                <a href="<?php echo base_url('getappartmentdetails'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-home" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Appartment/Shops</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-12 col-md-12">
                                                                <a href="<?php echo base_url('getservicedetails'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                        <i class="fa fa-wrench" aria-hidden="true" style="display: inline-block; animation: rotate 2s linear forwards;"></i>
                                                                        <style>
                                                                            @keyframes rotate {
                                                                                0% {
                                                                                    transform: rotate(0deg);
                                                                                }
                                                                                100% {
                                                                                    transform: rotate(360deg);
                                                                                }
                                                                            }
                                                                        </style>   
                                                                        <br>
                                                                            <h4 class="text-center">Service</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-12 col-md-8">
                                                                <a href="<?php echo base_url('company'); ?>">
                                                                    <div class="tile bg-red-intense">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-building-o"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="name"> Business Info </div>
                                                                            <!-- <div class="number"> <?php echo $total_doctors; ?> </div> -->
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            
                                                            <div class="col-sm-12 col-md-4">
                                                                <a href="<?php echo base_url('upgradePackage'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-credit-card"></i>
                                                                        </div>
                                                                        <div class="tile-object">
                                                                            <div class="name"> Upgrade Your Package </div>
                                                                            <!-- <div class="number"> <?php echo $total_doctors; ?> </div> -->
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!-- <div class="col-sm-8 col-md-8">
                                                                <a href="<?php echo base_url('calender'); ?>">
                                                                    <div class="tile bg-blue-steel">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Roster</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div> -->
                                                            <div class="col-sm-12 col-md-12">

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="tiles">
                                                        <h3>Finance</h3>
                                                        <div class="col-sm-12 col-md-12">
                                                            <a href="<?php echo base_url('getcustomerdetails'); ?>">
                                                                <div class="tile bg-blue-steel">
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-calendar-plus-o"></i>
                                                                        <br>
                                                                        <h4 class="text-center"> Customer</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                       

                                                        <div class="col-sm-12 col-md-12">
                                                           
                                                        <a href="<?php echo base_url('finalizebill'); ?>" class="notification-link" data-count="<?php echo $count->{'count(ca.user_Id)'}; ?>">
                                                                <div class="tile bg-red-intense" >
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-calendar-plus-o"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Finalize Bill</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <a href="<?php echo base_url('getbillingreportdetails'); ?>" class="notification-pendingbill-link" data-count="<?php echo $pendingbills->{'count(ca.user_Id)'}; ?>">
                                                                <div class="tile bg-red-intense">
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-calendar-plus-o"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Pending  Bill</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <!-- <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('sales'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Sales Today</h4>
                                                                    </div>
                                                                    <div class="tile-object">
                                                                        <div class="number"> <?php echo $total_Sales_today; ?> </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div> -->

                                                        <!-- <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('financials'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Financial</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                         -->
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('financials'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center"> Dashboard</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('reps'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Reports</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!-- <div class="col-sm-12 col-md-6">
                                                                <a href="<?php echo base_url('reports'); ?>">
                                                                    <div class="tile bg-green-meadow">
                                                                        <div class="corner"> </div>
                                                                        <div class="tile-body">
                                                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                                            <br>
                                                                            <h4 class="text-center">Reports</h4>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                        </div>       -->
                                                        <!-- <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url('search-bill'); ?>">
                                                                <div class="tile bg-green-meadow">
                                                                    <div class="corner"> </div>
                                                                    <div class="tile-body">
                                                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                                                        <br>
                                                                        <h4 class="text-center">Billing</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                        <?php } ?>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>

              <?php if($user[0]['Subscription_type']==="Trial" && $days>0){
            ?>
            <div style="position: fixed;top: 70px;right: 0;"><img src="<?php echo base_url('inc/img/badge.png'); ?>"></div>
        <?php } else if($days<0)
        {?>
            <div style="position: fixed;top: 70px;right: 0;"><img src="<?php echo base_url('inc/img/expired.png'); ?>"></div>
        <?php } ?>
        
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JavaScript to display popup message -->
<!-- <script>
$(document).ready(function(){
    // Check if the session variable containing the error message is present
    var errorMessage = '<?php echo $this->session->userdata("error_message"); ?>';
    
    // If error message exists, display popup message
    if (errorMessage) {
        alert('Error: ' + errorMessage);
    }
});
</script> -->
