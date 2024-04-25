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
                            <h1>Custome List
                                <small>Add New Customer</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo base_url('createcustomer'); ?>" class="btn btn-primary">
                                    Add Customer
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
                                <span>Customer</span>
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
                                                <span class="caption-subject bold uppercase">testign</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-title content-centre">
                                            <label class="control-label col-md-3">Select Building For Customer</label>
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
                                                <span class="caption-subject bold uppercase">Customer Details</span>
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
                                                   
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                    <th>History</th>
                                                    <th>Update Service</th>
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
            dataTable.clear();
            var buildingId = $(this).val();
            $('#mytable').html('');
            $.ajax({
                url: '<?php echo base_url('Customer/CustomerController/getCustomerByBuildingId'); ?>/' + buildingId,
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
                            // if (val.customer_Status == 1) {
                            //     table_row += '<td> <button class="btn btn-primary"> Active  </button></td>';
                            // } else {
                            //     table_row += '<td> <button class="btn btn-danger">Unactive   </button></td>';
                            // }
                            table_row += '<td><a href="<?php echo base_url('editcustomer/') ?>' + encodeURIComponent(val["customer_Id"]) + '"><i class="fa fa-edit" aria-hidden="true"></i></a></td>';
                            table_row += '<td><i class="fa fa-trash delete-btn" aria-hidden="true" data-id="' + val.customer_Id + '"></i></td>';
                            table_row += '<td><a href="<?php echo base_url('customerHistory/') ?>' + encodeURIComponent(val["customer_Id"]) + '"><i class="fa fa-history" aria-hidden="true"></i></a></td>';
                            table_row += '<td><a href="<?php echo base_url('editCustomerService/') ?>' + encodeURIComponent(val["customer_Id"]) + '"><i class="fa fa-history" aria-hidden="true"></i></a></td>';
                            table_row += '</tr>';
                        });
                        $('#mytable').append(table_row);
                        dataTable.rows.add($('#mytable').find('tr')).draw();
                    } else {
                        $('#customer_DetailTableContainer').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.log('erroro', error);
                }
            });
        });
        // Handle delete button click
        $(document).on('click', '.delete-btn', function() {
            console.log('Delete button clicked');
            var customerId = $(this).data('id');
            console.log(customerId,'Delete button clicked');
            // Perform AJAX request to check user dues
            $.ajax({
                url: '<?php echo base_url('Customer/CustomerController/checkUserDues'); ?>',
                method: 'post',
                data: {
                    customerId: customerId
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.length > 0) {
                        console.log("test");
                        // If dues are clear, proceed with deletion
                        if (confirm('Are you sure you want to delete this user?')) {
                            window.location.href = '<?php echo base_url('deletecustomer/') ?>' + customerId;
                        }
                    } else {
                        // If dues exist, show popup window with message
                        alert('User has dues pending. Cannot delete.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });

        // $(document).on('click', 'table tr', function() {
        //     var userId = $(this).find('td').eq(6).find('button').data('id');
        //     console.log('User ID:', userId);
        //     window.location.href = '<?php echo base_url('Customer/CustomerController/getUserHistory/') ?>' + userId;
        //     // You can now use customerId for further operations
        // });
        // Handle row click to get customer ID
    });
</script>