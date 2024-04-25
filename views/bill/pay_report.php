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
                                        <h1>Invoice list
                                            <!-- <small>Add new Items</small> -->
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
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
                                            <span>Invoices</span>
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
                                                            <span class="caption-subject bold uppercase">All Invoices</span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="all">Invoice #</th>
                                                                    <th class="all">D C #</th>
                                                                    <th class="all">Company name</th>
                                                                    <th class="all">orderd By</th>
                                                                    <th class="all">Date</th>

                                                                </tr>
                                                            </thead>
                                                           <tbody>
                                                                 
                                                        <?php foreach($Invoices as $Invoice) { ?>
                                                                <tr>
                                                                    <td>   <?php echo "ZTINV -"."18- " . sprintf('%04d', $Invoice['Inv_Number']);?>                                                                </td>
                                                                   <td> <?php echo "ZTDC -"."18- " . sprintf('%04d', $Invoice['DID']);?></td>
                                                                    <td><?php echo $Invoice['cname'];?></td>
                                                                    <td> <?php echo $Invoice['orderBy'];?></td>
                                                                     <td><?php echo $Invoice['co'];?></td> 
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