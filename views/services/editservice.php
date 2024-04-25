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
                            <h1>Add Item</h1>
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
                                <a href="<?php echo base_url('getservicedetails'); ?>">Building</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add Service</span>
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
                                                <form action="<?php echo base_url('updateservice/'.$service_table->service_id); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Service Name :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="service_Name" class="form-control" name="service_Name" value="<?php echo $service_table->service_Name; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Service Description :</label>
                                                            <div class="col-md-9">
                                                                <select id="service_type" class="form-control" name="service_type">
                                                                    <option value="">Choose...</option>
                                                                    <?php foreach ($service_type as $row) : ?>
                                                                        <option value="<?php echo $row->service_TypeId; ?>" <?php echo set_select('service_type', $row->service_TypeId, ($row->service_TypeId == $service_table->service_CategoryType)); ?>>
                                                                            <?php echo $row->service_TypeName; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Service Price:</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="service_Price" class="form-control" name="service_Price" value="<?php echo $service_table->service_Price; ?>" />
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Service Status</i>:</label>
                                                                    <div class="col-md-7">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Service_Status" id="active" value="1" <?php echo set_radio('Service_Status', '1', TRUE); ?>>
                                                                            <label class="form-check-label" for="active">Building Active</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Service_Status" id="deactive" value="0" <?php echo set_radio('builService_Statusding_Status', '0'); ?>>
                                                                            <label class="form-check-label" for="deactive">Building Deactive</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Service Discountable</i>:</label>
                                                                    <div class="col-md-7">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="service_Discountable" id="active" value="1" <?php echo set_radio('service_Discountable', '1', TRUE); ?>>
                                                                            <label class="form-check-label" for="service_Discountable">No</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="service_Discountable" id="deactive" value="0" <?php echo set_radio('service_Discountable', '0'); ?>>
                                                                            <label class="form-check-label" for="service_Discountable">Yes</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Add Service</button>
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