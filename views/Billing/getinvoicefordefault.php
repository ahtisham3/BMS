<style>
    tbody,
    tfoot {
        display: block;
        height: fit-content;
        /* Adjust the height as per your requirement */
        overflow-y: auto;
    }
    thead {
       height: fit-content;
    }

    thead,
    tbody tr,
    tfoot tr {
        display: table;
        width: 100%;
        /* Adjust the width as per your requirement */
        table-layout: fixed;
        /* Ensures equal width for all columns */
    }

    .table-wrapper {

        overflow: hidden;

    }

    .table {
        width: 100%;
        height: 100%;
        /* Ensure the table fills its container */
    }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    //   function exportAsPDFAndRedirect(url) {
    //     try {
    //          exportAsPDF();
    //      window.location.href = url;
    //     } catch (error) {
    //         console.error('Error exporting PDF:', error);
    //     }
    // }

    function exportAsPDF($customer_Id) {
        const invoice = document.getElementById('condiv');
        // Options for pdf
        const options = {
            filename: 'invoice.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            }, // Set quality to 1 for better resolution
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'a4', // Set the format to A5
                orientation: 'portrait' // Keep the orientation portrait
            }
        };
        html2pdf().from(invoice).set(options).save().
        then(function() {
            var url = '<?php echo base_url('Billing/BillingInvoiceController/sendFinalInvoiceEmail'); ?>/' + $customer_Id;
            window.location.href = url;
        });

    }
    //  function sendEmailWithPDF( $customer_Id)
    //  {
    //     console.log("Send");
    //     var url = '<?php echo base_url('Billing/BillingInvoiceController/sendEmailWithPDF'); ?>/' + $customer_Id;
    //     $.ajax({
    //         url: url,
    //         method: 'get',
    //         success: function(response) {
    //             console.log("send1");
    //         }
    //     });
    // }
</script>

<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Billing Invoice

                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a type="button" class="btn btn-danger" onclick="exportAsPDF(<?php echo $customerDetails->customer_Id ?>);">
                                    <i class="fa fa-file-pdf-o"></i> defult invoice
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

                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div id="condiv" class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="javascript:;">
                                                    <img src="assets/images/logo-icon.png" width="80" alt="">
                                                </a>
                                            </div>
                                            <div class="col-md-9 d-flex justify-content-end">
                                                <div class="text-right">
                                                    <h2 class="name">
                                                        <a target="_blank" href="javascript:;">
                                                           <?= $companyDetails->company_name;?>
                                                        </a>
                                                    </h2>
                                                    <div><?=$companyDetails->company_location?></div>
                                                    <div><?=$companyDetails->company_phone_no?></div>
                                                    <div><?=$companyDetails->company_email?></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <div class="invoice-to">
                                                    <div class="text-gray-light">
                                                        <h3 style="font-weight: bold;">INVOICE TO: </h3>
                                                    </div>
                                                    <h2 class="to"><?= $customerDetails->customer_FirstName . ' ' . $customerDetails->customer_LastName; ?></h2>
                                                    <div class="address"><?= $customerDetails->customer_Adress; ?></div>
                                                    <div class="email"><?= $customerDetails->customer_Email; ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="invoice-details">
                                                    <h1 class="invoice-id"><label>Invoice Number<?= $billingDetails->billing_Id; ?></label></h1>
                                                    <div class="date"><label> Invoice Date: <?= $billingDetails->invoice_Date; ?> </label></div>
                                                    <div class="date"><label> Last Date: <?= $billingDetails->invoice_EndDate; ?> </label></div>
                                                    <div class="date"><label> Number Of Months Bill  <?= $totalpendingmonth ?> </label></div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="table-wrapper">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th class="text-left">DESCRIPTION</th>
                                                            <th class="text-centre">Discount</th>
                                                            <th class="text-right">PRICE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $counter = 1; ?>

                                                        <?php foreach ($appartmentDetails as $index => $detail) { ?>
                                                            <tr>
                                                                <td><?= $counter; ?></td>
                                                                <td class="text-left">
                                                                        <?= $detail->appartment_Name; ?>
                                                                </td>
                                                                <td class="text-centre"></td>
                                                                <td class="text-right">
                                                                    <?= $detail->appartment_Price * $totalpendingmonth ?>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; ?>
                                                        <?php } ?>
                                                        <?php foreach ($service_details as $index => $detail) { ?>
                                                            <tr>
                                                                <td><?= $counter; ?></td>
                                                                <td class="text-left">
                                                                   
                                                                        <?= $detail->service_Name; ?>
                                                                  
                                                                </td>
                                                                <td class="text-centre"></td>
                                                                <td class="text-right">
                                                                    <?= $detail->service_Price; ?>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; ?>
                                                        <?php } ?>
                                                        <?php foreach ($service_Utilities as $index => $detail) { ?>
                                                            <tr>
                                                                <td><?= $counter; ?></td>
                                                                <td class="text-left">
                                                                  
                                                                        <?= $detail->bill_TypeName; ?>
                                                                   
                                                                </td>
                                                                <td class="text-centre"></td>
                                                                <td class="text-right">
                                                                    <?= $detail->bill_Price; ?>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">Previous Pending Amount</td>
                                                            <td class="text-right"><?= $previousTotalAmount; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">SUBTOTAL</td>
                                                            <td class="text-right"><?= $billing_details->customer_TotalAmonut + $previousTotalAmount ; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">GRAND TOTAL</td>
                                                            <td class="text-right"><?= $billing_details->customer_TotalAmonut +$previousTotalAmount; ?></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="thanks">Thank you!</div>
                                        <div class="notices">
                                            <div>NOTICE:</div>
                                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>s
        <!-- END CONTAINER -->
    </div>
</div>