<!-- insert modal -->
<div class="modal" tabindex="-1" role="dialog" id="mymodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 700px;">
      <div class="modal-header">
        <h5 class="modal-title text-dark">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="form" role="form" enctype="multipart/form-data">
   
    <p class="text-secondary">Personal Information</p>
        <div class="form-group">
      <div class="row">
        <div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
        <div class="col"><input type="text" class="form-control" name="middlename" placeholder="Middle Name" required="required"></div>
        <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>

      </div>          
        </div>
        
  
        <div class="form-group">
          <div class="row">
          <div class="col"><input type="tel" maxlength="11" pattern="[0-9]{11}" class="form-control" name="contact" placeholder="11-digits Mobile Number" required="required"></div>
          <div class="col"><input type="text" class="form-control" name="address" placeholder="Address" required="required"></div>
        </div>
    </div>
   
<p class="text-secondary">Account Information</p>

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
        <input type="password" id="confirm_password" class="form-control" name="password2" placeholder="Re-Enter Password" required="required"><h6 class="text"><span  id='message'></span></h6>
</div>
      
   <div class="col">
    
            <select class="form-control" placeholder="role" name="role">
              <option value="Admin">Admin</option>
              <option value="Staff">Staff</option>
            </select>
               </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group small clearfix">
            <label  class="form-check-label text-secondary"><input id="show-password" type="checkbox"> Show password</label>
            
        </div> 
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col">
                <label class="control-label text-dark">Profile Image</label><br>
                <img src="" id="img" alt="your image"><br>
                <input class="text-secondary" type="file" name="user_image" id="user_image" onchange="preview(this)">
              </div>
            </div>
          </div>

      </div>

        <div class="modal-footer">
         <button type="submit" name="save" class="btn btn-primary"  id="save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
 </form>

    </div>
  </div>
</div>





<!-- edit modal -->
<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 700px;">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Update User Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="post" id="edit-form"  role="form" enctype="multipart/form-data">
   
    <!-- id hidden -->
    <input type="hidden" class="form-control" id="id" name="user-id" >
    <!--  -->
    <p class="text-dark text-md">Personal Information.</p><br>
        <div class="form-group">
      <div class="row">
     

        <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">FirstName</h6><input type="text" class="form-control" id="fname" name="update-fname" placeholder="First Name" required="required"></div>

        <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">MiddleName</h6><input type="text" class="form-control" id="mname" name="update-mname" placeholder="Middle Name" required="required"></div>
        <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">LastName</h6><input type="text" class="form-control" id="lname" name="update-lname" placeholder="Last Name" required="required"></div>

      </div>          
        </div>
        
  
        <div class="form-group">
          <div class="row">
          <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Contact</h6><input type="tel" maxlength="11" pattern="[0-9]{11}" class="form-control" id="contact" name="update-contact" placeholder="11 Digits Mobile Number" required="required"></div>
          <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Address</h6><input type="text" class="form-control" id="address" name="update-address" placeholder="Address" required="required"></div>
        </div>
    </div>
   
<p class="text-dark text-md">Account Information.</p><br>

 <div class="form-group">
  <div class="row">

       <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Email</h6><input type="email" class="form-control" id="update-email" name="email" placeholder="Email" required="required"><span style="" id="err_message"></span>
   </div>


   <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Current Password</h6>
        <input type="password" id="current-password" class="form-control" name="update-password" onchange="onChange()" placeholder="Current Password" required="required">
   </div>
</div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group small clearfix">
            <label  class="form-check-label text-secondary pull-right"><input id="show-pass" type="checkbox"> Show password</label>
            
        </div> 
  </div>
</div>


<div class="form-group">
  <div class="row">
   
      
   <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">User Type:</h6>
    
            <select class="form-control" placeholder="role" name="update-role" id="role">
              <option value="Admin">Admin</option>
              <option value="Staff">Staff</option>
              <!-- <option value="accountant">Accountant</option> -->


            </select>
               </div>
           </div>
  </div>
  <div class="form-group">
  <div class="row">
    <div class="col">
                <label class="control-label text-dark">Update Profile Image</label><br>
                <img src="" id="img_url" alt="your image"><br>
                <input class="text-secondary" type="file" name="update_user_image" id="update_user_image" onchange="img_pathUrl(this)">
              </div>
            </div>
          </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-md">Save changes</button>
         <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
      </div>
    

    </form>

      </div>
      
    </div>
  </div>
</div>

<!-- end edit modal -->
	
		
		<button id="add_user" class=" btn btn-info pull-right btn-sm" style="margin:15px;"><span class="fas fa-plus-square" style="margin: 5px;"></span>Add User</button>
	

<div class="content-wrapper">
<!-- <h1>Users</h1> -->
	<div class="container">

		
		<div class="bg-white container" style="padding: 10px;">
			<table id="user_table" class="table table-stripped table-hover ">
				<thead class="table-info">

				<th class="text-center">#</th>
        <th class="text-center">Image</th>
				<th>Details</th>
				<th class="text-center">Email</th>
				
				<th class="text-center">Role</th>
        <th class="text-center">Registered on</th>
				<th class="text-center">Controls</th>
			</thead>

				<?php $i=1; ?>
				<?php  foreach ($data as $row) { ?>
				<!-- <?php var_dump($data) ?> -->
				<?php $id= $row->id ?>
					<tr>

						<td class="text-center align-center"><strong><?php echo $i ?></strong></td>
            <td><a target="_blank" href="<?php echo base_url().'upload/'.$row->image?>"><img src="<?php echo base_url().'upload/'.$row->image?>"  class="img-thumbnail .img" width="90" /></a></td>
						<td><p>Name: <strong class="text-sm"><?php echo ucfirst($row->firstname).' '.ucfirst($row->middlename).' '.ucfirst($row->lastname)?></strong></p>
                <p>Contact: <strong class="text-sm"><?php echo ucfirst($row->contact); ?></strong></p>
                <p>Address: <strong class="text-sm"><?php echo ucfirst($row->address) ?></strong></p>
          </td>
						<td class="text-center align-center"><?php echo $row->email?></td>
						
						<td class="text-center align-center"><?php echo $row->role?></td>
            <td class="text-center align-center"><?php echo $row->registered_on?></td>
						<td class="align-center">
							<div class="text-center">
								<!-- <button class="btn btn-info btn-sm"><a class="fas fa-search text-white info_modal_btn" data-toggle="tooltip"
								 data-placement="left" title="View Records"></a></button> -->
								<button  class="btn btn-info btn-sm update-user" data-id="<?php echo $row->id?>"><a class="fas fa-edit text-white " data-toggle="tooltip"  name="edit" title="Edit"></a></button>
								<button class="btn btn-danger btn-sm delete-user" data-id="<?php echo $row->id?>"><a class="fas fa-trash-alt text-white" data-toggle="tooltip" data-placement="top" title="Remove" ></a></button>


							</div>
						</td>
					</tr>
					<?php $i++; ?>
				<?php }  ?>
			</table>
		</div>
	</div>


</div>

<script type="text/javascript">

  $('#show-password').click(function(){
  if(document.getElementById('show-password').checked) {
    $('#password').get(0).type = 'text';
    $('#confirm_password').get(0).type = 'text';
  } else {
      $('#password').get(0).type = 'password';
      $('#confirm_password').get(0).type = 'password';
  }
});

    $('#show-pass').click(function(){
  if(document.getElementById('show-pass').checked) {
    $('#current-password').get(0).type = 'text';
    
  } else {
      $('#current-password').get(0).type = 'password';
      
  }
});

  $('#user_table').DataTable({});

	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

//on add_user modal
	$(document).ready(function(){
		$("#add_user").on("click", function(){
			$("#mymodal").modal("show");
		})
	})

//delete user
  $('#user_table').on('click','.delete-user',function(e){
    e.preventDefault();

      Swal.fire({
  title: 'Are you sure?',
  text: "You want to delete this?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',

}).then((result) => {
  if (result.isConfirmed) {
    delete_user();
    Swal.fire(
      'Deleted!',
      'Record has been deleted.',
      'success'
    )
  }
})
  })

  function delete_user()
  {
    var userid = $('.delete-user').data('id');      
      $.ajax({
        url:'<?php echo base_url();?>user/delete_user',
        type:'post',
        data:{userid:userid},
        
        success:function(data){
              
           location.reload(); 
            
        },
        error:function(err){
          alert(err);
        }
      })
  }


 //update-user
              $('#user_table').on('click','.update-user',function(){
                   
                    var userid = $(this).data('id');
 
                    // AJAX request
                    $.ajax({
                        url: '<?php echo base_url(); ?>user/getuserby_id',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            // // Add response in Modal body
                            // $('.modal-body').html(response); 
 							          var employees = JSON.parse(response);  
                       		  
                       
                       		for (var i = 0; i < employees.length; i++) { 
                       			var id=employees[i].id;
                       			var fname=employees[i].firstname;
                       			var mname=employees[i].middlename;
                       			var lname=employees[i].lastname;
                       			var contact=employees[i].contact;
                       			var address=employees[i].address;
                       			var email=employees[i].email;
                       			var password=employees[i].password;
                       			var role=employees[i].role;
                            var img=employees[i].image;
                            var location="<?php echo base_url().'upload/'?>"+img;

                              //setting data values
                       			
                       			$('#edit-modal').modal('show');
                       			$('#fname').val(fname);
                       			$('#mname').val(mname);
                       			$('#lname').val(lname);
                       			$('#contact').val(contact);
                       			$('#address').val(address);
                       			$('#update-email').val(email);
                       			$('#current-password').val(password);
                       			$('#role').val(role);
                       			$('#id').val(id);
                            $('#img_url').attr("src",location);

                       		}
                            
                       }

                    });
                });


$(document).on('submit','#edit-form',function(e){
  e.preventDefault(); 

  
   var extension = $('#update_user_image').val().split('.').pop().toLowerCase();  
   
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
           {  
                alert("Invalid Image File");  
                $('#user_image').val('');  
                return false;  
           } 

    var string=new FormData(this);           
    
    $.ajax({
      url:'<?php echo base_url()?>user/onsave_update',
      type:'post',
      data:string,
      contentType:false,  
      processData:false,
      success:function(data){
        
      alert_success();
      setTimeout(function(){
           location.reload(); 
      }, 1000);

      },
      error:function(err){
        alert(err);
      }

    }) 
   
  });
           
//insert//
 $(document).on('submit','#form',function(e){
  e.preventDefault();       
            
  if ($('#password').val() == $('#confirm_password').val()) 
  		{
   
    var extension = $('#user_image').val().split('.').pop().toLowerCase();  
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
           {  
                alert("Invalid Image File");  
                $('#user_image').val('');  
                return false;  
           } 
    var string=new FormData(this);           
    
    $.ajax({
      url:'<?php echo base_url()?>user/insert_user',
      type:'post',
      data:string,
      contentType:false,  
      processData:false,
      success:function(data){
        $('#mymodal').modal('hide');
      alert_success();
      setTimeout(function(){
           location.reload(); 
      }, 1000);

      },
      error:function(err){
        alert(err);
      }

    })
 
  		}
  else
  		{
  			
  			show_error();
  			
  		}
  });

 function alert_success(){
  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });

   
      Toast.fire({
        icon: 'success',
        title: 'Successful!'
      })
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


function show_error()
{
	 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Password not Matched!',
  })
}

//preview image
function img_pathUrl(input){
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
function preview(input){
        $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

</script>



<style>
body {
	color: #fff;
	background: #63738a;
	
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color:#66b7de;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 55%;
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
.signup-form  .signup-form  {
	content: "";
	height: 2px;
	width: 30%;
	background:#ffffff;
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

.img {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 150px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

.align-center{
  vertical-align: middle !important;
}
p{
  margin: unset;
}

#img {
  background: #ddd;
  width:100px;
  height: 90px;
  display: block;
}
#img_url {
  background: #ddd;
  width:100px;
  height: 90px;
  display: block;
}


</style>
</head>