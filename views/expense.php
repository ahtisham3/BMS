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
                            <h1>Expenses Report
                                <small>You can view expenses here.</small>
                            </h1>
                        </div>
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo base_url('add-expense'); ?>" class="btn btn-primary">
                                    Add Expense
                                </a>
                            </div>
                            <!-- END THEME PANEL -->
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
                            <!-- <li>
                                <a href="<?php echo base_url('reports'); ?>">Reports</a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Expenses Report</span>
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
                                                <span class="caption-subject bold uppercase">Expenses</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th class="all">S.No</th>
                                                        <th class="all">Type</th>
                                                        <th class="all">Name</th>
                                                        <th class="all">Cost</th>
                                                        <th class="all">Month</th>
                                                        <th class="all">Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $e = 0;
                                                    foreach ($expenses as $expense) { ?>
                                                        <tr>
                                                            <td><?php echo $e = $e + 1; ?></td>
                                                            <td><?php if ($expense['expense_utility_type'] == 1) {
                                                                    echo "Rent";
                                                                }
                                                                if ($expense['expense_utility_type'] == 2) {
                                                                    echo "Electricity";
                                                                }
                                                                if ($expense['expense_utility_type'] == 3) {
                                                                    echo "Gas";
                                                                }
                                                                if ($expense['expense_utility_type'] == 4) {
                                                                    echo "Internet";
                                                                }
                                                                ?></td>
                                                            <td><?php echo $expense['expense_name']; ?></td>
                                                            <!-- <td><a href="<?php echo base_url('edit-expense/') . $expense['expense_id']; ?>"><?php echo $expense['expense_name']; ?></a></td> -->

                                                            <td><?php echo $expense['expense_amount']; ?></td>
                                                            <td><?php

                                                                $dt = DateTime::createFromFormat('!m', $expense['expense_month']);
                                                                echo $dt->format('F'); ?></td>
                                                            <td><?php echo $expense['expense_year']; ?></td>
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