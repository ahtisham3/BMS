<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <div class="page-container">
            <div class="page-content-wrapper">
                <div class="page-head">
                    <div class="container">
                        <div class="page-title">
                            <h1>Receive Payment
                                <small>Get Payment</small>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="container">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Received Payment</span>
                            </li>
                        </ul>


                        <div class="page-content-inner custom-page-content-inner">
                            <form action="<?php echo base_url('getfinalinvoice'); ?>" class="form-horizontal form-bordered" method="POST">
                                <div class="form-body">
                                    <!-- customer id -->
                                    <input type="hidden" id="user_id" name="user_id" value="<?= $billingDetails->user_Id; ?>">
                                    <!-- BillingId -->
                                    <input type="hidden" id="billing_Id" name="billing_Id" value="<?= $billingDetails->billing_Id; ?>">

                                    <input type="hidden" id="totalAmountInput" name="totalAmountInput" value="<?= $billingDetails->customer_TotalAmonut; ?>">
                                    <!-- discount  -->
                                    <input type="hidden" id="discontAmont" name="discontAmont" value="">
                                    <!-- utilityserviese -->

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption font-dark">
                                                            <span class="caption-subject bold uppercase">Payment Details</span>
                                                        </div>
                                                        <div class="tools"></div>
                                                    </div>
                                                    <div class="table-wrapper">
                                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="DISCOUNTABLE">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th class="text-left col-4">DESCRIPTION</th>
                                                                    <th class="text-center col-4">DISCOUNTABLE</th>
                                                                    <th class="text-right col-4">PRICE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $counter = 1;
                                                                $totalserviceamont = 0; ?>
                                                                <?php foreach ($appartmentDetails as $index => $detail) { ?>
                                                                    <tr>
                                                                        <td><?= $counter; ?></td>
                                                                        <td class="text-left"><?= $detail->appartment_Name; ?></td>
                                                                        <td class="text-center">
                                                                            <h6>yes</h6>
                                                                        </td>
                                                                        <td class="text-right"><?= $detail->appartment_Price; ?></td>
                                                                    </tr>
                                                                    <?php $counter++;
                                                                    $totalserviceamont += $detail->appartment_Price;
                                                                    ?>
                                                                <?php } ?>
                                                                <?php foreach ($service_details as $index => $detail) { ?>
                                                                    <tr>
                                                                        <td><?= $counter; ?></td>
                                                                        <td class="text-left"><?= $detail->service_Name; ?></td>
                                                                        <td class="text-center">
                                                                            <h6>Yes</h6>
                                                                        </td>
                                                                        <td class="text-right"><?= $detail->service_Price; ?></td>
                                                                    </tr>
                                                                    <?php $counter++;
                                                                    $totalserviceamont += $detail->service_Price;
                                                                    ?>
                                                                <?php } ?>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>SUBTOTAL</td>
                                                                    <td class="text-right"><?= $totalserviceamont ?></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="table-wrapper">
                                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="notDISCOUNTABLE">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th class="text-left col-4">DESCRIPTION</th>
                                                                    <th class="text-center col-4">DISCOUNTABLE</th>
                                                                    <th class="text-right col-4">PRICE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $counter = 1;
                                                                $totalutilityamont = 0; ?>
                                                                <?php foreach ($service_Utilities as $index => $detail) { ?>
                                                                    <tr>
                                                                        <td><?= $counter; ?></td>
                                                                        <td class="text-left"><?= $detail->bill_TypeName; ?></td>
                                                                        <td class="text-center">
                                                                            <h6>NO</h6>
                                                                        </td>
                                                                        <td class="text-right"><?= $detail->bill_Price; ?></td>
                                                                    </tr>
                                                                    <?php $counter++;
                                                                    $totalutilityamont += $detail->bill_Price;
                                                                    ?>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>SUBTOTAL</td>
                                                                    <td class="text-right"><?= $totalutilityamont ?></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
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
                                        <div class="col-md-3 text-center">
                                            <label for="Total Amount">Total Amount:</label>
                                            <div class="box-style">
                                                <h5 id="Total_Amount_Amout"><?php echo $billingDetails->customer_TotalAmonut ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label for="new_TotalAmont">Amount After Discount:</label>
                                            <div class="box-style">
                                                <h5 id="new_TotalAmont">0</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary" id="getpamentsend">Received Bill</button>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
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
    }

    .custom-page-content-inner {
        padding: 20px;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to calculate total amount
        function calculateTotalAmount() {
            var discountedamont = 0;
            var currentTotalAmountText = parseFloat($('#Total_Amount_Amout').text());
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

            $('#new_TotalAmont').text(totalAmount.toFixed(2));
            $('#discontAmont').val(discountedamont);
            // $('#totalAmountInput').val(currentTotalAmountText);
            // console.log(totalAmount);
            // console.log( $('#totalAmountInput').val(totalAmount));
        }

        // Trigger calculation when amount or discount changes
        $('#discount, #discountamont, #discountType').on('input', function() {
            calculateTotalAmount();
        });

        // Initial calculation
        calculateTotalAmount();
    });
</script>