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
                                <div class="col-md-8">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet light form-fit ">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="" class="form-horizontal form-bordered" method="POST" id="upgradePackage" >
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Current Package:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" name="currentpackage" class="form-control" disabled value="<?php echo $user[0]['Subscription_type']; ?>" required>
                                                               </div>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label class="control-label col-md-3">Name:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="username" class="form-control" disabled value="<?php echo $user[0]['user_name']; ?>" required>
                                                                <input type="hidden" name="userid" class="form-control" disabled value="<?php echo $user[0]['user_id']; ?>" required>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Select Package:</label>
                                                            <div class="col-md-9">
                                                                <select name="spackages" class="form-control" list="sPackage" autocomplete="off" id="spackageType" required>
                                                                   <option>
                                                                       Select Your package
                                                                   </option>
                                                                   <?php foreach ($packages as $pack) {?>
                                                                        <option value=" <?php echo $pack['package_id']; ?>" price="<?php echo $pack['package_price']; ?>">
                                                                            <?php echo $pack['package_name'].'- $'.$pack['package_price'].'/M'; ?>
                                                                        </option>
                                                                   <?php } ?>
                                                                </select> </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3">Package Period:</label>
                                                            <div class="col-md-9">
                                                                <select name="stime" class="form-control" list="stime" autocomplete="off" id="stime" required>
                                                                    <option  >
                                                                      Select
                                                                   </option>
                                                                   <option value="M" >
                                                                      Monthly
                                                                   </option>
                                                                   <option value = "Y">
                                                                      Yearly
                                                                   </option>
                                                                </select> </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Start Date:</label>
                                                            <div class="col-md-9">
                                                                <input type="date" name="startdate" class="form-control" id="sstart" value="<?= date('Y-m-d'); ?>" disabled required>
                                                    
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">End Date:</label>
                                                            <div class="col-md-9">
                                                                <input type="date" name="enddate" class="form-control" id="edate" value="" disabled required>
                                                    
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Price</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="price" id="pprice" class="form-control"  disabled required>
                                                            </div>
                                                        </div>
                                                      

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" type="submit">Continue to Payment</button>
                                                    </div>
                                                </form>


                                                <form action="" class="form-horizontal form-bordered" method="POST" id="paymentconfirmation" style="display: none;">

                                                    <input type="hidden" name="authToken" id="authToken">
                                                    <input type="hidden" name="orderid" id ="order_id" >    
                                                    <input type="hidden" name="userid" value="<?php echo $user[0]['user_id'];?>" >                                                                         
                                                    <div class="form-body">
                                                         <div class=" form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="email" class="form-control" disabled value="<?php echo $user[0]['user_email']; ?>" required>

                                                            </div>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label class="control-label col-md-3">Name:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="name" class="form-control" disabled value="<?php echo $user[0]['user_name']; ?>" required>

                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Mobile:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" name="mobile" class="form-control"  placeholder="Enter Mobile Number" required>
                                                               </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Transaction Type:</label>
                                                            <div class="col-md-9">
                                                                <select name="tType" class="form-control" list="tType" autocomplete="off" id="tType" required>
                                                                    <option  >
                                                                      Select
                                                                   </option>
                                                                   <option value="1" >
                                                                      Alfa Wallet
                                                                   </option>
                                                                   <option value="2" >
                                                                      Alfa Bank Account
                                                                   </option>
                                                                   <option value="4" >
                                                                      Other Bank Account
                                                                   </option>
                                                                </select> </div>
                                                        </div>
                                                         <div class="form-group" id="AccountNo" >
                                                            <label class="control-label col-md-3">Account No:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" name="accountno" class="form-control"  placeholder="account no" required>
                                                               </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Contry:</label>
                                                            <div class="col-md-9">
                                                                <select name="country" class="form-control" list="stime" autocomplete="off" id="country" required>
                                                                    <option  >
                                                                      Select
                                                                   </option>
                                                                   <option value="164" >
                                                                      Pakistan
                                                                   </option>
                                                                   
                                                                </select> </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Currency:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" name="currency" class="form-control" disabled value="PKR" required>
                                                               </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Ammount:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" class="tamount" id="tamount" name="tamount" class="form-control" disabled   required>
                                                               </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" type="submit">Continue</button>
                                                    </div>
                                                </form>




                                                <form action="" class="form-horizontal form-bordered" method="POST" id="otpconfirm" style="display: none;">

                                              
                                                    <div class="form-body">
                                                         <div class=" form-group">
                                                            <label class="control-label col-md-3">OTP:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="otp" class="form-control"  value="" placeholder="Enter OTP" required>
                                                                <input type="hidden" id="otphash" name="otphash" class="form-control"  value="" placeholder="Enter OTP" required>


                                                            </div>
                                                        </div>
                                                    </div>
                                                      
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary" type="submit">Submit OTP</button>
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
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="loader"></div>
        <div class="loader-txt">
          <p>We are working on your Request<br><br><small>Please Wait</small></p>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>