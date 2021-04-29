
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
            <a href="<?php echo site_url('home_controller') ?>" class="nav-link <?php if($this->uri->segment(1)=="home_controller"){ echo 'active'; }?>" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>

                Dashboard
                
              </p>
            </a>
          </li>


         <?php 
                $open_menu="";
                $summary_menu="";
                $borrower="";
                $loan="";
                $approval="";
                $plan="";
                $type="";
                $deductions="";
                $loan_summary="";
                $monthly_summary="";
                $borrower_detailed="";
                $user="";

              switch ($this->uri->segment(1)) {

                case 'borrower':
                  $open_menu="menu-is-opening menu-open";  
                   if($this->uri->segment(2)=="get_borrower")
                    {
                      $borrower="active";
                    }                
                  break;

                case 'active_loans':
                  $open_menu="menu-is-opening menu-open"; 
                   if($this->uri->segment(2)=="get_all_active")
                    {
                      $loan="active";
                    }                 
                  break;

                case 'process_controller':
                  $open_menu="menu-is-opening menu-open"; 
                   if($this->uri->segment(2)=="get_loans")
                    {
                      $approval="active";
                    }                 
                  break;


                case 'plan':
                  $open_menu="menu-is-opening menu-open"; 
                   if($this->uri->segment(2)=="get_data")
                    {
                      $plan="active";
                    }                 
                  break;


                case 'loan':
                  $open_menu="menu-is-opening menu-open"; 
                   if($this->uri->segment(2)=="get_loan_type")
                    {
                      $type="active";
                    }                 
                  break;


                case 'deduction':
                  $open_menu="menu-is-opening menu-open"; 
                   if($this->uri->segment(2)=="get_loan_deductions")
                    {
                      $deductions="active";
                    }                 
                  break;


                  case 'summary':
                  $summary_menu="menu-is-opening menu-open"; 
                   if($this->uri->segment(2)=="active_loan_summary")
                    {
                      $loan_summary="active";
                    }
                    else if($this->uri->segment(2)=="borrower_detailed") 
                      {
                        $borrower_detailed="active";
                      }  
                    else if($this->uri->segment(2)=="monthly_summary")
                      {
                        $monthly_summary="active";
                      }            
                  break;

                  case 'user':                 
                   if($this->uri->segment(2)=="get_user")
                    {
                      $user="active";
                    }                 
                  break;

                
               
             }
               

         ?>

          <li class="nav-item <?php echo $open_menu ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-v "></i>
              <p>
                LOANS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

             

             <li class="nav-item">
            <a href="<?php echo site_url('borrower/get_borrower') ?>" class="nav-link <?php echo $borrower ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Borrowers</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?php echo site_url('active_loans/get_all_active') ?>" class="nav-link <?php echo $loan?> ">
              <i class="nav-icon fas fa-check-square"></i>
              <p>Active Loans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('process_controller/get_loans') ?>" class="nav-link <?php echo $approval ?>">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>Loan Approvals</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('plan/get_data')?>" class="nav-link <?php echo $plan ?>">
              <i class="nav-icon fa fa-calendar"></i>
              <p>Loan Plans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('loan/get_loan_type') ?>" class="nav-link <?php echo $type?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Loan Types</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="<?php echo site_url('deduction/get_loan_deductions') ?>" class="nav-link <?php echo $deductions?>">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>Deductions</p>
            </a>
          </li>            
              
                
            </ul>
          </li> 

          <li class="nav-item <?php echo $summary_menu ?>">
            <a href="#" class="nav-link text-indent">
            <i class="nav-icon fas fa-file-text "></i>
              <p>
                 SUMMARY
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <!-- submenus -->
            <li class="nav-item">
              <a href="<?php echo site_url('summary/active_loan_summary') ?>" class="nav-link <?php echo $loan_summary;?>">   
                <p style="text-indent:20px;">Active Loans Summary</p>
              </a>
            </li>

               <li class="nav-item">
            <a href="<?php echo site_url('summary/monthly_summary') ?>" class="nav-link <?php echo $monthly_summary;?>">           
              <p style="text-indent:20px;">Payment Summary</p>
            </a>
               </li>

               <li class="nav-item">
            <a href="<?php echo site_url('summary/borrower_detailed') ?>" class="nav-link <?php echo $borrower_detailed ?>">       
              <p style="text-indent:20px;">Borrower Detailed</p>
            </a>
              </li>

            </ul>
          </li>
          
           



          
          <li class="nav-header">USER ACCOUNTS</li>
         
           <li class="nav-item">
            <a href="<?php echo site_url('user/get_user') ?>" class="nav-link <?php echo $user ?>">
              <i class="nav-icon fas fa-list"></i>
             <p>User List</p>
            </a>
          </li>
          



          
           <li class="nav-item">
            <a href="<?php echo site_url('Login/logout') ?>" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p class="text">Logout</p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



<script type="text/javascript">
  $(document).ready(function(){

  // Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
});
</script>