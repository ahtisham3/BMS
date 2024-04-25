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
                            <h1>Add Service</h1>
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
                                <span>Customer Services </span>
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
                                                <form action="<?php echo base_url('createcustomerservices'); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <!-- user id  -->
                                                        <input type="hidden" id="user_id" name="user_id" value="<?= $customerdata->customer_Id ?>">
                                                        <!-- all services   -->
                                                        <input type="hidden" id="selected_services" name="selected_services">
                                                        <!-- Total amount  -->
                                                        <input type="hidden" id="totalAmountInput" name="totalAmountInput" value="">
                                                        <!-- discount  -->
                                                        <input type="hidden" id="discontAmont" name="discontAmont" value="">
                                                        <!-- utilityserviese -->
                                                        <input type="hidden" id="selected_utilitiesservices" name="selected_utilitiesservices">
                                                        <!-- building for get floor details for apparmtent-->


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Building :</label>
                                                            <div class="col-md-9">
                                                                <select id="building_Table" class="form-control" name="building_Table" required data-parsley-trigger="change">
                                                                    <option value="">Choose...</option>
                                                                    <?php foreach ($buildingDetail as $row) : ?>
                                                                        <option value="<?= $row->building_Id; ?>" <?php echo set_select('building_Table', $row->building_Id); ?>>
                                                                            <?= $row->building_Name; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Floor  Dropdown -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Floor :</label>
                                                            <div class="col-md-9">
                                                                <select id="floor_table" class="form-control" name="floor_table" required data-parsley-trigger="change">
                                                                    <option value="">Choose...</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!--  Appartment Dropdown -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Appartment:</label>
                                                            <div class="col-md-9">
                                                                <select id="appartment_table" class="form-control" name="appartment_table" required data-parsley-trigger="change">
                                                                    <option value="">Choose...</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- billing  Table  -->
                                                        <div class="form-group">
                                                            <div id="service_table_container" style="display: none;">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Billing Details</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Service Name</th>
                                                                                        <th>Price</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="mytable">
                                                                                    <!-- Table rows will be dynamically populated -->
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Services Table  -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="fw-bold col-md-6 text-end">General Services</label>
                                                                <div class="col-md-6">
                                                                    <?php foreach ($serviceGernal as $row) { ?>
                                                                        <br />
                                                                        <input type="checkbox" class="serviceCheckbox" id="serviceCheckbox<?= $row->service_id ?>" name="serviceCheckbox<?= $row->service_id ?>" value="<?= $row->service_id ?>">
                                                                        <?= $row->service_Name ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="fw-bold col-md-6 text-end">Utilities</label>
                                                                <div class="col-md-6">
                                                                    <?php foreach ($serviceUtilites as $row) { ?>
                                                                        <br />
                                                                        <input type="checkbox" class="serviceCheckbox" id="serviceCheckbox<?= $row->bill_TypeId ?>" name="serviceCheckbox<?= $row->bill_TypeId ?>" value="<?= $row->bill_TypeId ?>" required data-parsley-trigger="change">
                                                                        <?= $row->bill_TypeName ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Billing Detail:</label>
                                                            <div class="col-md-10">
                                                                <div id="appartmentdetails" class="row">
                                                                    <div class="col-md-2">
                                                                        <label for="discount">Discount Type:</label>
                                                                        <select class="form-control" id="discountType">
                                                                        <option value="">Discount Type..</option>
                                                                            <option value="percent">%</option>
                                                                            <option value="amount">Amount</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <label for="discount">Discount (%):</label>
                                                                        <input type="number" class="form-control" id="discount">
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <label for="discountamont">Discount Amount:</label>
                                                                        <input type="number" class="form-control" id="discountamont">
                                                                    </div>
                                                                    <!-- Wrap the following two elements in a box style -->
                                                                    <div class="col-md-2 text-center">
                                                                        <label for="Total Amount">Total Amount:</label>
                                                                        <div class="box-style">

                                                                            <h5 id="Total_Amount_Amout">0</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 text-center">
                                                                        <label for="new_TotalAmont">Amount After Discount:</label>
                                                                        <div class="box-style">

                                                                            <h5 id="new_TotalAmont"></h5>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End box style -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <style>
                                                            .box-style {
                                                                border: 1px solid #ccc;
                                                                padding: 10px;
                                                                border-radius: 5px;
                                                                background-color: #f9f9f9;
                                                                margin-bottom: 10px;
                                                                /* Adjust margin as needed */
                                                            }
                                                        </style>





















                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" id="floor_Building_hide">Received Bill</button>
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
<script>
    $(document).ready(function() {
        var currentTotalAmountText = $('#Total_Amount_Amout').text().replace('Grand Amount: ', '');
        var currentTotalAmount = parseInt(currentTotalAmountText);
        $('#totalAmountInput').val(currentTotalAmount);
        console.log('#totalAmountInput');
    });
</script>
<script>
    // Wait for the document to be fully loaded
    $(document).ready(function() {
        // Disable all checkboxes initially
        $('.serviceCheckbox').prop('disabled', true);

        // Add event listener to all dropdowns
        $('#building_Table, #floor_table, #appartment_table').change(function() {
            // Check if all dropdowns have a value selected
            if ($('#building_Table').val() !== "" && $('#floor_table').val() !== "" && $('#appartment_table').val() !== "") {
                // Enable all checkboxes if all dropdowns have a value
                $('.serviceCheckbox').prop('disabled', false);
            } else {
                // Disable all checkboxes if any dropdown doesn't have a value selected
                $('.serviceCheckbox').prop('disabled', true);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        //var selectedServices = [];
        var sumamount = 0;
        $('#building_Table').change(function() {
            var buildingId = $(this).val();
            $.ajax({
                url: '<?php echo base_url('Appartments/AppartmentsController/getFloorData'); ?>/' + buildingId,
                method: 'get',
                dataType: 'json',
                success: function(res) {
                    var floor_table = $('#floor_table');
                    floor_table.empty();
                    if (res?.length > 0) {
                        // Add "Choose..." option
                        floor_table.append('<option value="">Choose...</option>');

                        $.each(res, function(index, floor) {
                            floor_table.append('<option value="' + floor['floor_Id'] + '">' + floor['floor_Name'] + '</option>');
                        });

                        // Check if there is only one option and select it
                        if (res.length === 1) {
                            $('#floor_table').val(res[0]['floor_Id']);
                            // Trigger the change event to handle further actions
                            $('#floor_table').trigger('change');
                        }
                    } else {
                        $('#floor_table').empty();
                        $('#floor_table').append('<option value="" disabled selected>Data not available </option>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#floor_table').empty();
                    $('#floor_table').append('<option value="" disabled selected>Data not available </option>');
                    $('#floor_table').trigger('change');
                }
            });
        });

        $('#floor_table').change(function() {
            var floorId = $(this).val();
            $.ajax({
                url: '<?php echo base_url('Appartments/AppartmentsController/getAppartmentDetailByFloor'); ?>/' + floorId,
                method: 'get',
                dataType: 'json',
                success: function(res) {
                    var appartment_table = $('#appartment_table');
                    appartment_table.empty();
                    if (res.length > 0) {
                        appartment_table.append('<option value="">Choose...</option>');
                        $.each(res, (index, appartment) => {

                            appartment_table.append('<option value="' + appartment['appartment_TableId'] + '">' + appartment['appartment_Name'] + '</option>');
                        });
                        // Check if there's only one option and select it
                        if (res.length === 1) {
                            appartment_table.find('option').first().prop('selected', true).trigger('change');
                        }
                    } else {
                        appartment_table.empty().append('<option value="" disabled selected>Data not available </option>').trigger('change');
                    }
                },
                error: function(xhr, status, error) {
                    appartment_table.empty().append('<option value="" disabled selected>Data not available </option>');
                }
            });
        });
        $('#appartment_table').change(function() {
            var apparmtentId = $(this).val();
            console.log('appartmentId:', apparmtentId); // Check if the apparmtentId is correctly logged in the console
            // Check if apparmtentId is not empty or undefined
            if (apparmtentId) {
                $.ajax({
                    url: '<?php echo base_url('Appartments/AppartmentsController/getAppartmentDetail'); ?>/' + apparmtentId,
                    method: 'get',
                    dataType: 'json',
                    success: function(res) {
                        var totalamount = 0;
                        var table_rows = '';
                        var servicetable = $('#mytable');
                        servicetable.empty();
                        var Appartment_Rent_Amout = $('#Appartment_Rent_Amout');
                        Appartment_Rent_Amout.empty();

                        if (res) {
                            $('#service_table_container').show();
                            var totalamount = 0; // Initialize total amount
                            $.each(res, function(i, val) {
                                var roomamount = parseFloat(val["appartment_Price"]);
                                totalamount += roomamount; // Accumulate room amounts to calculate total
                                table_rows += '<tr>';
                                table_rows += '<td>' + val["appartment_Name"] + '</td>';
                                table_rows += '<td>' + roomamount + '</td>';
                                table_rows += '</tr>';
                            });
                            $('#mytable').append(table_rows);
                            $('#Appartment_Rent_Amout').append('Appartment Amount: ' + totalamount); // Display total amount
                            $('#Total_Amount_Amout').text('Total Amount: ' + totalamount); // Display total amount
                            $('#totalAmountInput').val(totalamount);

                        } else {
                            $('#service_table_container').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                console.log('appartmentId is empty or undefined');
                $('#service_table_container').hide();
            }
        });

        $('.serviceCheckbox').change(function() {
            var serviceid = $(this).val();
            var isChecked = $(this).is(":checked");
            var selectedServices = $('#selected_services').val(); // Get the selected services as a string

            // Convert the string of selected services to an array
            selectedServices = selectedServices ? selectedServices.split(',') : [];
            if (isChecked) {
                var serviceDetails = getServiceById(serviceid);
                console.log(serviceDetails);
                if (serviceDetails) {
                    var serviceAmount = parseFloat(serviceDetails.service_Price);
                    var tableRow = '<tr data-service-id="' + serviceid + '"><td>' + serviceDetails.service_Name + '</td><td>' + serviceAmount + '</td></tr>';
                    $('#service_table_container table tbody').append(tableRow);
                    updateTotalAmount(serviceAmount, 'add');
                    selectedServices.push(serviceid);
                    console.log(selectedServices);
                }
            } else {
                $('#service_table_container table tbody tr[data-service-id="' + serviceid + '"]').remove();
                //removing selected services 
                var selectedServices = $('#selected_services').val().split(',');
                var index = selectedServices.indexOf(serviceid);
                selectedServices.splice(index, 1);
                var serviceDetails = getServiceById(serviceid);
                var serviceAmount = parseFloat(serviceDetails.service_Price);
                updateTotalAmount(serviceAmount, 'subtract');
            }
            $('#selected_services').val(selectedServices.join(','));
        });
        $('.utilityserviceCheckbox').change(function() {
            var serviceid = $(this).val();
            var isChecked = $(this).is(":checked");
            var selectedServices = $('#selected_utilitiesservices').val(); // Get the selected services as a string

            // Convert the string of selected services to an array
            selectedUtilityServices = selectedServices ? selectedService.split(',') : [];
            if (isChecked) {
                selectedUtilityServices.push(serviceid);
                console.log(selectedUtilityServices);
            } else {

                console.log("no services selected");
            }
        });

        function getServiceById($serviceid) {
            var serviceDeital = null;
            $.ajax({
                method: 'get',
                url: '<?php echo base_url('Service/ServiceController/getServiceById'); ?>/' + $serviceid,
                dataType: 'json',
                async: false,
                success: function(res) {
                    serviceDeital = res;
                    // console.log(serviceDeital);
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                }
            });
            return serviceDeital;
        }

        function updateTotalAmount(amount, operation) {
            //var currentTotalAmount = parseFloat($('#Total_Amount_Amount').text().replace('Grand Amount: ', ''));
            var currentTotalAmountText = $('#Total_Amount_Amout').text().replace('Total Amount: ', ''); // Extracted text value
            var currentTotalAmount = parseFloat(currentTotalAmountText); // Convert text to floating-point number
            console.log(currentTotalAmount);
            console.log('Current Total Amount:', currentTotalAmount);
            console.log('Amount to be added/subtracted:', amount);
            if (operation === 'add') {
                currentTotalAmount += amount;
            } else if (operation === 'subtract') {
                currentTotalAmount -= amount;
            }
            console.log('New Total Amount:', currentTotalAmount);
            $('#Total_Amount_Amout').text('Total Amount: ' + currentTotalAmount);
            var currentTotalAmountText = $('#Total_Amount_Amout').text().replace('Total Amount: ', '');
            var currentTotalAmount = parseInt(currentTotalAmountText);
            $('#totalAmountInput').val(currentTotalAmount);
            console.log($('#totalAmountInput').val());
        }


    });

    $(document).ready(function() {
        // Function to calculate total amount
        function calculateTotalAmount() {
            var discountedamont = 0;
            var currentTotalAmountText = parseFloat($('#Total_Amount_Amout').text().replace('Total Amount: ', ''));
            var discountType = $('#discountType').val();
            var discount = parseFloat($('#discount').val()) || 0;
            var discountAmount = parseFloat($('#discountamont').val()) || 0;

            var totalAmount = currentTotalAmountText;

            if (discountType === 'percent') {

                totalAmount -= (currentTotalAmountText * (discount / 100));
                discountedamont = (currentTotalAmountText * discount) / 100;
            } else if (discountType === 'amount') {
                totalAmount -= discountAmount;
                discountedamont = discountAmount;
            }

            $('#new_TotalAmont').text('Total Amount: ' + totalAmount.toFixed(2));
            $('#discontAmont').val(discountedamont);

        }

        // Trigger calculation when amount or discount changes
        $('#discount, #discountamont, #discountType').on('input change', function() {
            calculateTotalAmount();
        });

        // Initial calculation
        calculateTotalAmount();
    });
</script>