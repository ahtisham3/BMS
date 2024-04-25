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
                                        <h1>Pay records 
                                            <!-- <small>Add new Employee</small> -->
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                                        <div class="btn-group btn-theme-panel">
                                            <a href="<?php echo base_url('pay');?>" class="btn btn-primary">
                                                Genrate Pay
                                            </a>
                                        </div>
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>



                        <div class="row">
                            <div class="col-md-12">
                               <!--  <div class="note note-info">
                                    <p> NOTE: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>
                                </div> -->
                                <!-- Begin: life time stats -->
                                <div class="portlet light portlet-fit portlet-datatable bordered">
                                    <div class="portlet-title">
                                        <!-- <div class="caption">
                                            <i class="icon-settings font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase"> Order Listing </span>
                                        </div> -->
                                        <div class="actions">
                                           <!--  <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent green btn-outline btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent blue btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div> -->

                                           <!--  <div class="btn-group">
                                                <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                    <i class="fa fa-share"></i>
                                                    <span class="hidden-xs"> Tools </span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;"> Export to Excel </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Export to CSV </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Export to XML </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;"> Print  </a>
                                                    </li>
                                                </ul>
                                            </div> -->

                                            <div class="btn-group">
                                                <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                    <i class="fa fa-share"></i>
                                                    <span class="hidden-xs"> Tools </span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right" id="datatable_ajax_tools">
                                                    <li>
                                                        <a href="javascript:;" data-action="0" class="tool-action">
                                                            <i class="icon-printer"></i> Print</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" data-action="1" class="tool-action">
                                                            <i class="icon-check"></i> Copy</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" data-action="2" class="tool-action">
                                                            <i class="icon-doc"></i> PDF</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" data-action="3" class="tool-action">
                                                            <i class="icon-paper-clip"></i> Excel</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" data-action="4" class="tool-action">
                                                            <i class="icon-cloud-upload"></i> CSV</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;" data-action="5" class="tool-action">
                                                            <i class="icon-refresh"></i> Reload</a>
                                                    </li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container">
                                           <!--  <div class="table-actions-wrapper">
                                                <span> </span>
                                                <select class="table-group-action-input form-control input-inline input-small input-sm">
                                                    <option value="">Select...</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Cancel">Hold</option>
                                                    <option value="Cancel">On Hold</option>
                                                    <option value="Close">Close</option>
                                                </select>
                                                <button class="btn btn-sm btn-default table-group-action-submit">
                                                    <i class="fa fa-check"></i> Submit</button>
                                            </div> -->
                                            
                                            <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_orders">
                                                
                                                <thead>

                                                    <tr role="row" class="heading"> 
                                                        <th width="10%"> Employee Name </th>
                                                        <th width="8%">  Payment&nbsp;# </th>
                                                        <th width="20%"> Genrated&nbsp;On </th>
                                                        <th width="10%"> Paid&nbsp;Price </th>
                                                        <th width="10%" class="hidden-print"> Status </th>
                                                        <th width="10%" class="hidden-print"> Action </th>
                                                    </tr>
                                                    <tr role="row" class="filter">
                                                        <td>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_customer_name"> </td>
                                                            
                                                        <td>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_id"> </td>
                                                        
                                                       <td>
                                                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                                <input type="text" id="pay_date_from" class="form-control form-filter input-sm"  readonly  name="order_date_from" placeholder="From">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                                <input type="text" id="pay_date_to" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>   
                                                                </span>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <!-- <input type="text" class="form-control form-filter input-sm" name="order_ship_to"> </td> -->
                                                           <td>
                                                            <select name="status" class="form-control form-filter input-sm">
                                                                <option value="-1">Select...</option>
                                                                <option value="1">Active</option>
                                                                <option value="2">Deleted</option>
                                                             </select>
                                                        </td>
                                                        <td class="hidden-print">
                                                            <div class="margin-bottom-5">
                                                                <button class="btn btn-sm btn-success filter-submit margin-bottom">
                                                                    <i class="fa fa-search"></i> Search</button>
                                                            </div>
                                                            <button class="btn btn-sm btn-default filter-cancel">
                                                                <i class="fa fa-times"></i> Reset</button>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>              

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <!-- End: life time stats -->
                            </div>
                            </div>



                            </div>
                            </div>
                            </div>
                            </div>


     <!--        <div id="myModalprocedure" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
               <!--  <div class="modal-content">
                    <div class="modal-header">
                        <a href="#" class="close">&times;</a>
                         <h3>Delete Payment</h3>
                    </div>
                    <div class="modal-body">
                        <p>You are about to delete this Payment, this action is irreversible.</p>
                        <p>Do you want to proceed?</p>                    
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn danger" id="delete_procedure">Yes</a>                        
                        <a href="#" data-dismiss="modal" class="btn secondary">No</a>
                    </div>
                </div>

              </div>
            </div> --> 
