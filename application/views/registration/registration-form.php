<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Simple Registration Form</title>

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
	/*background: #d4d4d4;*/
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
    <form id="form" role="form">
		<h2>Members Registration</h2>
		<p class="hint-text">Personal Information</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="mname" placeholder="Middle Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="lname" placeholder="Last Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="suffix" placeholder="Suffix Optional" required="required"></div>


			</div> 
        </div>

        <div class="form-group">
        	<div class="row">
        	<div class="col"><input type="date" class="form-control" name="dob" placeholder="Birthdate" required="required"></div>
        	<div class="col">
        		<select class="form-control" name="gender">
        			<option value="male">Male</option>
        			<option value="female">Female</option>
        		</select>

        	</div>
        	<div class="col">
        		<select class="form-control" name="status">
        			<option value="single">Single</option>
        			<option value="married">Married</option>
        			<option value="separated">Separated</option>
        			<option value="widow">Widow</option>
        		</select>

        	</div>
        </div>
        </div>
	

		<div class="form-group">
           <div class="row">
				<div class="col"><input type="text" class="form-control" name="nationality" placeholder="Nationality" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="contact" placeholder="Contact" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="occupation" placeholder="Occupation" required="required"></div>
			</div> 
        </div>  

        <div class="form-group">
        	<input type="text" class="form-control" name="address" placeholder="Address" required="required">
        </div>
       

    
		<div class="form-group">
            <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit" onclick="add_borrower()">
        </div>
    </form>
	
</div>
</div>
</body>
</html>

<script type="text/javascript">
	
function add_borrower()
{
	var DataString= $("#form").serialize();
	// alert(DataString);
	           
            $.ajax({
           url: "<?php echo base_url(); ?>borrower/insert_borrower",
           type: "post",
           data:DataString ,
           success: function(data) {
           	alert(data);
		}
	})
}

	



function clear_form_elements(ele) {

    $(ele).find(':input').each(function() {
        switch(this.type) {
            case 'fname':
            case 'mname':
            case 'lname':
            case 'suffix':
            case 'dob':
            case 'contact':
            case 'address':
            case 'nationality':
            case 'occupation':
            $('#message').html('');
                $(this).val('');
                break;
            
        }
    });

}
</script>