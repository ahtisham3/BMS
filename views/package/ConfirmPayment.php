<?php 
$subType ='';
if($user[0]['Subscription_type']=='M')
{
$subType='Monthly';
}
elseif ($user[0]['Subscription_type']=='Y') {
    $subType='Yearly'; } 
 else
 {
    $subType='Trial';
 }
?>
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
                            <h1>Upgrade Package</h1>
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
                                <span>Upgrade Package</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-5">
                               <h2>Payment Options</h2>
                                <p>Submit your payment using any of the below methods, if you don't find a right payment option please contact us.</p>
        
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#bt">Bank Transfer</a></li>
                                        <li><a data-toggle="tab" href="#cdc">Credit/Debit Card</a></li>
                                        <li><a data-toggle="tab" href="#mp">Mobile Payment</a></li>
                                      </ul>

                                      <div class="tab-content">
                                        <div id="bt" class="tab-pane fade in active">
                                          <h3>Bank Details</h3>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div id="cdc" class="tab-pane fade">
                                          <h3>Credit Card Details</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div id="mp" class="tab-pane fade">
                                          <h3>Mobile Payment</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                      
                                      </div>
                                </div>
                                <div class="col-md-7">
                                    <h2>Payment Confirmation</h2>
                                <p>Once your payment is complete, fill below form to send paymetn details for account activation.</p>
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet light form-fit ">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url('AddTorder'); ?>" class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data" >
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Invoice:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" name="order_id" class="form-control"  value="<?php echo $invoice; ?>" required readonly >
                                                               </div>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="user_email" class="form-control"  value="<?php echo $user[0]['user_email']; ?>" required readonly >
                                                                <input type="hidden" name="user_id" class="form-control"  value="<?php echo $user[0]['user_id']; ?>" required>

                                                            </div>
                                                        </div>
                    
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Payment Method:</label>
                                                            <div class="col-md-9">
                                                                <select name="method" class="form-control" list="sPackage" autocomplete="off" id="spackageType" required>
                                                                   <option>
                                                                       --Select Option--
                                                                   </option>
                                                                   <option value="1" >
                                                                          Bank Transfer
                                                                    </option>
                                                                    <option value="2" >
                                                                          Mobile Payment
                                                                    </option>
                                                                    <option value="3" >
                                                                         Credit/Debit Card
                                                                    </option>
                                                                </select> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Transaction#</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="transactionno" class="form-control" required>
                                                    
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Amount</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="amount" id="pprice" class="form-control" required>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="control-label col-md-3">Payment Date:</label>
                                                            <div class="col-md-9">
                                                                <input type="date" name="paymentdate" class="form-control" value=""  required>
                                                    
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                              <label class="control-label col-md-3">Attach Recipt:</label>
                                                            <div class="col-md-9">
                                                        <div class="input-group">

                                                             <span class="input-group-addon" id="basic-addon1">Attachment</span>
                                                          <input type="file" name="attachment" class="form-control"  aria-describedby="basic-addon2">
                                                        
                                                        </div>
                                                    </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" type="submit">Continue to Payment</button>
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


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
     $('#spackageType').change(function(){
    var s= $('#spackageType option:selected').attr('price');
      $('#pprice').val(s);

// console.log(jQueryArray);
 });
</script>