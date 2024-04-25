<body class="page-container-bg-solid">
    <div style="height: 20px; width: 100%; background-color: #a2d5d3;">
        <center>
            <?php  if($user[0]['Subscription_type']=='M')  $user[0]['Subscription_type'] ="Montly"; elseif($user[0]['Subscription_type']=='Y') $user[0]['Subscription_type'] ="Yearly"; else $user[0]['Subscription_type'] ="Trial"; ?>
             <p style="margin:0px !important">You are Currently Subscribed to <?php echo $user[0]['Subscription_type']; ?> subscription</p>
        </center>
      
    </div>
    <div class="page-wrapper">
        <div class="page-wrapper-row">
            <div class="page-wrapper-top">
                <!-- BEGIN HEADER -->
                <div class="page-header">
                    <!-- BEGIN HEADER TOP -->
                    <div class="page-header-top" style="background-color: #000;">
                        <div class="container ">
                            <!-- BEGIN LOGO -->
                            <div class="page-logo mt-5 ">
                                <a href="<?php echo base_url('dashboard'); ?>">
                                    <h2><span><img src="<?php echo base_url('inc/img/logo_slow.png'); ?>" width="32px"> <?php echo $user[0]['user_BName'];                                                                                   ?><h1></h1></span></h2>                                                                                    
                                </a>
               <!--                  [Subscription_status] => 1
            [Subscription_type] => Trial -->
                            </div>
                            <!-- END LOGO -->
                            <!-- BEGIN TOP NAVIGATION MENU -->
                            <div class="top-menu" style="background-color: #000;">
                                <ul class="nav navbar-nav pull-right">
                                    <li class="dropdown dropdown-user dropdown-dark">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/layouts/layout3/img/avatar2.png">
                                            <span class="username username-hide-mobile"><?php echo $user[0]['user_username'];
                                                                                        ?></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                            <!--  <li>
                                                    <a href="<?php echo base_url('my-profile'); ?>">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>   -->
                                            <li>
                                                <a href="<?php echo base_url('logout'); ?>">
                                                    <i class="icon-key"></i> Log Out </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- END USER LOGIN DROPDOWN -->
                                </ul>
                            </div>
                            <!-- END TOP NAVIGATION MENU -->
                        </div>
                    </div>
                    <!-- END HEADER TOP -->
                </div>
                <!-- END HEADER -->
            </div>

        </div>
      
        <script type="text/javascript">
            var page_title = <?php echo json_encode($page_title); ?>
        </script>