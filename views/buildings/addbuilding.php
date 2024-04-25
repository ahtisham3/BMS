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
                            <h1>Add Building</h1>
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
                                <a href="<?php echo base_url('getbuildingdetails'); ?>">Building</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add Building</span>
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
                                                <form action="<?php echo base_url('createbuildingdetail'); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Building Name :</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="building_Name" class="form-control" name="building_Name" placeholder="Enter the Building name" required data-parsley-trigger="change" value="<?php set_value('building_Name');?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Building Location:</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="building_Location" class="form-control" name="building_Location" placeholder="Enter the Building Location" required data-parsley-trigger="change" value="<?php set_value('building_Location');?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Building Floor:</label>
                                                            <div class="col-md-9">
                                                            <input type="number" id="building_Floors" class="form-control" name="building_Floors" placeholder="Enter the Building Floor" required data-parsley-trigger="change" value="<?php set_value('building_Floors');?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Item Description :</label>
                                                            <div class="col-md-9">
                                                            <select id="building_Type" class="form-control" name="building_Type"  required data-parsley-trigger="change">
                                                            <option value="" >Choose the Building Type...</option>
                                                            <?php foreach ($data as $row): ?>
                                                                <option value="<?php echo $row->building_TypeId; ?>" <?php echo set_select('building_Type', $row->building_TypeId); ?>>
                                                                    <?php echo $row->building_TypeName; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Building Status</i>:</label>
                                                            <div class="col-md-9">
                                                            <div class="form-check">
                               
                                                            <input class="form-check-input" type="radio" name="building_Status" id="active" value="1" <?php echo set_radio('building_Status', '1', TRUE); ?>>
                                                            <label class="form-check-label" for="active">Building Active</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="building_Status" id="deactive" value="0" <?php echo set_radio('building_Status', '0'); ?>>
                                                            <label class="form-check-label" for="deactive">Building Deactive</label>
                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Add Item</button>
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