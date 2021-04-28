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
	width: 100%;
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
.modal-lg{
	width: 900px !important;
}
p{
	color: #636363;
}
</style>
</head>
<body>
	



<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Loan Form</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Loan Form</h2>
		<p class="hint-text">Loan Information</p>
		  <div class="form-group">
			<div class="row">
				<div class="col"><p class="">Loan Type:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Description:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				
			</div>        	
        </div>

        <div class="form-group">
			<div class="row">
				
				<div class="col"><p class="">Loan Purpose:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Loan Amount:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
			</div>        	
        </div>

        <div class="form-group">
			<div class="row">
				<div class="col"><p class="">Interest Rate:<span>(% per Annum)</span></p><input type="number" min="0" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Payment Plan:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Payment Date:<span>(date of the month)</span></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>

				</div>        	
        </div>

          <div class="form-group">
			<div class="row">
				<div class="col"><p class="">Release Date:</p><input type="date" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Effective Date:</p><input type="date" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Penalty Rate:<span>(%)</span></p><input type="number" class="form-control" min="0" name="mname" placeholder="" required="required">
				</div>

				</div>        	
        </div>

		
      <h6 class="text-center">Deductions</h6>
   		<div class="form-group">
			<div class="row">
				<div class="col"><p class="">Name:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Reference:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Amount:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>

				</div>

				<div class="row">
				<div class="col"><p class=""></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class=""></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class=""></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>

				</div>   

					<div class="row">
				<div class="col"><p class=""></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class=""></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class=""></p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>

				</div>     	
        </div>


        <h6 class="text-center">References</h6>
   		<div class="form-group">
			<div class="row">
				<div class="col"><p class="">Co-Maker 1:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Contact:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
			

				</div>
		     	
        </div>

				<div class="form-group">
			<div class="row">
				<div class="col"><p class="">Co-Maker 2:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				<div class="col"><p class="">Contact:</p><input type="text" class="form-control" name="mname" placeholder="" required="required">
				</div>
				
			</div>
				</div>

		<div class="form-group">
			<div class="row">				
				<div class="col"><p class="">Collateral:</p><textarea class="form-control" rows="3" id="comment"></textarea>
				</div>
				<div class="col"><p class="">Comment:</p><textarea class="form-control" rows="3" id="comment"></textarea>
				</div>
			</div>
		</div>
				  

	
		

				<div class="form-group text-center">
			<div class="row">
				<div class="col"><button class="btn btn-lg btn-success btn-block ">Apply</button>
				</div>
				
				
			</div>
				</div>

    </form>
	

</div>

    </div>

  </div>
</div>



</body>
</html>