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
                            <h1>Edit Expense</h1>
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
                                <a href="<?php echo base_url('reports'); ?>">Reports</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url('expense'); ?>">Expense Report</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Edit expense</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet light form-fit ">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url('update-expense'); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" value="<?php echo $expense[0]['expense_id'] ?>">
                                                            <label class="control-label col-md-3">Name:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="name" class="form-control" placeholder="Enter the item name" value="<?php echo $expense[0]['expense_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Item Cost <i>(in PKR)</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="cost" class="form-control" placeholder="Enter the cost of item" value="<?php echo $expense[0]['expense_cost'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Date Purchased:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="date" class="form-control date-picker" placeholder="Enter the date of purchase" value="<?php echo $expense[0]['expense_date'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Update purchase</button>
                                                        <a href="<?php echo base_url('delete-expense/') . $expense[0]['expense_id']; ?>"><button class="btn btn-danger pull-left" type="button">Delete purchase</button></a>
                                                    </div>
                                                </form>
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
</div>