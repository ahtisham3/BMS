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
                            <h1>Service list
                                <small>Add new Service</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo base_url('createservice'); ?>" class="btn btn-primary">
                                    Add Service
                                </a>
                            </div>
                            <!-- END THEME PANEL -->
                        </div>
                        <!-- END PAGE TOOLBAR -->
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
                                <span>Service</span>
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
                                                <span class="caption-subject bold uppercase">Service</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th class="col-3">Service Name</th>
                                                        <th class="col-3">Service Category</th>
                                                        <th class="col-2">Price</th>
                                                        <th class="col-1">Discountable</th>
                                                        <th class="col-1">Status</th>
                                                        <th class="col-1">Update</th>
                                                        <th class="col-1">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($service_table as $servicedata) { ?>
                                                        <tr>
                                                            <td> <?php echo $servicedata->service_Name; ?></td>
                                                            <td><?php echo $servicedata->Servicetypename; ?></td>
                                                            <td><?php echo $servicedata->service_Price; ?></td>
                                                            <td>
                                                                <?php if ($servicedata->service_Discountable == 1) : ?>
                                                                    <button class="btn btn-primary">
                                                                        <i class="fa fa-tags"></i>Yes
                                                                    </button>
                                                                <?php else : ?>
                                                                    <button class="btn btn-danger">
                                                                        <i class="fa fa-tags"></i> No
                                                                    </button>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($servicedata->service_Status == 1) : ?>
                                                                    <button class="btn btn-primary">
                                                                      
                                                                        <i class="fa fa-thumbs-up"> Active</i>

                                                                    </button>
                                                                <?php else : ?>
                                                                    <button class="btn btn-danger">
                                                                        <i class="fa fa-thumbs-down"></i> No active
                                                                    </button>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><a href="<?php echo base_url('editservice/' . $servicedata->service_id) ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                                            <td><a href="<?php echo base_url('deleteservice/' . $servicedata->service_id) ?>"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
