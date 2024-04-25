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
                            <h1>Daily Job Report</h1>
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
                                <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
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
                                <div class="row" id="advanced1">
                                    <div class="col-xs-12 col-md-6">
                                        <label class="col-md-3 control-label">Date:</label>
                                        <div class="form-group">
                                            <div class="input-group input-medium date date-picker" data-date="01-09-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years">

                                                <input id="daily_job_report_date" type="text" class="form-control" readonly name="dob">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 
                                                    <div class="form-group col-md-12">
                                                            <label class="col-md-3 control-label">Date :</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                    <input type="text" class="form-control" readonly name="dob">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                    </div>
 -->
                                    <br>
                                    <br>

                                    <hr>



                                    <!--   <div class="col-xs-12 col-md-12">
                                                        <label>Client Name:</label>
                                                         <div class="form-group">
                                                             <Select name="Employee"  id="Client_report_search_client"  class="form-control" list="EmployeeList" required="" autocomplete="off" >
                                                                <option value="-1">Select Client</option>
                                                                    <?php foreach ($Clients as $client) { ?>
                                                                        <option value="<?php echo $client['C_Id']; ?>"><?php echo  $client['Name']; ?></option>
                                                                    <?php } ?>
                                                            </Select>
                                                        </div>
                                                    </div>  -->
                                </div>
                                <!-- test -->
                            </div>
                            <div class="invoice-content-2">

                                <div>
                                    <div class="sucloading " style="display: none;">
                                        <center> <img src="<?php echo base_url('assets/layouts/layout3/img/suc.gif'); ?>" height="110px"></center>
                                    </div>
                                </div>

                                <div class="row invoice-body">
                                    <div class="col-xs-12 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th class="invoice-title uppercase"></th>
                                                    <th class="invoice-title uppercase" width="20%">Customer Name</th>
                                                    <th class="invoice-title uppercase" width="20%">Sale Amount</th>
                                                    <th class="invoice-title uppercase" width="15%">Discount</th>
                                                    <th class="invoice-title uppercase text-right" width="20%">Total Recived</th>
                                                </tr>
                                            </thead>

                                            <tbody class="lastbill">

                                                <tr>
                                                    <td></td>
                                                    <td></td>

                                                    <td></td>
                                                    <td class="text-center">
                                                        <h2 class="invoice-title uppercase">Total</h2>
                                                    </td>
                                                    <!-- <td class="text-right sbold" id="final_total">Rs. <?php echo $final = $total + $tax; ?></td> -->
                                                    <td class="text-right bold" id="final_total">0 </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xs-12">
                                        <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                                    </div>
                                </div>


                                <div>
                                    <span class="text-center small-text pull-right"><small>Generated By Pak Sales Solution</small></span>
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