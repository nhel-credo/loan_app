<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Help</a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">About Us</a>
      </li>
    </ul>

 
         <?php
          // $fname=$this->session->userdata['user_info'][0]->firstname;
          // $lname=$this->session->userdata['user_info'][0]->lastname;
          $role=$this->session->userdata['user_info'][0]->role;
          ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?php echo ucwords($role); ?></a>
      </li>
     

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" title="Logout"  href="<?php echo site_url('Login/logout') ?>" role="button">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
