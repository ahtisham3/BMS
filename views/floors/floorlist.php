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
                            <h1>Create Floor
                                <small>Add new Floor</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo base_url('createfloor'); ?>" class="btn btn-primary">
                                    Add Floor
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
                                <span>Floor</span>
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
                                        <span class="caption-subject bold uppercase">Floors</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-title content-centre">
                                    <label class="control-label col-md-2 ">Select Building</label>
                                    <div class="col-md-9">
                                        <select id="building_dropdown" class="form-control" name="building_dropdown" required data-parsley-trigger="change">
                                            <option value="">Choose Building...</option>
                                            <?php foreach ($building_table as $building) : ?>
                                                <option value="<?php echo $building->building_Id; ?>"><?php echo $building->building_Name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Building Details</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>

                                <!-- Add this div -->
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id='sample_1'>
                                        <thead>
                                            <tr>
                                                <th>Floor Name</th>
                                                <th>Building</th>
                                                <th>Floor Type</th>
                                                <th>Total Appartments</th>
                                                <th>Status</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="mytable">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var dataTable = $('#sample_1').DataTable();
        $('#building_dropdown').change(function() {
            dataTable.clear();
            $('#mytable').html('');

            var building_id = $(this).val();
            if (building_id !== '') {
                // Make AJAX request to fetch floor details
                $.ajax({
                    url: '<?php echo base_url('Floor/FloorController/dynamicFloorDeatils'); ?>/' + building_id,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        var table_rows = '';

                        $.each(response, function(i, val) {
                            table_rows += '<tr>';
                            table_rows += '<td>' + val["floor_Name"] + '</td>';
                            table_rows += '<td>' + val["building_Name"] + '</td>';
                            table_rows += '<td>' + val["floor_TypeName"] + '</td>';
                            table_rows += '<td>' + val["total_Appartments"] + '</td>';
                            if (val["floor_Status"] == 1) {
                                table_rows += '<td><button class="btn btn-primary"><i class="fas fa-thumbs-up"></i> Active</button></td>';
                            } else {
                                table_rows += '<td><button class="btn btn-danger"><i class="fas fa-thumbs-down"></i> No active</button></td>';
                            }
                            table_rows += '<td><a href="<?php echo base_url('editfloor/') ?>' + encodeURIComponent(val["floor_Id"]) + '"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>';
                            table_rows += '<td><a href="<?php echo base_url('deletefloor/') ?>' + val["floor_Id"] + '"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>';
                            table_rows += '</tr>';
                        });
                        $('#mytable').append(table_rows);

                        dataTable.rows.add($('#mytable').find('tr')).draw();


                        // Update the table body with dynamic data

                        // Reinitialize DataTable with Buttons
                        // $('#tabledata').DataTable({
                        //     dom: 'Bfrtip',
                        //     buttons: [
                        //         'csv', 'pdf'
                        //     ]
                        // });
                        // // Destroy the existing DataTable and reinitialize with Buttons
                        // if ($.fn.DataTable.isDataTable('#tabledata')) {
                        //     // If DataTable is already initialized, destroy it first
                        //     $('#tabledata').DataTable().destroy();
                        // }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // Hide the table if no building is selected
                console.log("No building selected");
            }
        });
    });
</script>