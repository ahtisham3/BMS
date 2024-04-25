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
                            <h1>Employee Pay View</h1>
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
                                <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Employee Pay View</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row" style="display: none;">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search with ref. number or name or contact number" autofocus>
                                                        <span class="input-group-btn">
                                                            <button class="btn green-soft uppercase bold" type="button">Search</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-content-2">
                                <div class="row invoice-head">
                                    <div class="col-md-7 col-xs-6">
                                        <h1 class="uppercase"><img src="<?php echo base_url('inc/img/logo.png');?>" width="48px">Australasian Security</h1>
                                        <!-- <h3>Patient Bill | <?php echo $appointment[0]['appointment_reference'];?></h3> -->
                                    </div>
                                    <div class="col-md-5 col-xs-6">
                                        <div class="company-address">
                                            <span class="bold uppercase">Australasian Security.</span>
                                            <br/>PO BOX 6693, Point Cook,
                                            <br/>Vic 3030 
                                            <br/>Australia, AU
                                            <br/>
                                            <span class="bold">Tel:</span> +61-450 605 050
                                            <br/>                                            
                                            <span class="bold">Website:</span> www.aus-security.com.au</div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row invoice-cust-add">
                                  <!--   <div class="col-xs-3">
                                        <h2 class="invoice-title ">Employee Pay #</h2>
                                        <p class="invoice-desc"><?php echo $Pay[0]['pay_Id'];?></p>
                                    </div> -->
                                    <div class="col-xs-5">
                                        <h2 class="invoice-title ">Employee Name</h2>
                                        <p class="invoice-desc"><?php echo $Pay[0]['EmployeeName'];?></p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="invoice-title ">BSB #</h2>
                                        <p class="invoice-desc"><?php echo $EmpDet[0]['bsb'];?></p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="invoice-title ">ACC #</h2>
                                        <p class="invoice-desc"><?php echo $EmpDet[0]['acc'];?></p>
                                    </div>

                                   <!--  <div class="col-xs-3">
                                        <h2 class="invoice-title ">Start</h2>
                                        <p class="invoice-desc"><?php echo $Pay[0]['DateStart'];?></p>
                                    </div>
                                     <div class="col-xs-3">
                                        <h2 class="invoice-title ">End</h2>
                                        <p class="invoice-desc"><?php echo $Pay[0]['DateEnd'];?></p>
                                    </div> -->
                                </div>
                                <!-- <input type="hidden" id="app_id" value="<?php echo $appointment[0]['appointment_id'];?>"> -->

                                <hr>
                                <div class="row invoice-body">
                                    <div class="col-xs-12 table-responsive">
                                        <table class="table">
                                            <thead>

                                                <tr>
                                                    <th class="invoice-title uppercase"></th>
                                                    <th class="invoice-title uppercase" width="30%">Worked Day</th>
                                                    <th class="invoice-title uppercase" width="20%">Worked Site</th>
                                                    <th class="invoice-title uppercase text-center">Worked Hour(s)</th>
                                                    <th class="invoice-title uppercase text-center">Rate</th>
                                                    <th class="invoice-title uppercase text-right" width="20%">Total</th>
                                                </tr>
                                            
                                            </thead>

                                            <tbody class="lastbill"> 
                
                                                 <?php  $Total = 0 ;  foreach($PayDetails as $PayDetail) {?>

                                                <tr id="row_pro_<?php echo $PayDetail['Job_Id'];?>">
                                                   <td></td>
                                                 
                                                   <td class="sbold"><span id="WorkedDay"><?php echo $PayDetail['WorkingDay'];?></td>
                                                   <td class="text-Left sbold"><?php echo $PayDetail['Site_Name'];?></td>                                                      
                                                   <td class="text-center sbold"><?php echo $PayDetail['Hours'];?></td>                                                
                                                   <td class="text-center sbold"><?php echo $PayDetail['Rate'];?></td>
                                                   <td class="text-right sbold"><?php echo $PayDetail['Job_Total'];?> $</td>
                                                </tr>
                                                    <?php   $Total =  $Total +  $PayDetail['Job_Total'];  } ?>                                                
                                                   <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center"><h2 class="invoice-title uppercase">Total</h2></td>
                                                 
                                                    <td></td>
                                                    <td class="text-right sbold" id="final_total"> <?php echo $Total;?> .$  </td>
                                               
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">                                        
                                        <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                                    </div>

                                    <div class="col-xs-12">                                        
                                      <button name="create_excel" id="create_excel" class="btn btn-success hidden-print">Create Excel File</button>  
                                    </div>
                                    
                                </div>
                                <div>
                                    <span class="text-center small-text pull-right"><small>Generated By Soft Code Labs</small></span>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>