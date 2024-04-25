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
                            <h1>Genrate Pay</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                      <!--   <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Pay</span>
                            </li>
                        </ul> -->

                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->

                        <div class="page-head">
                        <!--<label>Select Employee</label> 
                            </br>
                            <label>Select Dates</label>-->
                        </div>


                        <div class="page-content-inner">
                           <div class="search-bar bordered">
                                               <!--  <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <!-- <input type="text" class="form-control" placeholder="Search with Reference or Name or Contact Number" value="<?php echo $search;?>" id="searcher"> -->
                                                          <!--   <input type="text" class="form-control" placeholder="Search with Employee Name " value="" id="searcher">
                                                            
                                                            <span class="input-group-btn">
                                                                <button class="btn grey-cararra font-blue advanced" type="button">Advanced Search</button>
                                                            </span>
                                                        </div>
                                                    </div>                                                    
                                                </div> -->
                                                <!-- test -->

                                                 <div class="row" id="advanced1" >
                                                    <hr>

                                                     <div class="col-xs-12 col-md-6">
                                                        <label>Date:</label>
                                                        <div class="form-group">
                                                            <div class="input-group" >
                                                                <input type="text"  class="form-control" id="pay_search_dates">
                                                                <span class="input-group-btn">
                                                                    <button class="btn default">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <hr>
                                                     <div class="col-xs-12 col-md-12">
                                                        <label>Employee Name:</label>
                                                         <div class="form-group">
                                                             <Select name="Employee"  id="pay_search_employee"  class="form-control" list="EmployeeList" required="" autocomplete="off" >
                                                                <option value="-1">Select Employee</option>
                                                                    
                                                            </Select>
                                                        </div>
                                                    </div>
                                                    
                                                
                                                </div>
                                               <!-- test -->

                                            </div>
                            <div class="invoice-content-2">

                                    <div >
                                        <div class="sucloading " style="display: none;"> 
                                          <center>  <img src="<?php echo base_url('assets/layouts/layout3/img/suc.gif');?>" height="110px"></center>
                                        </div>
                                    </div>

                             <!--    <div class="row invoice-head">
                                    <div class="col-md-7 col-xs-6">
                                        <h1 class="uppercase"><img src="<?php echo base_url('inc/img/logo_slow.png');?>" width="48px">Australasian Security</h1>
                                        <!-- <h3>Patient Bill | <?php echo $appointment[0]['appointment_reference'];?></h3> -->
                                    <!-- </div> -->
                                    <!-- <div class="col-md-5 col-xs-6">
                                        <div class="company-address">
                                            <span class="bold uppercase">Australasian Security.</span>
                                            <br/>PO BOX 6693, Point Cook, Vic 3030,
                                            <br/>Australia, AU
                                            <br/>
                                            <span class="bold">Tel:</span> +61-450 605 050
                                            <br/>                                            
                                            <span class="bold">Email:</span> info@aus-security.com.au
                                            <br/>                                            
                                            <span class="bold">Website:</span> www.aus-security.com.au </div>
                                    </div>
                                </div> --> 
                                <!-- <div class="row invoice-cust-add">
                                    <div class="col-xs-3">
                                        <h2 class="invoice-title uppercase">Patient Ref#</h2>
                                        <p class="invoice-desc"><?php echo $appointment[0]['patient_reference'];?></p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="invoice-title uppercase">Patient</h2>
                                        <p class="invoice-desc"><?php echo $appointment[0]['patient_fname'].' '.$appointment[0]['patient_lname'];?><br/><?php echo $appointment[0]['patient_number'];?></p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="invoice-title uppercase">Doctor</h2>
                                        <p class="invoice-desc"><?php echo $appointment[0]['doctor_name'];?></p>
                                    </div>
                                     <div class="col-xs-3">
                                        <h2 class="invoice-title uppercase">Date &amp; Time</h2>
                                        <p class="invoice-desc"><?php echo $appointment[0]['appointment_date'].' | '.$appointment[0]['appointment_time'];?></p>
                                    </div>
                                </div> -->
                                <!-- <input type="hidden" id="app_id" value="<?php echo $appointment[0]['appointment_id'];?>"> -->
                              
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

                                             <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center"><h2 class="invoice-title uppercase">Total</h2></td>
                                                    <!-- <td class="text-right sbold" id="final_total">Rs. <?php echo $final = $total+$tax;?></td> -->
                                                    <td class="text-right bold" id="final_total">0 $</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                     <!-- <button class="btn btn-info pull-center" id="btn-discount">Genrate Pay</button> -->
                                        <button class="btn btn-info hidden-print" id="gen-pay">Genrate Pay</button>
                                        <!-- <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>  -->
                                        <!-- <a class="btn btn-lg uppercase hidden-print complete-btn pull-right">Update</a> -->
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