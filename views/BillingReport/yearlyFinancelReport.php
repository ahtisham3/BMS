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
                            <h1>Yearly Report</h1>
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
                                                    <th class="invoice-title uppercase" width="20%">Month</th>
                                                    <th class="invoice-title uppercase" width="20%">Total Sale</th>
                                                    <th class="invoice-title uppercase" width="20%">Total Discount</th>
                                                    <th class="invoice-title uppercase" width="15%">Total Expense</th>
                                                    <th class="invoice-title uppercase text-right" width="20%">Total Earning</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $count = 1;
                                                $totalEarning = 0;
                                                $yearlyEarning = 0;
                                                $yearlySale = 0;
                                                $yearlyExpense = 0;
                                                $yearlyDiscosunt = 0;
                                                $monthlysale = 0;
                                                $monthlyexpence = 0;
                                                $monthlydiscount = 0;

                                                // Iterate through each month
                                                foreach ($revenuReport as $revenueItem) {
                                                    $month = $revenueItem->mothwiserevenu;
                                                ?>
                                                    <tr>

                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $month; ?></td>


                                                        <?php
                                                        // Find matching expense for the month
                                                        $expenseItem = array_filter($expenceReport, function ($item) use ($month) {
                                                            return $item->month == $month;
                                                        });
                                                        ?>

                                                        <td>
                                                            <?php
                                                            $monthlysale = $revenueItem->total_Revenu;
                                                            echo $monthlysale;
                                                            $yearlySale += $monthlysale; ?>
                                                        </td>



                                                        <td><?php
                                                            $monthlydiscount = $revenueItem->totalDiscount;
                                                            echo $monthlydiscount;
                                                            $yearlyDiscosunt += $monthlydiscount; ?></td>
                                                        
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if (!empty($expenseItem)) {
                                                                $monthlyexpence = reset($expenseItem)->totalexpense;
                                                                echo $monthlyexpence;
                                                                $yearlyExpense += $monthlyexpence;
                                                            } else {
                                                                echo "N/A";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if (!empty($expenseItem)) {
                                                                $totalEarning = $revenueItem->total_Revenu - reset($expenseItem)->totalexpense - $revenueItem->totalDiscount;
                                                                echo $totalEarning;
                                                            } else {
                                                                echo "N/A";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $count++;
                                                    $yearlyEarning += $totalEarning;
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot style="text-align: center;">
                                                <tr>
                                                    <td></td>
                                                    <td>Total Month: <?php echo $count - 1; ?></td>
                                                    <td>Yearly Sale: <?php echo $yearlySale; ?></td>
                                                    <td>Yearly Discount: <?php echo $yearlyDiscosunt; ?></td>
                                                    <td>Yearly Expense: <?php echo $yearlyExpense; ?></td>
                                                    <td>Yearly Earning: <?php echo $yearlyEarning; ?></td>
                                                </tr>

                                            </tfoot>

                                        </table>

                                        <!-- </div> -->
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
</div>