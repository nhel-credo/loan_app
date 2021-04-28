
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header bg-light">
				<h3 class="card-title">Active Loans</h3>
			</div>
			<div class="card-body">
				<table id="active-loans-table" class="table">
					<thead class="bg-light">
						<th>#</th>
						<th>Borrower Name</th>
						<th>Loan</th>
						<th>Loan Amount</th>
						<th>Next Payment Date</th>
						<th>Balance</th>
					</thead>
					<tbody class="">
						<?php $i=1;?>
						<?php foreach($active_loans as $al){?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo ucwords($al->lname.', '.$al->fname.' '.substr($al->mname, 0,1).'. '.$al->suffix)?></td>
							<td><?php echo ucwords($al->loan_type)?></td>
							<td><?php echo number_format($al->amount,2)?></td>
							<td><?php echo date('m-d-Y',strtotime($al->next_payment))?></td>
							<td><?php echo number_format($al->total_balance,2)?></td>
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
		$('#active-loans-table').dataTable();
	})
</script>