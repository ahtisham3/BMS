


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
                            <h1>Admin</h1>
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
                                <span>Admin Dashboard/All Users</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                     <table class="table table-bordered table-striped table-condensed">
                                        <thead class="bg-blue" id="package-table">
                                            <tr>
                                                <th width="10%">User Id</th>
                                                <th width="10%">User Name</th>
                                                <th width="20%">User Email</th>
                                                 
        

                                                <!-- <th width="10%">Price</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                            foreach($allUsers as $list){
                                                                                           
                                                ?>
                                                <tr>
                                                    <td><?php echo $list['user_id']; ?></td>
                                                    <td><?php echo $list['user_name']; ?></td>
                                                     <td><?php echo $list['user_email']; ?></td>
                                                  
                                                
                                                </tr>
                                               
                                              
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
