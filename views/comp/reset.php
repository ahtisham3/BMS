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
                            <h1>Reset Password</h1>
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
                                <a href="<?php echo base_url('company'); ?>">Company Info</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Reset Password</span>
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
                                                <form action="<?php echo base_url('reset_do'); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <!-- <input type="hidden" name="id" value="<?php echo $company[0]['company_id'] ?>"> -->
                                                            <label class="control-label col-md-3">Old:</label>
                                                            <div class="col-md-9">
                                                                <input type="password" name="old" class="form-control" placeholder="Enter Old Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">New</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="password" name="new" class="form-control" placeholder="Enter new Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Confirm:</label>
                                                            <div class="col-md-9">
                                                                <input type="password" name="conf" class=" form-control" placeholder="Confirm Password">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Update Password</button>
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