<head <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">

  
</head>
<?php 


  if($this->session->flashdata('err_msg')!=Null)
  {

    $err_msg=$this->session->flashdata('err_msg');
    
  }else{
      $err_msg="";
  }
?>

<body onload="noBack()">
<div class="container-fluid">
<div class="card">
  <div class="card-body">

<div class="login-form">    

    <form action="<?php echo base_url()?>login/user_login" method="post" id="login-form">
    <div class="avatar"><i class="material-icons fas fa-user"></i></div>
      <h4 class="modal-title">Login to Your Account</h4>
     
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username/email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">           
        </div>

            <div class="from-group">
             
             <?php 
             echo $err_msg;
            ?>
         
           </div>
          
        <div class="form-group small clearfix">
            <label  class="form-check-label"><input id="show-password" type="checkbox">show password</label>

            <a href="#" class="forgot-link">Forgot Password?</a>
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg login" value="Login">
          <!-- <?php  
                echo '<label class="text-danger text-xs">'.$this->session->flashdata("error").'</label>';  
             ?>  -->              
    </form>     
    <div class="text-center small">Don't have an account? <a href="#">Sign up</a></div>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
window.history.forward();

  $('').submit(function(){
    $.ajax({
      url:"",
      type:"post",
      data:$('#login-form').serialize(),
      success:function(data){
        alert(data);
      },
      error:function(err)
      {
        alert(err);
      }
    })
  })


  $('#show-password').click(function(){
  if(document.getElementById('show-password').checked) {
    $('#password').get(0).type = 'text';
  } else {
      $('#password').get(0).type = 'password';
  }
});



  // noBack();
  //   window.onload = noBack;
  //   window.onpageshow = function (evt) { if (evt.persisted) noBack(); }
  // function preventBack() { window.history.forward(); }
  // setTimeout("preventBack()", 0);
  //   window.onunload = function () { null };
  //  function noBack() { window.history.forward(); }

$('.alert').alert();
</script>

<style>
body .card{
  color: #999;
  background:#d7d7dc9e;
  font-family: 'Varela Round', sans-serif;
}
.form-control {
  box-shadow: none;
  border-color: #ddd;
}
.form-control:focus {
  border-color:#007bff8f; 
}
.login-form {
  width: 350px;
  margin: 0 auto;
  padding: 30px 0;
}
.login-form form {
  color: #434343;
  border-radius: 1px;
  margin-bottom: 15px;
  background: #fff;
  border: 1px solid #f3f3f3;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 30px;
}
.login-form h4 {
  text-align: center;
  font-size: 22px;
  margin-bottom: 20px;
}
.login-form .avatar {
  color: #fff;
  margin: 0 auto 30px;
  text-align: center;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  z-index: 9;
  background:#007bff8f;
  padding: 15px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar i {
  font-size: 62px;
}
.login-form .form-group {
  margin-bottom: 20px;
}
.login-form .form-control, .login-form .btn {
  min-height: 40px;
  border-radius: 2px; 
  transition: all 0.5s;
}
.login-form .close {
  position: absolute;
  top: 15px;
  right: 15px;
}
.login-form .btn, .login-form .btn:active {
  background:#007bff8f !important;
  border: none;
  line-height: normal;
}
.login-form .btn:hover, .login-form .btn:focus {
  background:#007bffe8 !important;
}
.login-form .checkbox-inline {
  float: left;
}
.login-form input[type="checkbox"] {
  position: relative;
  top: 2px;
}
.login-form .forgot-link {
  float: right;
}
.login-form .small {
  font-size: 13px;
}
.login-form a {
  color:#007bff8f;
}
</style>

