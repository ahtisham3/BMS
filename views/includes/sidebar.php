<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('dashboard')?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Building</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('createbuilding')?>">
              <i class="bi bi-circle"> </i><span> Create Building</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url('getbuildingdetails')?>">
              <i class="bi bi-circle"></i><span>Manage Building </span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Floor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('createfloor')?>">
              <i class="bi bi-circle"></i><span>Create Floor</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('getfloordetails')?>">
              <i class="bi bi-circle"></i><span>Maintance Floor</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Appartemtns</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('createappartment')?>">
              <i class="bi bi-circle"></i><span>Create Appartments</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('getappartmentdetails')?>">
              <i class="bi bi-circle"></i><span>Maintane Appartemtns</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav-ser" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Service</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-ser" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('createservice')?>">
              <i class="bi bi-circle"></i><span>Add Services </span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('getservicedetails')?>">
              <i class="bi bi-circle"></i><span>Maintance Services </span>
            </a>
          </li>  
        </ul>
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('createcustomer')?>">
              <i class="bi bi-circle"></i><span>Create Customer</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('getcustomerdetails')?>">
              <i class="bi bi-circle"></i><span>Maintain Customer</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Billing</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="<?php echo  base_url('BillingReport/BillingReportController/finalizeUtilities')?>">
              <i class="bi bi-circle"></i><span>Finalize Bill</span>
            </a>
          </li> 
          <li>
            <a href="<?php echo  base_url('getbillingreportdetails')?>">
              <i class="bi bi-circle"></i><span>Pending Bills</span>
            </a>
          </li> 
        </ul>
      </li><!-- End Icons Nav -->
    </ul>
  </aside><!-- End Sidebar-->
