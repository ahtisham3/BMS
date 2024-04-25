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
                                <a href="<?php echo base_url("getcustomerdetails"); ?>">Customer</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Create New Customer</span>
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
                                                <form action="<?php echo base_url('updatecustomer/'.$customer_table->customer_Id); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">First Name :</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_FirstName" class="form-control" name="customer_FirstName" value="<?php echo  $customer_table->customer_FirstName; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Last Name :</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_LastName" class="form-control" name="customer_LastName" value="<?php echo $customer_table->customer_LastName; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">CNIC :</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_Cnic" class="form-control" name="customer_Cnic" value="<?php echo $customer_table->customer_Cnic; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Mobile Number :</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_MobileNumber" class="form-control" name="customer_MobileNumber" value="<?php echo $customer_table->customer_MobileNumber; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_Email" class="form-control" name="customer_Email" value="<?php echo $customer_table->customer_Email;?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Date Of Birth:</label>
                                                            <div class="col-md-9">
                                                            <input type="date" id="customer_Dob" class="form-control" name="customer_Dob" value="<?php echo  $customer_table->customer_Dob; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Emergency Contact number:</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_EmergencyNumber" class="form-control" name="customer_EmergencyNumber" value="<?php echo $customer_table->customer_EmergencyNumber; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Select Country:</label>
                                                            <div class="col-md-9">
                                                               
                                                            <select id="customer_Resident" class="form-control" name="customer_Resident " required data-parsley-trigger="change">
                                                            <option value="">Select Country</option>
                                                        </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Permanent Address:</label>
                                                            <div class="col-md-9">
                                                            <input type="text" id="customer_Adress" class="form-control" name="customer_Adress" value="<?php echo $customer_table->customer_Adress; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Building Status</i>:</label>
                                                            <div class="col-md-9">
                                                                <div class="form-check">

                                                                <input class="form-check-input" type="radio" name="customer_Status" id="active" value="1" <?php echo set_radio('customer_Status', '1', ($customer_table->customer_Status==1)); ?>>
                                                                    <label class="form-check-label" for="active">Floor Active</label>
                                                                </div>
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="customer_Status" id="deactive" value="0" <?php echo set_radio('customer_Status', '0',($customer_table->customer_Status==0)); ?>>
                                                                    <label class="form-check-label" for="deactive">Floor Deactive</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" id="floor_Building_hide">Update Customer</button>
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
    // Fetch list of countries from the API
    fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('customer_Resident');
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                const selectedCountry = "<?php echo $customer_table->customer_Resident ?? ''; ?>";
            if (selectedCountry !== '') {
                selectElement.value = selectedCountry;
            }
                selectElement.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching countries:', error);
        });
</script>