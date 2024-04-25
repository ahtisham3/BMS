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
                            <h1>Customer History 
                                <small>record</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                           
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
                                <span>Record</span>
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
                                                <span class="caption-subject bold uppercase">Customer History</span>
                                            </div>

                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <h1> Customer Name:<?php echo  $customerdata->customer_FirstName . '' . $customerdata->customer_LastName ?></h1>
                                            </div>
                                            <div class="row">
                                                <h1> Starting Date:<?php echo date('Y-m-d', strtotime($customerdata->create_CustomerTime)); ?></h1>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="customerhistory">
                                                <thead>
                                                    <tr>
                                                        <th class="col-3">#</th>
                                                        <th class="col-3">Invoice Date</th>
                                                        <th class="col-2">Payment Receiving Date</th>
                                                      
                                                        <th class="col-2">Total Amont</th>
                                                        <th class="col-2">Discount </th>
                                                        <th class="col-2">Amount pay </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1;
                                                    $totalPayment = 0;
                                                    $dictotal=0;
                                                    ?>
                                                    <?php foreach ($customerhistory as $customerdata) { ?>
                                                        <tr>
                                                            <td> <?php echo $count; ?></td>
                                                            <td><?php echo $customerdata->paymentdata; ?></td>
                                                            <td><?php echo $customerdata->invoicedata; ?></td>
                                                            <td><?php echo $customerdata->customer_TotalAmonut; ?></td>
                                                            <td><?php echo $customerdata->discountamont;?></td>
                                                            <td><?php echo $customerdata->customer_TotalAmonut-$customerdata->discountamont;?></td>
                                                        </tr>
                                                        <?php $count++;
                                                      
                                                         $sumamont=$customerdata->customer_TotalAmonut-$customerdata->discountamont;
                                                        $totalPayment += $sumamont;
                                                        $dictotal += $customerdata->discountamont;
                                                        ?>
                                                    <?php } ?>

                                                </tbody>
                                               
                                                <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                        <td >Total Discount:</td>
                                                        <td><?php echo $dictotal; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                        <td >Total Payment:</td>
                                                        <td><?php echo $totalPayment; ?></td>
                                                    </tr>
                                                </tfoot>
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

<div id="myModalprocedure" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close">&times;</a>
                <h3>Delete Procedure</h3>
            </div>
            <div class="modal-body">
                <p>You are about to delete this Item, this procedure is irreversible.</p>
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn danger" id="delete_item">Yes</a>
                <a href="#" data-dismiss="modal" class="btn secondary">No</a>
            </div>
        </div>

    </div>
</div>
<script>
//     $(document).ready(function () {
//         $('#sample_1').DataTable();
//     });
   
// });
// new DataTable('#sample_1', {
//     layout: {
//         topStart: {
//             buttons: [
//                 { extend: 'print', footer: false },
//                 { extend: 'pdf', footer: false },
//                 { extend: 'csv', footer: false },
              
//             ]
//         }
//     }
// });

</script>