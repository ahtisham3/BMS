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
                            <h1>Add Utility Bills
                                <small>All Bills</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        
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
                                <span>Add Utility Bills</span>
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
                                                <span class="caption-subject bold uppercase"></span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-title content-centre">
                                            <label class="control-label col-md-2">Select Building</label>
                                            <div class="col-md-9">
                                                <select id="building_Table" class="form-control">
                                                    <option value="">select builing </option>
                                                    <?php foreach ($buildingDetail as $details) { ?>
                                                        <option value="<?php echo $details->building_Id; ?>">
                                                            <?php echo $details->building_Name; ?>
                                                        </option>
                                                    <?php } ?>
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
                                                    <th> Name</th>
                                                    <th>Building Name</th>
                                                    <th>Floor Name</th>
                                                    <th>Apartment Name</th>
                                                    <th>Payable Amount</th>
                                                    <th>Payment Status</th>

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
        $('#building_Table').change(function() {
            $('#mytable').html('');
            dataTable.clear();
            var buildingId = $(this).val();
          
            console.log(buildingId);
            $.ajax({
                url: '<?php echo base_url('customerByBuilding'); ?>/' + buildingId,
                method: 'get',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                   
                    var table_row = "";
                    if (res.length > 0) {
                       
                        $.each(res, (i, val) => {
                            table_row += '<tr>';
                            table_row += '<td>' + val.customer_FirstName + ' ' + val.customer_LastName + '</td>';
                            table_row += '<td>' + val.building_Name + '</td>';
                            table_row += '<td>' + val.floor_Name + '</td>';
                            table_row += '<td>' + val.appartment_Name + '</td>';
                            table_row += '<td>' + val.customer_TotalAmonut + '</td>';
                            if (val.payment_Status == 1) {
                                table_row += '<td> <button class="btn btn-primary"> Paid  </button></td>';
                            } else {
                                table_row += '<td> <a href="<?php echo base_url('AddUtilities/'); ?>' + val['user_Id'] +'/'+ val['billing_Id'] + '"><button class="btn btn-danger"> Add Utilities Bills  </button></a></td>';
                            }
                            table_row += '</tr>';
                        });
                        $('#mytable').append(table_row);
                        dataTable.rows.add($('#mytable').find('tr')).draw();
                        // This line initializes DataTables on your table
                    } else {
                        console.log("No building selected");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('erroro', error);
                }
            });
        });
    });
</script>


<!--  -->