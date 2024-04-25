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
                            <h1>New Appartment
                                <small>Add new Appartment</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo base_url('createappartment'); ?>" class="btn btn-primary">
                                    Add Appartment
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
                                <span>Appartment</span>
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
                                                <span class="caption-subject bold uppercase"> Appartment Details</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="row">
                                            
                                                <div class="col-md-6">

                                                    <label class="control-label col-md-3">Select Building</label>
                                                    <div class="col-md-7">
                                                        <select id="building_Table" class="form-control" name="building_dropdown" required data-parsley-trigger="change">
                                                            <option value="">Select Building...</option>
                                                            <?php foreach ($buildingDetail as $building) : ?>
                                                                <option value="<?php echo $building->building_Id; ?>"><?php echo $building->building_Name; ?></option>

                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                            <div class="col-md-6">
                                                <label class="control-label col-md-3">Select Floor</label>
                                                <div class="col-md-7">
                                                    <select id="floor_table" class="form-control" name="floor_table" required data-parsley-trigger="change">
                                                        <option value="">Choose Floor ...</option>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <span class="caption-subject bold uppercase"></span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <span class="caption-subject bold uppercase">Import Details</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>

                                        <!-- Add this div -->
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id='sample_1'>
                                                        <thead>
                                        <tr>
                                            <th>Appartment Name</th>
                                            <th>Building Name</th>
                                            <th>Floor Name</th>
                                            <th>Apartment Price</th>
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
<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> -->
<!-- <script>
    $(document).ready(function() {
        $('#').DataTable();
    });
</script> -->
<script>
    $(document).ready(function() {
        $('#building_Table').change(function() {
            var buildingId = $(this).val();
            console.log(buildingId);
            // console.log(buildingId);
            $.ajax({
                url: '<?php echo base_url('Appartments/AppartmentsController/getFloorData'); ?>/' + buildingId,
                method: 'get',
                dataType: 'json',
                success: function(res) {
                    var floor_table = $('#floor_table');
                    floor_table.empty();
                    if (res) {
                        floor_table.append('<option value="">Choose Floor</option>');
                        $.each(res, function(index, floor) {
                            floor_table.append('<option value="' + floor['floor_Id'] + '">' + floor['floor_Name'] + '</option>');

                        });
                        if (res.length === 1) {
                            floor_table.trigger('change');
                        }
                    } else {
                        $('#floor_table').empty();
                        $('#floor_table').append('<option value="" disabled selected>Data not available </option>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#floor_table').empty();
                    $('#floor_table').append('<option value="" disabled selected>Data not available </option>');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
       
        var dataTable = $('#sample_1').DataTable();
        $('#floor_table').change(function() {
            dataTable.clear();
            $('#mytable').html('');
            var floor_Id = $(this).val();
            console.log(floor_Id);
            if (floor_Id) {
                // Make AJAX request to fetch floor details
                $.ajax({
                    url: '<?php echo base_url('Appartments/AppartmentsController/getAppartmentDetailByFloor'); ?>/' + floor_Id,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        var table_rows = '';
                        jQuery.each(response, function(i, val) {
                            table_rows += '<tr>';
                            table_rows += '<td>' + val["appartment_Name"] + '</td>';
                            table_rows += '<td>' + val["building_Name"] + '</td>';
                            table_rows += '<td>' + val["floor_Name"] + '</td>';
                            table_rows += '<td>' + val["appartment_Price"] + '</td>';
                            if (val["appartment_Status"] == 0) {
                                table_rows += '<td><button class="btn btn-danger" disabled ><i class="fas fa-thumbs-up"></i> In Used</button></td>';
                            } else {
                                table_rows += '<td><button class="btn btn-primary"><i class="fas fa-thumbs-down"></i> Available</button></td>';
                            }
                            table_rows += '<td><a href="<?php echo base_url('editappartment/') ?>' + val["appartment_TableId"] + '"><i class="fa fa-edit" aria-hidden="true"></i></a></td>';
                            table_rows += '<td><a href="<?php echo base_url('deleteappartment/') ?>' + val["appartment_TableId"] + '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
                            table_rows += '</tr>';
                        });
                        $('#mytable').append(table_rows);
                        dataTable.rows.add($('#mytable').find('tr')).draw();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // Hide the table if no building is selected
                $('#floor_table_container').hide();

            }
        });
    });
</script>