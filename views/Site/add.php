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
                            <h1>Add Site</h1>
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
                                <a href="<?php echo base_url('sites');?>">Site List</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add Site</span>
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
                                                <form action="<?php echo base_url('new-site');?>" class="form-horizontal form-bordered" method="POST">
                                                   

                                                    <!-- <div class="form-group">
                                                        <label class="control-label col-md-3">Doctor:</label>
                                                        <div class="col-md-9">
                                                        <input type="text" id="select-doctor-name" class="form-control" list="doctorsList" placeholder="Enter doctor name" required="" autocomplete="off">
                                                        <input type="hidden" name="doctor" id="select-doctor-id">

                                                        <datalist id="doctorsList">
                                                        <?php foreach($doctors as $doctor){ ?>
                                                        <option data-value="<?php echo $doctor['doctor_id'];?>"><?php echo $doctor['doctor_name'];?></option>
                                                        <?php } ?>
                                                        </datalist>
                                                        </div>
                                                    </div>
                                                     -->
                                                   
                                                   <div class="form-group">
                                                        <label class="col-md-3 control-label">Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Enter first name" name="name" required="" id="patient-fname">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Enter last name" name="address" required="" id="patient-lname">
                                                        </div>
                                                    </div>  
                                                     <div class="form-group">
                                                        <label class="control-label col-md-3">Phone</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" id="mask_phone" name="phone" type="text" /> 
                                                    </div>
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                         <label class="control-label col-md-3">Select Client:</label>
                                                                <div class="col-md-9">
                                                                        <select name="Client" class="form-control" list="ClientList" placeholder="Enter Client" autocomplete="off"> 
                                                                                <option value="-1">Select Client</option>
                                                                                                      
                                                                                    <?php foreach($Clients as $client){ ?>
                                                                                            <option  value="<?php echo $client['C_Id'];?>" ><?php echo $client['Name'];?></option>
                                                                                    <?php } ?>
                                                                         </select>
                                                                </div>
                                                     </div>
                                                </div>
                                                    <div class="form-actions right">
                                                        <button class="btn btn-primary right">Add Site</button>
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