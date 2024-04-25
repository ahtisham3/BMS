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
                            <h1>Update Customer Services</h1>
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
                                <span>Update Services </span>
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
                                                <form action="<?php echo base_url('updateCustomerService/'.$customerDetails->customer_Id);?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <!-- user id  -->
                                                        <!-- all services   -->
                                                        <input type="text" hidden id="selected_services" name="selected_services" value="">
                                                        <!-- Total amount  -->
                                                        <!-- building for get floor details for apparmtent-->
                                                        <div class="form-group">
                                                            <div id="service_table_container">
                                                                <h5 class="card-title">Service Details<span></span></h5>
                                                                <table class="table table-border" id="update_service">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Service Name</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $counter = 1; ?>
                                                                        <?php foreach ($service_details as $detail) { ?>
                                                                            <tr>
                                                                                <td><?= $counter; ?></td>
                                                                                <td class="text-left"><?= $detail->service_Name; ?></td>
                                                                                <td class="text-right"><?= $detail->service_Price; ?></td>
                                                                            </tr>
                                                                            <?php $counter++; ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- Services Table  -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="fw-bold col-md-3"> General Services</label>
                                                                <div class="col-md-8">
                                                        
                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="col-md-8">
                                                                    <?php foreach ($serviceGernal as $row) { ?>
                                                                        <br />
                                                                        <input type="checkbox" class="serviceCheckbox" id="serviceCheckbox<?= $row->service_id ?>" name="serviceCheckbox[]" 
                                                                        value="<?= $row->service_id ?>" <?php echo (in_array($row->service_id, array_column($service_details, 'service_id'))) ? 'checked' : ''; ?>>
                                                                        <?= $row->service_Name ?>
                                                                    <?php } ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="form-actions right">
                                                <button class="btn btn-primary" id="floor_Building_hide">Update Service</button>
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
                          
                        var selectedServices = $('#selected_services').val(); // Get the selected services as a string
                        selectedServices = selectedServices ? selectedServices.split(',') : [];

                              $('.serviceCheckbox:checked').each(function() {
                                selectedServices.push($(this).val());
                                console.log(selectedServices);
                            });
                            $('.serviceCheckbox').change(function() {
                             var serviceId = $(this).val();
                       
                        if ($(this).is(':checked')) {
                                selectedServices.push(serviceId);
                                console.log(selectedServices);
                            } else { // If the checkbox is unchecked, remove the value from selectedServices
                                var index = selectedServices.indexOf(serviceId);
                                if (index !== -1) {
                                    selectedServices.splice(index, 1);
                                    console.log(selectedServices);
                                }
                            }

                        // Update the hidden input field with updated selected services
                        $('#selected_services').val(selectedServices.join(','));
                    });
  

      

       
    });
</script>