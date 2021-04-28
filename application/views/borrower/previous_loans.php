<!-- loan details -->
<div class="modal" id="details-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Loan Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!--ledger modal  -->
<!-- Ledger -->
<div class="modal fade" id="ledger-modal"  role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
   
        <div class="row">
          <div class="col"> <p class="text-center">Loan Ledger</p></div>
                 
        </div>
        
        <!-- <div class="row">
          <div class="col"> <p class="">Loan No. :</p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Name: </p></div>
          <div class="col"> <p class="">Term: </p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Address: </p></div>
          <div class="col"> <p class="">Loan Amount:</p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Release Date: </p></div>
          <div class="col"> <p class="">Maturity: </p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Kind of Loan: </p></div>                    
        </div><br> -->
       
          
          <table class="table table-bordered text-center table-sm" ">
            <thead class="text-center text-sm thead-light">
              <th>#</th>
              <th>Date</th>
              <th>Principal</th>
              <th>Interest</th>
              <th>Penalty/charges</th>
              <th>Total Payment</th>
              <th>Balance</th>
            </thead>
            <tbody id="ledger-tbody">
            	
            </tbody>
                     
          </table>                    
        </div>       
      </div>
     <!--  <div class="modal-footer">      
        <button type="button" class=" btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>




<!-- my previous loans -->

<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header bg-light">
				<h3 class="card-title">My Previous Loans</h3>
			</div>
			<div class="card-body">
				<table id="active-loans-table" class="table">
					<thead class="bg-light">
						<th>#</th>
						<th>Reference No.</th>
						<th>Loan</th>
						<th>Description</th>
						<th>Loan Amount</th>
						<th>Term</th>
						<td>Action</td>						
						
					</thead>
					<tbody class="">
						<?php $i=1;?>
						<?php foreach($active_loans as $al){?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $al->loan_id?></td>
							<td><?php echo ucwords($al->loan_type)?></td>
							<td><?php echo ucwords($al->description)?></td>
							<td><?php echo number_format($al->amount,2)?></td>						
							<td><?php echo $al->plan.' mons at '.$al->interest_rate.'%'?></td>
							<td>
								 <div class="text-center">
                                <button   class="btn-width btn btn-info btn-sm ledger" data-id="<?php echo $al->loan_id?>"><a class=" text-white info_modal_btn" data-toggle="tooltip"
                                 data-placement="left" title="View Ledger"></a>Ledger</button>

                               <!--  <button  class="btn-width btn btn-warning btn-sm details" data-id="<?php echo $al->loan_id?>"><a class=" text-white"  data-toggle="tooltip"  name="edit" title="Details" ></a>Details</button> -->

                               

                            </div>
							</td>
									
						
						</tr>
						<?php $i++;?>
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var table=$('#active-loans-table').dataTable();	


	table.on('click','.ledger',function(){			
		var loan_id=$(this).data('id');
		$.ajax({
			url:"<?php echo base_url()?>borrower_controller/get_ledger",
			type:"post",
			data:{loan_id:loan_id},
			success:function(response){	

			var obj = $.parseJSON(response);

			var trHTML = '';
			var i=1;
			$.each(obj, function (i, o){
				var bal=o.balance;

				i++;
  trHTML += '<tr><td>' + i +
            '</td><td>' + o.date_created +
            '</td><td>' + o.principal +
            '</td><td>' + o.interest +
            '</td><td>' + o.penalties +
            '</td><td>' + o.total_payment +
            '</td><td>' + bal +
            '</td></tr>';
});

			$('#ledger-tbody').html('').append(trHTML);
            $('#ledger-modal').modal('show');

			},
			error:function(err)
			{
				alert(err);
			}
		})
	});

	$('.details').click(function(){
		$('#details-modal').modal('show');
	})


});
</script>