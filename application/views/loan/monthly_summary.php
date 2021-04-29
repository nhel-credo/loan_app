
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header bg-light">
				<h3 class="card-title">Payment Summary</h3>
			</div>
			<div class="card-body">
				<div><label>Date Range</label></div>
				<div>
					<form id="summary-form">
					<label>From: </label><input type="date" name="from" id="from">
					<label>To: </label><input type="date" name="to" id="to">
					<input type="button" name="" value="OK" id="submit">
					</form>
				</div>
				<table id="summary-table" class="display nowrap" style="width:100%">
					<thead class="bg-light text-center">
						<th>#</th>
						<th>Borrower ID</th>
						<th>Last Name</th>
						<th>First Name</th>						
						<th>MI</th>
						<th>Suffix</th>
						<th>Recorded Penalties</th>
						<th>Total Payments Recorded</th>
						
						
					</thead>
					<tbody class="text-center" id="summary-tbody">
						
					</tbody>					

				</table>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">

$(function() {
  $("#summary-table").DataTable({
  	"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
  	"scrollY": 200,
        	"scrollX": true,
			dom: 'lBfrtip',
		      buttons: [
		            'copy', 'csv', 'excel',
		            {
		            	extend: 'print', footer: true,
    					title:'<div style="text-align:center;"><h4>OCCCI Loan System</h4></div><div style="text-align:center;font-size:15px;"><br />Loan Payments Summary<br /><br /></div>'
      

		            }
		        ],
  });

 

  $("#submit").click(function() {
  	var from=$('#from').val();
  	var to=$('#to').val();
   		$.ajax({
   			url:'<?php echo base_url()?>staff/summary/get_payment_summary',
   			type:'post',
   			data:{from:from,to:to},
   			success:function(response){
   				var jsonObject = $.parseJSON(response);    				
   				console.log(jsonObject);

   			//loading response to datatable
   				   $("#summary-table").DataTable().clear();
			        var row = 1;
			        $.each(jsonObject, function (index, value) {
			            $('#summary-table').dataTable().fnAddData( [
			                row,
			                value.ref_id,
			                capitalize(value.lname),
			                capitalize(value.fname),			                
			                capitalize(value.mname),
			                capitalize(value.suffix),
			                formatter.format(value.total_penalties),
			                formatter.format(value.total_payment) 
			              ]);

			           row++;
			        });  				
   				

   				},
	   			error:function(err){
	   				alert(err);
	   				console.log("error: " + JSON.stringify(err));
	   			}	
   		})
  });
});

const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'Php'
});

function capitalize(str) {
  strVal = '';
  str = str.split(' ');
  for (var chr = 0; chr < str.length; chr++) {
    strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' '
  }
  return strVal
}


</script>