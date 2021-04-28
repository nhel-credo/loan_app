
<body>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>  <a href="" class="brand-link">
     <!--  <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Loan System</span>
    </a> </center>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
          $image=$this->session->userdata['user_info'][0]->image;
           ?>
          <img src="<?php echo base_url().'upload/'.$image?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php
          $fname=$this->session->userdata['user_info'][0]->firstname;
          $lname=$this->session->userdata['user_info'][0]->lastname;
          $role=$this->session->userdata['user_info'][0]->role;
          ?>
          <a href="#" class="d-block"><?php echo ucwords($fname.' '.$lname.'('.$role.')') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('staff/home_controller') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

          <!-- <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-v "></i>
              <p>
                Membership
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('registration_form') ?>" class="nav-link">
                 
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <p>Member List</p>
                </a>
              </li>
              
              
                
            </ul>
          </li> -->
          
                
          
          
          
          <li class="nav-header">LOANS</li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/borrower/get_borrower') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Borrowers</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo site_url('staff/active_loans/get_all_active') ?>" class="nav-link">
              <i class="nav-icon fas fa-check-square"></i>
              <p>Active Loans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/process_controller/get_loans_approvals') ?>" class="nav-link">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>Loan Approvals</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/plan/get_data')?>" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>Loan Plans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/loan/get_loan_type') ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Loan Types</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="<?php echo site_url('staff/deduction/get_loan_deductions') ?>" class="nav-link">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>Deductions</p>
            </a>
          </li>

         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Summary</p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
            <a href="<?php echo site_url('staff/summary/active_loan_summary') ?>" class="nav-link">           
              <p style="text-indent:20px;">Active Loans Summary</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
             <li class="nav-item">
            <a href="" class="nav-link">           
              <p style="text-indent:20px;">Monthly Summary</p>
            </a>
          </li>
        </ul>

          </li>


         <!--  <li class="nav-header">USER ACCOUNTS</li>
         
           <li class="nav-item">
            <a href="<?php echo site_url('user/get_user') ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
             <p>User List</p>
            </a>
          </li> -->
          



          
           <li class="nav-item">
            <a href="<?php echo site_url('Login/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p class="text">Logout</p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</body>
