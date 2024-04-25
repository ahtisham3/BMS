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
                                <a href="<?php echo base_url('getappartmentdetails'); ?>">Appartment</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Create Appartment</span>
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
                                                <form action="<?php echo base_url('updateappartment/'.$data->appartment_TableId);?>" class="form-horizontal form-bordered" method="POST">

                                                    <div class="form-body">

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Appartment Name :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="appartment_Name" class="form-control" name="appartment_Name" value="<?php echo $data->appartment_Name; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Building Appartment :</label>
                                                            <div class="col-md-9">
                                                                <select id="building_Table" class="form-control" name="building_Table" required data-parsley-trigger="change">
                                                                    <option value="">Choose...</option>
                                                                    <?php foreach ($building_table as $row) : ?>
                                                                        <option value="<?php echo $row->building_Id; ?>" <?php echo set_select('building_table', $row->building_Id, ($row->building_Id == $data->building_Id)); ?>>
                                                                            <?php echo $row->building_Name; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Floor Appartment :</label>
                                                            <div class="col-md-9">
                                                                <select id="floor_table" class="form-control" name="floor_table" required data-parsley-trigger="change">
                                                                    <option value="">Choose...</option>
                                                                    <?php foreach ($floor_table as $row) : ?>
                                                                        <option value="<?php echo $row->floor_Id; ?>" <?php echo set_select('floor_Type', $row->floor_Id, ($row->floor_Id == $data->floor_Id)); ?>>
                                                                            <?php echo $row->floor_Name; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Appartment Type:</label>
                                                            <div class="col-md-9">
                                                                <select id="appartment_Type" class="form-control" name="appartment_Type" required data-parsley-trigger="change">
                                                                    <option value="">Choose...</option>
                                                                    <?php foreach ($appartment_Type as $row) : ?>
                                                                        <option value="<?php echo $row->appartment_TypeId; ?>" <?php echo set_select('appartment_Type', $row->appartment_TypeId, ($row->appartment_TypeId == $data->appartment_Type)); ?>>
                                                                            <?php echo $row->appartment_TypeName; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Appartment Description:</label>
                                                            <div class="col-md-9"> <!-- Adjusted column width -->
                                                                <div id="appartmentdetails" class="row"> <!-- Added class "row" to create a row -->
                                                                    <div class="col-md-3 text-center"> <!-- Centered column -->
                                                                        <h5 id="totalappartments"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                    <div class="col-md-3 text-center"> <!-- Centered column -->
                                                                        <h5 id="appartmentscreated"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                    <div class="col-md-3 text-center"> <!-- Centered column -->
                                                                        <h5 id="appartmentsRemaing"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                    <div class="col-md-9"> <!-- Adjusted column width -->
                                                                        <h5 id="message"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Appartment Price:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="appartment_Price" class="form-control" name="appartment_Price" value="<?php echo $data->appartment_Price; ?>">
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Electricity Bill Number:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="elcMeterNumeber" class="form-control" required data-parsley-trigger="change" data-parsley-type="number" name="elcMeterNumeber" value="<?php echo $data->elcMeterNumeber; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Gas Meter Numebr:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="gasMeterNumber" class="form-control" required data-parsley-trigger="change" data-parsley-type="number" name="gasMeterNumber" value="<?php echo $data->gasMeterNumber; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Water Connection Number:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="waterConnectionNumber" class="form-control" required data-parsley-trigger="change" data-parsley-type="number" name="waterConnectionNumber" value="<?php echo  $data->waterConnectionNumber; ?>">
                                                            </div>
                                                        </div>




                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Appartment Status</i>:</label>
                                                            <div class="col-md-9">
                                                                <div class="form-check">

                                                                    <input class="form-check-input" type="radio" name="appartment_Status" id="active" value="1" <?php echo set_radio('appartment_Status', '1', ($data->appartment_Status == 1)); ?>>
                                                                    <label class="form-check-label" for="active">Appartment Active</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="appartment_Status" id="deactive" value="0" <?php echo set_radio('appartment_Status', '0', ($data->appartment_Status == 0)); ?>>
                                                                    <label class="form-check-label" for="deactive">Appartment Deactive</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" id="floor_Building_hide">Add Appartment</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>  -->
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

                        $.each(res, function(index, floor) {
                            floor_table.append('<option value="' + floor['floor_Id'] + '">' + floor['floor_Name'] + '</option>');
                        });
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



            // $.ajax({
            //     url: '<?php echo base_url('Appartment/AppartmentController/getFloorData'); ?>',
            //     method: 'POST',
            //     dataType: 'json',
            //     data: {buildingId: buildingId},
            //     success: function(response) {
            //         if(response){
            //             var totalfloor = $('#totalfloor');
            //             totalfloor.empty();
            //             var floorused= $('#FloorUsed');
            //             floorused.empty();
            //             var remaingfloor= $('#RemaingFloor');
            //              remaingfloor.empty();
            //         console.log(response);
            //         $('#floordetail').show();
            //         jQuery.each( response, function( i, val ) {
            //             totalfloor=val['building_Floors'];
            //             floorused=val['floor_used'];
            //             remaingfloor=val['remaining_floors'];
            //         });
            //         $('#totalfloor').append('Total floor: ' + totalfloor);
            //         $('#FloorUsed').append('Floor Created'+ floorused);
            //         $('#RemaingFloor').append('Floor Remaing'+ remaingfloor);
            //     }
            //     else 
            //     {
            //         $('#floordetail').hide();
            //     }
            //         // Assuming 'total_floor' is the key containing the total floor value in your response
            //     },
            //     error: function(xhr, status, error) {
            //         console.error(xhr.responseText);
            //     }
            // });
        });

        $('#floor_table').change(function() {
            var floor_id = $(this).val();
            console.log(floor_id);
            $.ajax({
                url: '<?php echo base_url('Appartments/AppartmentsController/getAppartmentsData'); ?>/' + floor_id,
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response) {

                        console.log(response);

                        // Clear previous data before appending new data
                        $('#totalappartments').empty();
                        $('#appartmentscreated').empty();
                        $('#appartmentsRemaing').empty();
                        $('#message').empty();
                        $('#appartmentdetails').show();
                        // Iterate over the response and append data to respective elements
                        $.each(response, function(index, val) {
                            $('#totalappartments').append('Total Appartments: ' + val['total_Appartments'] + '<br>');
                            $('#appartmentscreated').append('Appartment Created: ' + val['created'] + '<br>');
                            $('#appartmentsRemaing').append('Appartment Remaining: ' + val['remaining_Appartments'] + '<br>');
                        });

                        // Show message if needed
                        if ($('#totalappartments').text() === $('#appartmentscreated').text()) {
                            $('#message').append('No appartmet available.');

                        }
                    } else {
                        $('#appartmentdetails').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    });
</script>