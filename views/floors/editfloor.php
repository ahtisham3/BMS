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
                            <h1>Update Floor</h1>
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
                                <a href="<?php echo base_url('getfloordetails'); ?>">Floor</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Update Floor</span>
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
                                                <form action="<?php echo base_url('updatefloor/'.$data->floor_Id); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Floor Name :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="floor_Name" class="form-control" name="floor_Name" placeholder="Enter the Floor Code" required data-parsley-trigger="change" value="<?php echo $data->floor_Name;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Select Building :</label>
                                                            <div class="col-md-9">
                                                                <select id="floor_Building" class="form-control" name="floor_Building" required data-parsley-trigger="change">
                                                                    <option value="">Choose the Building...</option>
                                                                    <?php foreach ($building_table as $row) : ?>
                                                                        <option value="<?php echo $row->building_Id; ?>" <?php echo set_select('floor_Building', $row->building_Id, ($row->building_Id == $data->floor_Building)); ?>>
                                                                            <?php echo $row->building_Name; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Floor Type:</label>
                                                            <div class="col-md-9">
                                                                <select id="floor_Type" class="form-control" name="floor_Type" required data-parsley-trigger="change">
                                                                    <option value="">Choose Floor Type...</option>
                                                                    <?php foreach ($floor_Type as $row) : ?>
                                                                        <option value="<?php echo $row->floor_TypeId; ?>" <?php echo set_select('floor_Type', $row->floor_TypeId, ($row->floor_TypeId == $data->floor_Type)); ?>>
                                                                            <?php echo $row->floor_TypeName; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Floor Description:</label>
                                                            <div class="col-md-9"> <!-- Adjusted column width -->
                                                                <div id="floordetail" class="row"> <!-- Added class "row" to create a row -->
                                                                    <div class="col-md-3 text-center"> <!-- Centered column -->
                                                                        <h5 id="totalfloor"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                    <div class="col-md-3 text-center"> <!-- Centered column -->
                                                                        <h5 id="FloorUsed"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                    <div class="col-md-3 text-center"> <!-- Centered column -->
                                                                        <h5 id="RemaingFloor"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                    <div class="col-md-9"> <!-- Adjusted column width -->
                                                                        <h5 id="message"></h5> <!-- Removed unnecessary h5 tag -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  -->

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Total Appartment:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="total_Appartments" class="form-control" required data-parsley-trigger="change" name="total_Appartments" value="<?php echo $data->total_Appartments;?>">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Building Status</i>:</label>
                                                            <div class="col-md-9">
                                                                <div class="form-check">

                                                                    <input class="form-check-input" type="radio" name="floor_Status" id="active" value="1" <?php echo set_radio('floor_Status', '1',($data->floor_Status==1)); ?>>
                                                                    <label class="form-check-label" for="active">Floor Active</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="floor_Status" id="deactive" value="0" <?php echo set_radio('floor_Status', '0',($data->floor_Status==0)); ?>>
                                                                    <label class="form-check-label" for="deactive">Floor Deactive</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" id="floor_Building_hide">Update Floor</button>
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
        $('#floor_Building').change(function() {
            var buildingId = $(this).val();
            $.ajax({
                url: '<?php echo base_url('Floor/FloorController/getFloorData'); ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    buildingId: buildingId
                },
                success: function(response) {
                    if (response) {
                        var totalfloor = $('#totalfloor');
                        totalfloor.empty();
                        var floorused = $('#FloorUsed');
                        floorused.empty();
                        var remaingfloor = $('#RemaingFloor');
                        remaingfloor.empty();

                        // Clear the message when a new building is selected
                        $('#message').empty();

                        console.log(response);
                        $('#floordetail').show();
                        jQuery.each(response, function(i, val) {
                            totalfloor = val['building_Floors'];
                            floorused = val['floor_used'];
                            remaingfloor = val['remaining_floors'];
                        });

                        if (totalfloor != floorused) {
                            $('#totalfloor').append('Total floor: ' + totalfloor);
                            $('#FloorUsed').append('Floor Created' + floorused);
                            $('#RemaingFloor').append('Floor Remaining' + remaingfloor);
                        } else {
                            $('#message').text('All Floors Are Created ');

                        }


                    } else {
                        $('#floordetail').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>