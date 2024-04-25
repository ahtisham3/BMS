<style>
.container {
    font-weight: bold;
    font-size: medium;
    margin-top: 15px; /* Optional: Add some margin at the bottom */
}

</style>
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
                                <a href="<?php echo base_url('getbuildingdetails'); ?>">Building</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add Item</span>
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
                                            <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet light form-fit ">
                    <div class="portlet-body form">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"><label for="elemeter"> Electricity Meter:</label> <?php echo $metersDetail->elcMeterNumeber; ?></div>
                                <div class="col-md-4"><label for="gasmeter"> Gas Meter: </label> <?php echo $metersDetail->gasMeterNumber; ?></div>
                                <div class="col-md-4"><label for="watermeter">Water Meter Number: </label> <?php echo $metersDetail->waterConnectionNumber; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url('Billing/BillingInvoiceController/getutilitiesBills'); ?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">
                                                        <input type="hidden" name="customerID" value="<?php echo $customerDetails->customer_Id; ?>">

                                                        <?php foreach ($utilitesType as $index => $utility) : ?>
                                                            <div class="mb-4">
                                                                <input type="hidden" name="bill_types[<?php echo $index; ?>]" value="<?php echo $utility->bill_TypeId; ?>">
                                                                <label for="bill_<?php echo $utility->bill_TypeId; ?>" class="form-label"><?php echo $utility->bill_TypeName; ?> Bill </label>
                                                                <input type="number" id="bill_<?php echo $utility->bill_TypeId; ?>" class="form-control" name="bills[<?php echo $index; ?>]" required data-parsley-trigger="change" value="<?php echo set_value('bills[' . $index . ']'); ?>">
                                                            </div>
                                                        <?php endforeach; ?>

                                                        <button type="submit" class="btn btn-primary btn-block">Create Billing</button>
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