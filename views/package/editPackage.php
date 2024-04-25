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
 if($userPackages[0]['package_period']=='M')
 {
    $m="selected";
    $y='';
 } 
 else {
    $y="selected";
    $m=''; 
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
                            <h1>Edit Package</h1>
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
                                <span>Edit Package</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                           
                            <div class="row">
                                <div class="col-md-8" id="pf">
                                    <h2>Edit Your Package</h2>
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet light form-fit ">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url('editPackagedb/').$userPackages[0]['id'];?>" class="form-horizontal form-bordered" method="POST"  >
                                                    <div class="form-body">
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
                                                                   <?php foreach ($packages as $pack) {
                                                                    if($userPackages[0]['package_id']==$pack['package_id']) $p="selected"; else $p='';
                                                                    ?>

                                                                        <option value=" <?php echo $pack['package_id']; ?>" price="<?php echo $pack['package_price']; ?>" <?php echo $p; ?> >
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
                                                                   <option value="M" <?php echo $m; ?>>
                                                                      Monthly
                                                                   </option>
                                                                   <option value = "Y" <?php echo $y; ?>>
                                                                      Yearly
                                                                   </option>
                                                                </select> </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Start Date:</label>
                                                            <div class="col-md-9">
                                                                <!-- <input type="date" name="startDate" class="form-control" id="sstart" value="<?= date('Y-m-d'); ?>"  required> -->
                                                                <input type="date" name="startDate" class="form-control" id="sstart" value="<?php echo $userPackages[0]['startDate']; ?>"  required>
                                                    
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">End Date:</label>
                                                            <div class="col-md-9">
                                                                <input type="date" name="endDate" class="form-control" id="edate" value="<?php echo $userPackages[0]['endDate']; ?>"  required>
                                                    
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Price</i>:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="paymentPrice" id="pprice" class="form-control" value="<?php echo $userPackages[0]['paymentPrice'] ?>" readonly  required>
                                                                <input type="hidden" name="order_id" value="<?php echo $userPackages[0]['order_id'] ?>" >
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
//     $(document).ready(function(){
//         let x = Math.floor(Math.random() * (1000 + 1) + 1);
//         var order_id = "PosssT"+x;
// $("input[name='order_id']").val(order_id);

//     });
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
        else if(this.value=='Y'){

               var newDate = addDays(365);
              var month = newDate.getMonth() + 1;
                 var date = newDate.getDate();
              var endDate = newDate.getFullYear()+'-'+(month<=9 ? '0' + month : month)+'-'+(date<=9 ? '0' + date : date);
              $('#edate').val(endDate);
              var tem = $('#spackageType option:selected').attr('price');
              var fina= tem * 12;
              $('#pprice').val(fina);

        } 
        else{

              $('#edate').val('');
            
              $('#pprice').val('');
        }       
    });
      function addDays(days) {
  var result = new Date();
  result.setDate(result.getDate() + days);
  return result;


}
  

</script>