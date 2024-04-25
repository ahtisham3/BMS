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
                            <h1>Monthly Report</h1>
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
                                <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Report</span>
                            </li>
                        </ul>

                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-head">
                            <!--<label>Select Employee</label> 
                            </br>
                            <label>Select Dates</label>-->
                        </div>
                        <div class="page-content-inner">
                          
                            <div class="invoice-content-2">

                                <div>
                                    <div class="sucloading " style="display: none;">
                                        <center> <img src="<?php echo base_url('assets/layouts/layout3/img/suc.gif'); ?>" height="110px"></center>
                                    </div>
                                </div>

                                <div class="row invoice-body">
                                    <div class="col-xs-12 table-responsive">
                                        
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="customerhistory">
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
                                                <?php $count=1;
                                                    $totalAmont=0;
                                                    ?>
                                                    <?php foreach ($salesdata as $data) { ?>
                                                <tr>
                                                    <td><?php echo $count?></td>
                                                    <td> <?php echo $data->customer_FirstName?></td>
                                                    <td> <?php echo $data->customer_TotalAmonut?></td>

                                                    
                                                    <td class="text-center">
                                                        <h2 class="invoice-title uppercase"> <?php echo $data->discontAmont?></h2>
                                                    </td>

                                                    <td class="text-right bold" id="final_total"><?php echo $data->customer_TotalAmonut - $data->discontAmont?>
                                                         </td>
                                                </tr>
                                                <?php $count++;
                                                       $totalAmont +=($data->customer_TotalAmonut - $data->discontAmont);
                                                ?>
                                                <?php }?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td> 
                                                    <td></td>
                                                    <td></td>
                                                    <td >Total Payment:</td>
                                                    <td>   <?php echo $totalAmont?></td>
                                                   
                                                </tr>
                                                <!-- <tr>
                                                <td colspan="4" style="text-align: end;">Total expense:</td>
                                                <td> <?php echo $totalAmont?></td>
                                                </tr> -->
                                            </tfoot>
                                            
                                        </table>
                                       
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