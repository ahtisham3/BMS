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
                            <h1>Edit Site</h1>
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
                                <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url('sites');?>">Site list</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Edit Site</span>
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
                                                <form action="<?php echo base_url('update-site');?>" class="form-horizontal form-bordered" method="POST">
                                                    <div class="form-body">

                                                        <input type="hidden" name="id" value="<?php echo $detail[0]['S_Id'];?>"> 

                                                     <div class="form-group">
                                                        <label class="col-md-3 control-label">Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Enter first name" name="name" required="" id="patient-fname" value="<?php echo $detail[0]['Name'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Enter last name" name="address" required="" id="patient-lname" value="<?php echo $detail[0]['Address'];?>">
                                                        </div>
                                                    </div>  
                                                     
                                                     <div class="form-group">
                                                        <label class="control-label col-md-3">Phone</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" id="mask_phone" name="phone" type="text" / value="<?php echo $detail[0]['Number'];?>"> 
                                                        </div>
                                                     </div>

                                                     <div class="form-group">
                                                         <label class="control-label col-md-3">Select Client:</label>
                                                            <div class="col-md-9">
                                                                 <select name="Client" class="form-control" list="ClientList" placeholder="Enter Client" autocomplete="off"> 
                                                                 <option value="<?php echo $detail[0]['C_Id'];?>"><?php echo $detail[0]['CName'];?></option>
                                                                        <?php foreach($Clients as $client){ ?>
                                                                            <option  value="<?php echo $client['C_Id'];?>" ><?php echo $client['Name'];?></option>
                                                                        <?php } ?>
                                                                 </select>
                                                            </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Status</label>
                                                        
                                                        <div class="col-md-9">
                                                              <div class="btn-group  yesno " data-toggle="buttons">
                                                                  <?php 
                                                                if ($detail[0]['status'] == 1) 
                                                                {
                                                                    echo '<div class="btn btn-success active" role="button" aria-pressed="false">
                                                                  <input class="btn-success" type="radio" name="Status" value="1" required="required" checked="checked">Active
                                                                </div>
                                                                        ' ;
                                
                                                                }
                                                                else
                                                                {
                                                                        echo '<div class="btn btn-secondary" role="button" aria-pressed="false">
                                                                            <input class="btn-success" type="radio" name="Status" value="1" required="required">Active
                                                                            </div>';
                                                                }
                                                                ?>
                                                               <?php 
                                                                if ($detail[0]['status'] == 1) 
                                                                { 
                                                                        echo '<div class="btn btn-secondary" role="button" aria-pressed="false">
                                                                            <input class="btn-success" type="radio" name="Status" value="0" required="required">InActive
                                                                            </div>';
                                                                }
                                                                else
                                                                {
                                                                        echo '<div class="btn btn-success active" role="button" aria-pressed="false">
                                                                  <input class="btn-success" type="radio" name="Status" value="0" required="required" checked="checked">InActive
                                                                </div>' ;
                                                                }
                                                                ?>

                                                                </div>
                                                                </div>
                                                                </div>


                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary">Update</button>
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