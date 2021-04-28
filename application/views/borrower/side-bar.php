
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
          $fname=$this->session->userdata['user_info'][0]->fname;
          $lname=$this->session->userdata['user_info'][0]->lname;
          $role=$this->session->userdata['user_info'][0]->role;
          $id=$this->session->userdata['user_info'][0]->ref_id;
          ?>
          <a href="#" class="d-block"><?php echo ucwords($fname.' '.$lname." ( ".$role.")")?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

          
          
                
          
          
          
          <li class="nav-header">LOANS</li>
          
           <li class="nav-item">
            <a href="<?php echo site_url('borrower_controller/get_all_active?id=').$id ?>" class="nav-link">
              <i class="nav-icon fas fa-check-square"></i>
              <p>My Active Loans</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('borrower_controller/my_loan_records?id=').$id ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>My Records</p>
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

</body>

  <script type="text/javascript">

 //  var timer = 0;
// function set_interval() {  
//   timer = setInterval("auto_logout()", 10000);
// }

// function reset_interval() {

//   if (timer != 0) {
//     clearInterval(timer);
//     timer = 0;   
//     timer = setInterval("auto_logout()",10000);  
//   }
// }

// function auto_logout() {  
//   window.location = "<?php echo base_url('login')?>";
//     history.pushState(null, null, null);
//     window.addEventListener('popstate', function () {
//         history.pushState(null, null, null);
//     });
// }
    

  </script>