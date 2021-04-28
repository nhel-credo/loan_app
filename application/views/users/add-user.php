<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Registration Form</title>

<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 75%;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
	<div class="content-wrapper">

<div class="signup-form">
    <form action="" method="post" id="form" role="form">
		<h2>Register User</h2>
		<p class="hint-text">Personal Information.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="middlename" placeholder="Middle Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>

			</div>        	
        </div>
        
	

	  

        <div class="form-group">
        	<div class="row">
        	<div class="col"><input type="text" class="form-control" name="contact" placeholder="Contact" required="required"></div>
        	<div class="col"><input type="text" class="form-control" name="address" placeholder="Address" required="required"></div>
        </div>
    </div>
   
<p class="hint-text">Account Information.</p>

 <div class="form-group">
 	<div class="row">

       <div class="col"><input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required"><span style="" id="err_message"></span>
   </div>




   <div class="col">
        <input type="password" id="password" class="form-control" name="password1" onchange="onChange()" placeholder="Password" required="required">
   </div>
</div>
</div>



<div class="form-group">
	<div class="row">
   <div class="col">
        <input type="password" id="confirm_password" class="form-control" name="password2" placeholder="Re-Enter Password" required="required"><label class="text"><span class="" id='message'></span></label>
</div>
      
   <div class="col">
    
            <select class="form-control" placeholder="role" name="role">
            	<option value="admin">Admin</option>
            	<option value="cashier">Cashier</option>
            	<option value="accountant">Accountant</option>


            </select>
               </div>
           </div>
           </div>
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <input type="submit" name="save" id="save"  class="btn btn-success btn-lg btn-block" value="Register" onclick="check_email_exist()" >
        </div>


    </form>
    
   
	</div>

</div>






<script type="text/javascript">



 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val(); 


           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>user/check_email",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#err_message').html(data);  

                     }  
                });  
           }
           else
           {
           	$('#err_message').html('');
           } 
           
      });  
 }); 






	$('#password, #confirm_password').on('keyup', function ()
	{
  		if ($('#password').val() == $('#confirm_password').val()) 
  		{
    $('#message').html('Matched').css('color', '#5cb85c');
  		} 
  else 
    {
    $('#message').html('Password Not Match').css('color', '#d9534f');
    }

    if($('#password').val()==''&& $('#confirm_password').val()=='')
    {
    	$('#message').html('');
    }


});

function if_email_exist()
{
	
	var email = $('#email').val(); 
	 $.ajax({  
                     url:"<?php echo base_url(); ?>user/if_email_exist",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                       if(data==1)
                       {
                       	err_email();
                       } 
                       else
                       {
                       	err_email();
                       }                      
                     }
                     
                });  
}

	

 $(document).ready(function() {
   $("#form").submit(function(event) {
       event.preventDefault();
       var DataString= $("#form").serialize();
            
       if ($('#password').val() == $('#confirm_password').val()) 
  		{
    	
    		if_email_exist();
  		}
  		else
  		{
  			
  			show_error();
  			
  		}
   });
});


function err_email()
{
		 Swal.fire({
  icon: 'error',
  title: 'Email Exist!',
  text: 'Try another email',
  })
}


function show_error()
{
	 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Password not Matched!',
  })
}

//inserting data
function insert_user(DataString)
{
	  $.ajax({
           url: "<?php echo base_url(); ?>user/insert_user",
           type: "post",
           data:DataString ,
           success: function(data) {


    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

   
      Toast.fire({
        icon: 'success',
        title: 'Registered Successfully!'
      })
  clear_form_elements('#form');
 

           }
       });
}



function clear_form_elements(ele) {

    $(ele).find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'text':
            case 'email':
            $('#message').html('');
                $(this).val('');
                break;
            
        }
    });

}



function if_email_exist(DataString){
  var email = $('#email').val(); 

                $.ajax({  
                     url:"<?php echo base_url(); ?>user/if_email_exist",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          alert(data);
                     } 

                });  
           

}
</script>



</body>
</html>



