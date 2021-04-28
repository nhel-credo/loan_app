
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header bg-light">
				<h3 class="card-title">Summary</h3>
			</div>
			<div class="card-body">

				<table id="summary-table" class="display nowrap" style="width:100%">
					<thead class="bg-light text-center">
						<th>#</th>
						<th>LN</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Suffix</th>
						<th>MI</th>
						<th>Loan Amount</th>
						<th>Loan Period</th>
						<th>Interest Rate</th>
						<th>Terms</th>
						<th>Active Balance</th>
						<th>Total Payments</th>
					</thead>
					<tbody class="text-center">
						<?php $i=1; ?>
						<?php foreach($summary_data as $sd) {?>
						<?php 
						$total_balance=$sd->total_balance;
						$term=$sd->plan;
						$date_released=date('m/d/Y',strtotime($sd->date_released));
						$term=$sd->plan;
						$maturity= date('m/d/Y',strtotime($date_released.'+'.$term.' month'));
		 ?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $sd->loan_id?></td>
								<td><?php echo ucwords($sd->lname) ?></td>
								<td><?php echo ucwords($sd->fname)?></td>
								<td><?php echo ucwords($sd->suffix)?></td>
								<td><?php echo ucwords(substr($sd->mname,0,1))?></td>
								<td><?php echo number_format($sd->amount,2)?></td>
								<td><?php echo $date_released." - ".$maturity?></td>
								<td><?php echo $sd->interest_rate.'%'?></td>
								<td><?php echo $term.' mons.'?></td>
								<td><?php 
										if($total_balance<1){
											$total_balance=0;
										}
									   echo number_format($total_balance,2)?></td>

								<td><?php echo number_format($sd->total_payment,2)?></td>

							</tr>
						<?php $i++?>
						<?php }?>
					</tbody>					

				</table>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#summary-table').dataTable({
			"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
			"scrollY": 200,
        	"scrollX": true,
			dom: 'lBfrtip',
		      buttons: [
		            'copy', 'csv', 'excel',
		            {
		            	extend: 'print', footer: true,
    					title:'<div style="text-align:center;"><h4>OCCCI Loan System</h4></div><div style="text-align:center;font-size:15px;"><br />Active Loan Summary<br /><br /></div>'
      

		            }
		        ],		


        	  
		});
	})
</script>