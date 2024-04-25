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
                                <div class="col-md-12">
                                    <?php if(!$userPackages)
                                    {?>
                                        <div class="text-center" id="apT">
                                       <p>Your Currently not subscribed to any package....<button id="addPackage" class="btn btn-primary">Subscribe Now</button></p>
                                            
                                        </div>
                                    <?php } 
                                    else{
                                        ?>
                                     <table class="table table-bordered table-striped table-condensed">
                                        <thead class="bg-red" id="package-table">
                                            <tr>
                                                <th width="20%">Invoice No</th>
                                                <th width="20%">package_period</th>
                                                <th>startDate</th>
                                                <th width="20%">endDate</th>
                                                <th width="20%">paymentConfirmation </th>
                                                <th width="20%">paymentPrice</th>
                                                <th width="20%">Activation Status</th>
                                                <th width="40%">Action</th>

                                                <!-- <th width="10%">Price</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($userPackages as $list){
                                                if($list['package_period']=='M') $list['package_period'] = 'Montly';
                                                elseif ($list['package_period']=='Y') $list['package_period'] ='Yearly';
                                                else $list['package_period'] ='Trial';

                                                if($list['paymentConfirmation']=='0')$list['paymentConfirmation']='Pending'; else $list['paymentConfirmation'] ="Paid";
                                                if($list['status']=='0' || $list['status']=='2' ) $status="Not Activated"; else if($list['status']=='3') $status='DeActivated'; else $status='Activated';                                                        
                                                ?>
                                                <tr>
                                                    <td><?php echo $list['order_id']; ?></td>
                                                    <td><?php echo $list['package_period']; ?></td>
                                                    <td><?php echo $list['startDate']; ?></td>
                                                    <td><?php echo $list['endDate']; ?></td>
                                                    <td><?php echo $list['paymentConfirmation']; ?></td>
                                                    <td><?php echo $list['paymentPrice']; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <?php if($list['status']=='2'){?>
                                                    <td><a href=""  class="">Request Was Sent</a></td>

                                                    <?php } 
                                                    else if($list['status']=='1')
                                                    {?>
                                                         <td><a href=""  class="">Activated</a></td>
                                                    <?php }
                                                     else if($list['status']=='3')
                                                    {?>
                                                         <td><a href=""  class="">De Activated</a></td>
                                                    <?php }
                                                    else {?>
                                                    <td><a href="<?php echo base_url('confirmPayment/'.$list['order_id']) ?>"  class="btn btn-primary btn-xs">Pay Now</a><a href="<?php echo base_url('editPackage/'.$list['id']) ?>"  class="btn btn-primary btn-xs">Edit</a></td>
                                                <?php }?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php }?>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-8" id="pf" style="display: none;">
                                    <h2>Apply Your Package</h2>
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet light form-fit ">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url('addNewPackageT');?>" class="form-horizontal form-bordered" method="POST"  >
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Current Package:</label>
                                                            <div class="col-md-9">
                                                               <input type="text" name="currentpackage" class="form-control" disabled value="<?php echo $subType; ?>" required>
                                                               </div>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label class="control-label col-md-3">Name:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="username" class="form-control" disabled value="<?php echo $user[0]['user_name']; ?>" required>
                                                                <input type="hidden" name="user_id" class="form-control"  value="<?php echo $user[0]['user_id']; ?>" required>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Select Package:</label>
                                                            <div class="col-md-9">
                                                                <select name="package_id" class="form-control" list="sPackage" autocomplete="off" id="spackageType" required>
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
                                                                <select name="package_period" class="form-control" list="stime" autocomplete="off" id="stime" required>
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
                                                                <input type="date" name="startDate" class="form-control" id="sstart" value="<?= date('Y-m-d'); ?>"  required readonly>
                                                                <!-- <input type="date" name="startDate" class="form-control" id="sstart" value="<?php echo $user[0]['expiry']; ?>"  required readonly > -->
                                                    
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">End Date:</label>
                                                            <div class="col-md-9">
                                                                <input type="date" name="endDate" class="form-control" id="edate" value=""  required readonly >
                                                    
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Price</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="paymentPrice" id="pprice" class="form-control" required readonly>
                                                                <input type="hidden" name="order_id" >
                                                            </div>
                                                        </div>
                                                      

                                                    </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Continue to Payment</button>
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
    $(document).ready(function(){
        let x = Math.floor(Math.random() * (1000 + 1) + 1);
        var order_id = "PosssT"+x;
$("input[name='order_id']").val(order_id);

    });
     $('#spackageType').change(function(){
    var s= $('#spackageType option:selected').attr('price');
      $('#pprice').val(s);

// console.log(jQueryArray);
 });
      $('#stime').change(function(){
        if(this.value=='M')
        {
              var newDate = addDays(30);
              var month = newDate.getMonth() + 1;
              var date = newDate.getDate();
              var endDate = newDate.getFullYear()+'-'+(month<=9 ? '0' + month : month) +'-'+(date<=9 ? '0' + date : date);
              $('#edate').val(endDate);
              var tem = $('#spackageType option:selected').attr('price');

              var fina= tem * 1;
              $('#pprice').val(fina);

        }
        else{

               var newDate = addDays(365);
              var month = newDate.getMonth() + 1;
                 var date = newDate.getDate();
              var endDate = newDate.getFullYear()+'-'+(month<=9 ? '0' + month : month)+'-'+(date<=9 ? '0' + date : date);
              $('#edate').val(endDate);
              var tem = $('#spackageType option:selected').attr('price');
              var fina= tem * 12;
              $('#pprice').val(fina);

        }        
    });
      function addDays(days) {
  var result = new Date();
  result.setDate(result.getDate() + days);
  return result;


}
  $('#addPackage').click('click',function()
  {
    $('#apT').hide();
    $('#pf').show();
    // apT
    // package-table
    // pf
  });

</script>