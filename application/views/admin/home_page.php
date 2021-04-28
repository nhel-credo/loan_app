<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!-- #This is for sidebar menu Container -->

<div class="sidebar-container">
  <div class="sidebar-logo">
    Loan System
  </div>
  <ul class="sidebar-navigation">
    <li class="header">Navigation</li>
    <li>
      <a href="<?php echo site_url('Login') ?>">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Membership
      </a>
    </li>
 <!--    <li class="header">LOANS</li> -->
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Loans
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Waiting for Approval
      </a>
    </li>
       <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Reports
      </a>
    <li class="header">Settings</li>
    <li>
      <a href="#">
        <i class="fa fa-info-circle" aria-hidden="true"></i> User Accounts
      </a>
    </li>
      <li>
      <a href="#">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Logout
      </a>
    </li>
  </ul>






</div>


<!-- #Page Content Container -->

<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Navbar example</h1>
      <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
      <p>To see the difference between static and fixed top navbars, just scroll.</p>
     
    </div>

  </div>
</div>

<div class="content-container">

  <div class="container-fluid">

    <!-- Test -->
    <div class="jumbotron">
<?php echo site_url('Login') ?>
<p>test</p>
    </div>

  </div>
</div>


</body>
</html>