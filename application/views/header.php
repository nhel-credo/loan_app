<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="300000" url="<?php echo base_url('login/logout')?>">
  <title>LOAN SYSTEM</title>

<style type="text/css">

  .active
  {
    background:#0a6ed9a1 !important;
  }
  .content-wrapper
    {
      background:#afafb1 !important;
      padding: 5px;
    }
  body
  {
      font-size: .875rem!important;
  }
  .main-header{
    background: #007bff !important;
    color:white;
  }
  .card{
    background-color: rgb(241 241 241) !important;
  }
  .brand-link{
    background: #007bff !important;
  }
  .nav-link{
    color:white !important;
  }
  [class*=sidebar-dark-] .sidebar a {
    color: #ffffff !important;
}

</style>
  
   <!-- chosen -->
 <!--   <link href="<?php echo base_url(); ?>assets/js/chosen.min.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/js/chosen.css" rel="stylesheet">
    -->

    <!-- datatable buttons -->
   <link href="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">


<!-- select2 -->
   <link href="<?php echo base_url(); ?>assets/select2/dist/css/select2.min.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/select2/dist/css/select2.css" rel="stylesheet">
   
   <!-- bootstrap select -->
   <link href="<?php echo base_url(); ?>assets/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">

 
<!-- bootstrap -->
   <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

 <!-- dataTables -->
  <link href="<?php echo base_url(); ?>assets/datatables/datatables.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/datatables/datatables.min.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro --> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- jQuery -->
  <!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


  <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>



  <!-- sweetalert2 -->
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css">

  <!-- toaster -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.css">
  <!--  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
 -->


<!-- dataTables -->
<script src="<?php echo base_url(); ?>assets/datatables/datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/datatables.min.js"></script>

<!-- buttons -->
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/js/3.1.3-jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/js/0.1.53-pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.7.0/js/0.1.53-vfs_fonts.js"></script>








<!-- chosen -->
<!-- <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>
 -->
<!-- Select2-->
<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.full.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.min.js"></script>

<!-- bootstrap select -->
<script src="<?php echo base_url(); ?>assets/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- popper js -->
<script src="<?php echo base_url(); ?>assets/plugins/popper/popper.js"></script>

<!-- canvasjs chart -->
<script src="<?php echo base_url(); ?>assets/canvasjs/canvasjs.min.js"></script>



 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
</head>