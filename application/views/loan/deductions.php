<!-- Update Modal -->
<div id="mymodal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Loan Deductions Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form  id="update-form">
					
		<div class="form-group">
			<input type="hidden" id="id" name="id">
			<label class="control-label">Deductions</label>
				<input type="text" name="update_deductions_name" id="update_deductions_name" class="form-control">
		</div>
		<div class="form-group">
			<label class="control-label">Amount</label>
				<input type="number" name="update_amount" id="update_amount" class="form-control">
		</div>
     </div>
       <div class="modal-footer">
        <button id="update_borrower" type="submit" class="btn btn-primary" onclick="on_save_changes()">Save changes</button>
         </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
 </div>
</div>
</div>

<div class="content-wrapper" style="padding:5px;">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form  id="manage-loan-deductions"  enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						   Loan Deductions Details
				  	</div>
					<div class="card-body">
							
							<div class="form-group">
								<label class="control-label">Deductions</label>
								<input type="text" name="deductions_name" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">Amount</label>
								<input type="number" name="amount" class="form-control">
							</div>
						
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-sm btn-primary col-sm-3 offset-md-3" name="submit"> Save</button>
								<button class="btn btn-sm btn-secondary col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table id="loan-deductions" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Deductions Details</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $i=1; ?>
                <?php  foreach ($data as $row) { ?>
                
                    <tr>

                        <td class="text-center align-center"><?php echo $i ?></td>
                        
                        <td>
                        	<p>Deductions: <strong><?php echo $row->deductions_name?></strong></p>
                        	<p>Amount: <strong class="text-sm"> <?php echo $row->amount?></strong></p>
                        </td>
                       
                         
                        
                        <td class="align-center">
                            <div class="text-center">
                                
                                <button  class="btn btn-info btn-sm  update-btn" data-id="<?php echo $row->id?>"><a class="fas fa-edit text-white"  data-toggle="tooltip"  name="edit" title="Edit" ></a></button>

                                <button class="btn btn-secondary btn-sm delete" data-id="<?php echo $row->id?>"><a class="fas fa-trash-alt text-white" data-toggle="tooltip" data-placement="top" title="Remove"></a></button>

                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php }  ?>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#loan-deductions').DataTable({});

//update
		$('#loan-deductions').on('click','.update-btn',function(){		
		var id= $(this).data('id');
		on_update(id);		
	})

//delete
$('#loan-deductions').on('click','.delete',function(){
	var id= $(this).data('id');
	Swal.fire({
  title: 'Confirm!',
  text: "You want to delete this record?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',

}).then((result) => {
  if (result.isConfirmed) {
    delete_type(id);
    Swal.fire(
      'Deleted!',
      'Record has been deleted.',
      'success'
    )
    reload();
  }
	})
})

function delete_type(id)
  {     
     
      $.ajax({
        url:'<?php echo base_url();?>deduction/delete_deductions',
        type:'post',
        data:{id:id},
        
        success:function(data){
          
        },
        error:function(err){
          alert(err);
        }
      })
  }


});

	function on_update(id)
	{
		$.ajax({
			url:'<?php echo base_url()?>deduction/getby_id',
			type:'post',
			data:{id:id},
			success:function(response){
				var data=JSON.parse(response);
				  for (var i = 0; i < data.length; i++){ 

                      $('#id').val(data[i].id);
                      $('#update_deductions_name').val(data[i].deductions_name);
                      $('#update_amount').val(data[i].amount);
                      $('#mymodal').modal('show');
                 }

			}
		})
		
	}

	function on_save_changes(){
		var DataString=$('#update-form').serialize();
		$.ajax({
			url:'<?php echo base_url()?>deduction/on_save_changes',
			type:'post',
			data:DataString,
			success:function(data){
				alert_success();
				reload();
			}
		})

	}



	function _reset()
	{
		$('#deduction').val("");
		$('#amount').val("");

	}

	
$(document).on('submit','#manage-loan-deductions',function(e){
	e.preventDefault();

    var string=$('#manage-loan-deductions').serialize();         
   	
		$.ajax({
			url:'<?php echo base_url()?>deduction/insert',
			type:'post',
			data:string,
			
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
	})

function reload(){
	setTimeout(function(){
           location.reload(); 
      }, 1000);
}

 function alert_success(){
  var Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer:5000
    });
   
      Toast.fire({
        icon: 'success',
        title: 'Success!'
      })
 }
	

</script>

<style type="text/css">
.align-center{
	vertical-align: middle !important;
}
p{
	margin: unset;
}
</style>