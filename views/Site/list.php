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
                                        <h1>Site list
                                            <small>Add new Site</small>
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                                        <div class="btn-group btn-theme-panel">
                                            <a href="<?php echo base_url('add-site');?>" class="btn btn-primary">
                                                Add Site
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
                                    <ul class="page-breadcrumb breadcrumb">
                                        <li>
                                            <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Sites</span>
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
                                                            <span class="caption-subject bold uppercase">Sites</span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                       
                                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                         
                                                            <thead>
                                                                <tr>
                                                                    <th class="all">S.No</th>
                                                                    <th class="all">Site Name</th>
                                                                    <th class="all">Site Mobile Number</th>
                                                                    <th class="all">Address</th>
                                                                    <th class="all">Edit</th>
                                                                    <th class="all">Status</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                
                                                                <?php $i=0; foreach($site as $the_site){ ?>
                                                                
                                                                <tr>
                                                                    <td><?php $pro = $the_site['S_Id'];echo $i=$i+1; ?></td>
                                                                    <td><?php echo $the_site['Name'] ;?></td>
                                                                    <td><?php echo $the_site['Number'];?></td>
                                                                    <td><?php echo $the_site['Address'];?></td>
                                                                    <td class="text-center"><a href="<?php echo base_url('edit-site/'.$pro);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                                                    <td class="text-center"><a href="#" class="confirm-delete-procedure" ></a> <?php if ($the_site['status'] == 0) {echo  "In Active";} else{echo  "Active";}?></td>
                                                                </tr>
                                                                <?php } ?>                                                         
                                                            </tbody>
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
                        <p>You are about to delete this procedure, this procedure is irreversible.</p>
                        <p>Do you want to proceed?</p>                    
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn danger" id="delete_procedure">Yes</a>                        
                        <a href="#" data-dismiss="modal" class="btn secondary">No</a>
                    </div>
                </div>

              </div>
            </div>