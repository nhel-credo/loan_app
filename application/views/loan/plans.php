<!-- update modal -->
<div id="mymodal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Loan Plan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="update-form">
     	<input type="hidden" name="id" id="id">
							<div class="form-group">
								<label class="control-label">Plan (months)</label>
								<input type="number" min="1" name="months" id="months" class="form-control text-left text-md">
							</div>
							<div class="form-group">
								<label class="control-label">Interest Rate</label>
								<div class="input-group">
								  <input type="number" step="any" min="1" max="100" class="form-control text-left text-md" id="interest_percentage" name="interest_percentage" aria-label="Interest">
								  <div class="input-group-append">
								    <span class="input-group-text">%</span>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">OverDue Penalty (monthly)</label>
								<div class="input-group">
								  <input type="number" step="any" min="0" max="100" class="form-control text-md text-left" aria-label="Penalty percentage" name="penalty_rate" id="penalty_rate">
								  <div class="input-group-append">
								    <span class="input-group-text">%</span>
								  </div>
								</div>
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



<div class="content-wrapper" style="padding: 5px;">	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="plan-form">
				<div class="card">
					<div class="card-header">
						   Loan Plan
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Plan (months)</label>
								<input type="number" min="1" name="months" id="months" class="form-control text-left text-md">
							</div>
							<div class="form-group">
								<label class="control-label">Interest Rate</label>
								<div class="input-group">
								  <input type="number" step="any" min="1" max="100" class="form-control text-left text-md" id="interest_percentage" name="interest_percentage" aria-label="Interest">
								  <div class="input-group-append">
								    <span class="input-group-text">%</span>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">OverDue Penalty (monthly)</label>
								<div class="input-group">
								  <input type="number" step="any" min="0" max="100" class="form-control text-md text-left" aria-label="Penalty percentage" name="penalty_rate" id="penalty_rate">
								  <div class="input-group-append">
								    <span class="input-group-text">%</span>
								  </div>
								</div>
							</div>
							
							
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-sm btn-primary col-sm-3 offset-md-3" id="submit"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
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
						<table id="plans-table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Plan</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $i=1; ?>
                			<?php  foreach ($data as $row) { ?>
                
                    <tr>

                        <td class="text-center align-center"><?php echo $i ?></td>
                        <td>
                        	<p>Term: <strong><?php echo $row->term.' mons.'?></strong></p>
                        	<p class="text-sm">Interest Rate: <strong class="text-sm"> <?php echo $row->interest .' %'?></strong></p>
                        	<p class="text-sm">OverDue Penalty : <strong class="text-sm"> <?php echo $row->penalty_rate.' %'?></strong></p>
                        </td>
                       
                         
                        
                        <td class="align-center">
                            <div class="text-center">
                                
                                <button  class="btn btn-warning btn-sm  update-btn" data-id="<?php echo $row->id?>"><a class="fas fa-edit text-white"  data-toggle="tooltip"  name="edit" title="Edit" ></a></button>

                                <button class="btn btn-danger btn-sm delete" data-id="<?php echo $row->id?>"><a class="fas fa-trash-alt text-white" data-toggle="tooltip" data-placement="top" title="Remove"></a></button>

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
	$('#plans-table').DataTable({		
		"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]]
	});

	$('#plans-table').on('click','.update-btn',function(){
		
		var id= $(this).data('id');
		on_update(id);		
	})

//delete
$('#plans-table').on('click','.delete',function(){
	var id= $(this).data('id');
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
    delete_plan(id);
    Swal.fire(
      'Deleted!',
      'Record has been deleted.',
      'success'
    )
    reload();
  }
})
})

function delete_plan(id)
  {     
     
      $.ajax({
        url:'<?php echo base_url();?>plan/delete',
        type:'post',
        data:{id:id},
        
        success:function(data){
          
        },
        error:function(err){
          alert(err);
        }
      })
  }

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
	




	function on_update(id)
	{
		$.ajax({
			url:'<?php echo base_url()?>plan/getby_id',
			type:'post',
			data:{id:id},
			success:function(response){
				var data=JSON.parse(response);
				  for (var i = 0; i < data.length; i++){ 

                      $('#id').val(data[i].id);
                      $('#months').val(data[i].term);
                      $('#interest_percentage').val(data[i].interest);
                      $('#penalty_rate').val(data[i].penalty_rate);
                      $('#mymodal').modal('show');
                 }

			}
		})
		
	}

	function on_save_changes(){
		var DataString=$('#update-form').serialize();
		$.ajax({
			url:'<?php echo base_url()?>plan/on_save_changes',
			type:'post',
			data:DataString,
			success:function(data){
				
				this.reload();
			},
			erro:function(err){
				alert(err);
			}
		})

	}

	function _reset() {
		$('#months').val('');
		$('#interest_percentage').val('');
		$('#penalty_rate').val('');
	}

	$('#submit').click(function(){
		var DataString=$('#plan-form').serialize();
		$.ajax({
			url:'<?php echo base_url()?>plan/insert',
			type:'post',
			data:DataString,
			success:function(data){
				this.reload();
			},
			error:function(err){
				alert(err);
			}
		})
	})

</script>

<style type="text/css">
.align-center{
	vertical-align: middle !important;
}
p{
	margin: unset;
}
</style>