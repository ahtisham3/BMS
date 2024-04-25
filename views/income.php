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
                            <h1>Income Reports
                                <small>You can view paid bills here.</small>
                            </h1>
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
                                <a href="<?php echo base_url('reports');?>">Reports</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Income Reports</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <span class="caption-subject bold uppercase">Patients</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th class="all">Reference No</th>
                                                        <th class="all">Date</th>          
                                                        <th class="all">Name</th>
                                                        <th class="all">Contact No.</th>
                                                        <th class="all">Doctor</th>
                                                        <th class="all">Bill</th>
                                                        <th class="all">Paid</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($bills as $bill) { ?>
                                                    <tr>
                                                        <td><?php echo $ref = $bill['appointment_reference'];?></td>
                                                        <td><?php echo $bill['bill_date'];?></td>
                                                        <td><a href="<?php echo base_url('patient-info/'.$bill['patient_reference'])?>"><?php echo $bill['patient_fname'].' '.$bill['patient_lname'];?></a></td>
                                                        <td><?php echo $bill['patient_number'];?></td>
                                                        <td><?php echo $bill['doctor_name'];?></td>
                                                        <td><?php echo $bill['bill_final'];?></td>
                                                        <td><?php echo $bill['bill_paid'];?></td>
                                                    </tr> 
                                                    <?php } ?>                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
    </div>
</div>