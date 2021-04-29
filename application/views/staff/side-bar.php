
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

          <?php
          $home="";
          $borrower="";
          $approval="";
          $active_loan="";
          $plan="";
          $type="";
          $deduction="";
          $summary="";
          $summary_menu="";
          $active_loan_summary="";
          $monthly_summary="";
          $borrower_detailed="";
              switch ($this->uri->segment(2)) {
                case 'home_controller':                 
                    $home="active";                  
                  break;
                case 'borrower':
                  $borrower="active";
                  break;
                case 'active_loans':
                  $active_loan="active";
                  break;
                case 'process_controller':
                  $approval="active";
                  break;
                case 'plan':
                  $plan="active";
                  break;
                case 'loan':
                  $type="active";
                  break;
                case 'deduction':
                  $deduction="active";
                  break;
                case 'summary':
                  $summary_menu="menu-is-opening menu-open";
                  if($this->uri->segment(3)=="active_loan_summary")
                        {
                          $active_loan_summary="active";
                        }
                  else if($this->uri->segment(3)=="monthly_summary")
                        {
                          $monthly_summary="active";
                        }
                  else if($this->uri->segment(3)=="borrower_detailed")
                        {
                          $borrower_detailed="active";
                        }
                  break;
                
                default:
                  # code...
                  break;
              }
           ?>


          <li class="nav-item">
            <a href="<?php echo site_url('staff/home_controller') ?>" class="nav-link <?php echo $home;?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>            
          
          
          <li class="nav-header">LOANS</li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/borrower/get_borrower') ?>" class="nav-link <?php echo $borrower ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Borrowers</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo site_url('staff/active_loans/get_all_active') ?>" class="nav-link <?php echo $active_loan ?>">
              <i class="nav-icon fas fa-check-square"></i>
              <p>Active Loans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/process_controller/get_loans_approvals') ?>" class="nav-link <?php echo $approval ?>">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>Loan Approvals</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/plan/get_data')?>" class="nav-link <?php echo $plan ?>">
              <i class="nav-icon fa fa-calendar"></i>
              <p>Loan Plans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('staff/loan/get_loan_type') ?>" class="nav-link <?php echo $type ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Loan Types</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="<?php echo site_url('staff/deduction/get_loan_deductions') ?>" class="nav-link <?php  echo $deduction ?>">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>Deductions</p>
            </a>
          </li>

         <li class="nav-item <?php echo $summary_menu ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-text"></i>
              <p>Summary
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
            <a href="<?php echo site_url('staff/summary/active_loan_summary') ?>" class="nav-link <?php echo $active_loan_summary ?>">           
              <p style="text-indent:20px;">Active Loans Summary</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
             <li class="nav-item">
            <a href="<?php echo site_url('staff/summary/monthly_summary') ?>" class="nav-link <?php echo $monthly_summary ?>">           
              <p style="text-indent:20px;">Payments Summary</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
             <li class="nav-item">
            <a href="<?php echo site_url('staff/summary/borrower_detailed') ?>" class="nav-link <?php echo $borrower_detailed ?>">           
              <p style="text-indent:20px;">Borrower Detailed</p>
            </a>
          </li>
        </ul>

          </li>


          
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
