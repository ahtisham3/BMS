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
                            <h1> Launch Building
                                <small>Create New Building</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo base_url('createbuilding'); ?>" class="btn btn-primary">
                                    Create Building
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
                                <span>Building</span>
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
                                                <span class="caption-subject bold uppercase">Building Details</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th class="col-2">Building Name</th>
                                                        <th class="col-2">Location</th>
                                                        <th class="col-1">Floors</th>
                                                        <th class="col-1">Building Type</th>
                                                        <th class="col-1">Status</th>
                                                        <th class="col-1"> Expence</th>
                                                        <th class="col-1">Update</th>
                                                        <th class="col-1">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($data as $buildingdata) { ?>
                                                        <tr>
                                                            <td> <?php echo $buildingdata->building_Name; ?></td>
                                                            <td><?php echo $buildingdata->building_Location; ?></td>
                                                            <td><?php echo $buildingdata->building_Floors; ?></td>
                                                            <td><?php echo $buildingdata->Buildingtypename; ?></td>
                                                            <td>
                                                                <?php if ($buildingdata->building_Status == 1) : ?>
                                                                    <button class="btn btn-primary">
                                                                        <i class="fas fa-thumbs-up"></i> Active
                                                                    </button>
                                                                <?php else : ?>
                                                                    <button class="btn btn-danger">
                                                                        <i class="fas fa-thumbs-down"></i> No active
                                                                    </button>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <form action="<?php echo base_url('expencebuilding'); ?>" method="post">
                                                                    <input type="hidden" name="building_id" value="<?php echo $buildingdata->building_Id; ?>">
                                                                    <button type="submit" style="border: none; background: none; padding: 0; font: inherit; color: inherit;">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td><a href="<?php echo base_url('editbuilding/' . $buildingdata->building_Id) ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                                            <td><a href="<?php echo base_url('deletebuilding/' . $buildingdata->building_Id) ?>"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>


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

<div id="myModalprocedure" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close">&times;</a>
                <h3>Delete Procedure</h3>
            </div>
            <div class="modal-body">
                <p>You are about to delete this Item, this procedure is irreversible.</p>
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn danger" id="delete_item">Yes</a>
                <a href="#" data-dismiss="modal" class="btn secondary">No</a>
            </div>
        </div>

    </div>
</div>