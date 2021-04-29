

<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header bg-light">
				<h3 class="card-title">Borrower Detailed</h3>
			</div>
			<div class="card-body">

				<table id="borrower-table" class="table  table-sm display nowrap" style="table-layout: fixed;">
					<thead class="bg-light text-center">
						<th>#</th>
						<th>Borrower ID</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Suffix</th>
						<th>Middle Name</th>
						<th>Date of Birth</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Nationality</th>
						<th>Contact</th>
						<th>Address</th>
						<th>Occupation</th>
					</thead>
						<tbody class="text-center">
							<?php $i=1;?>
							<?php foreach($detail as $d) {?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $d->ref_id ?></td>
								<td><?php echo ucwords($d->lname) ?></td>
								<td><?php echo ucwords($d->fname) ?></td>
								<td><?php echo ucwords($d->suffix) ?></td>
								<td><?php echo ucwords($d->mname) ?></td>
								<td><?php echo $d->dob?></td>
								<td><?php echo ucwords($d->gender) ?></td>
								<td><?php echo ucwords($d->status) ?></td>
								<td><?php echo ucwords($d->nationality) ?></td>
								<td><?php echo $d->contact ?></td>
								<td><?php echo ucwords($d->address) ?></td>
								<td><?php echo ucwords($d->occupation) ?></td>
							</tr>
							<?php $i++; ?>
							<?php }?>
						</tbody>

				</table>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$('#borrower-table').dataTable({
			"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
			"scrollY": 200,
        	"scrollX": true,
			

			dom: 'lBfrtip',
		      buttons: [
		            'copy', 'csv', 'excel',
		            {
		            	extend: 'print', footer: true,
    					title:'<div style="text-align:center;"><h4>OCCCI Loan System</h4></div><div style="text-align:center;font-size:15px;"><br />Borrower Detailed Summary<br /><br /></div>'
      
		            }
		        ],	        	  
		});
	})

</script>