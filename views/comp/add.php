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
                            <h1>Add Expense</h1>
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
                                <a href="<?php echo base_url('reps'); ?>">Reports</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url('expense'); ?>">Expense Report</a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Add expense</span>
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
                                                <form action="<?php echo base_url('new-expense'); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Utility Type:</label>
                                                            <div class="col-md-9">
                                                                <select name="UtilityType" class="form-control" list="UtilityList" autocomplete="off" id="UtilityType" required>
                                                                    <option value="1">
                                                                        Rent
                                                                    </option>
                                                                    <option value="2">
                                                                        Electricity
                                                                    </option>
                                                                    <option value="3">
                                                                        Gas
                                                                    </option>
                                                                    <option value="4">
                                                                        Internet
                                                                    </option>
                                                                </select> </div>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label class="control-label col-md-3">Utility Name:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="name" class="form-control" placeholder="Enter the item name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Expense Month & year:</label>
                                                            <div class="col-md-9">
                                                                <input type="month" name="monthdate" class="form-control" placeholder="Enter the date of purchase">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Utility Expense Cost <i>(in PKR)</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="cost" class="form-control" placeholder="Enter the cost of item">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Date Paid:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="paiddate" class="form-control date-picker" placeholder="Enter the date of purchase">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Add Expense</button>
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