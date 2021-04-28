
<!-- Loans Table -->
<div class="content-wrapper">
<div class="container-fluid">
	<br>
		<div class="card">
			<div class="card-header">
				<p class="card-title">LOANS</p>
			</div>
			<div class="card-body bg-light">
				<h6>Filter Table</h6>
				<input onchange="filterme()" type="checkbox" class="name" name="name" value="For Approval" />For Approvals
				<input onchange="filterme()" type="checkbox" class="name" name="name" value="Denied" />Denied
				<input onchange="filterme()" type="checkbox" class="name" name="name" value="Approved" />Approved
				<input onchange="filterme()" type="checkbox" class="name" name="name" value="Released" />Released<br>
					<table class="table table-stripped table-hover" id="loan-table">	

						<thead>
							<th>#</th>
							<th>Borrower ID</th>
							<th>Loan ID</th>
							<th>Borrower</th>
							<th>Loan Details</th>
							<th>Status</th>
							<th width="100">Action</th>
						</thead>
				<?php $i=1; ?>
				<?php foreach ($loan_data as $ld){?>
				
						<tr>
							<input type="hidden" name="" id="borrower_id" value="<?php echo $ld->borrower_id ?>">
							
							<td><?php echo $i?></td>
							<td><?php echo $ld->borrower_id?></td>
							<td><?php echo $ld->loan_id?></td>
							<td>
								
								<p>Name: <b><?php echo ucfirst($ld->lname).', '. ucfirst($ld->fname).' '.substr(ucfirst($ld->mname),0,1).'. '.ucfirst($ld->suffix)?></b></p>
								<p>Contact: <b><?php echo $ld->contact ?></b></p>
								<p>Address: <b><?php echo ucwords($ld->address) ?></b></p>
							</td>

							<td>
								<p>Reference No. <b><?php echo $ld->loan_id ?></b></p>
								<p>Loan Type: <b><?php echo $ld->loan_type ?></b></p>
								<p>Loan Amount: <b><?php echo'&#8369 '.number_format($ld->amount,2) ?></b></p>

								<p data-toggle="collapse" data-target="#demo" class="btn-collapse text-muted">
							    <span class="fas fa-caret-down"></span> show more
							    </p>

							  	<div id="demo" class="collapse">
								<p>Description: <b><?php echo $ld->description ?></b></p>
								<p>Purpose: <b><?php echo ucwords($ld->purpose) ?></b></p>
								<p>Term: <b><?php echo $ld->plan.' mons.' ?></b></p>
								<p>Interest: <b><?php echo $ld->interest_rate.' %' ?></b></p>
								<p>Penalty Rate: <b><?php echo $ld->penalty_rate.' %' ?></b></p>
						
								
								<?php
								
								$tt_payable= ($ld->amount*$ld->interest_rate)/100*$ld->plan+ $ld->amount;
								$monthly= $tt_payable/$ld->plan;
								$penalty= ($monthly*$ld->penalty_rate)/100;
								?>
								<p><u>Total Payable Amount: <b><?php echo '&#8369 '.number_format($tt_payable,2)?></b></u></p>
								<p><u>Monthly Amount: <b><?php echo '&#8369 '.number_format($monthly,2)?></b></u></p>
								<p><u>OverDue Penalty:<b><?php echo '&#8369 '.number_format($penalty,2) ?></b></u></p>
								<p><u>Collateral :<a href="<?php echo base_url().'upload/collateral/'.$ld->image?>"><b><?php echo $ld->collateral?></b></a></u></p>

								<!-- <p id="date_approved"><b>Approval-on: 
									<?php 
									if($ld->date_approved==""){
										echo "N/A";
									}else{
										echo date('m-d-Y',strtotime($ld->date_approved));
									}
									
									 ?></b></p> -->
								<!-- <p id="date_released"><b>Date-Released: 
									<?php
									if($ld->date_released==""){
										echo "N/A";
									}else{
										echo date('m-d-Y',strtotime($ld->date_released));
									}   
									?></b></p> -->

								</div>  

							</td>
							<td><?php echo ucwords($ld->approve_status) ?></td>

							 <td class="align-center">
                            <div class="text-center">
                                                            

                            </div>

                        </td>
						</tr>
					<?php $i++ ;?>
				<?php } ?>
					</table>
			</div>
		</div>
	
	
</div>
</div>

<script type="text/javascript">


	//filter table
	$(document).ready(function(){
  $(".name").on("click", function() {
  $("#loan-table tr").hide()
  var flag = 1
  $("input:checkbox[name=name]:checked").each(function(){
  		flag = 0;
    	var value = $(this).val().toLowerCase();
      	$("#loan-table tr").filter(function() {
            if($(this).text().toLowerCase().indexOf(value) > -1)
        		$(this).show()
    	});
 	 });
    if(flag == 1)
    	$("#loan-table tr").show();
  });
});



		//filter
// $(document).ready(function() {
//   otable = $('#loan-table').dataTable();

// })

// function filterme() {
//   //build a regex filter string with an or(|) condition
//   var types = $('input:checkbox[name="name"]:checked').map(function() {
//     return '^' + this.value + '\$';
//   }).get().join('|');
//   //filter in column 5, with an regex, no smart filtering, no inputbox,not case sensitive
//   otable.fnFilter(types, 5, true, false, false, false);

// }



///collapse data on td

$(document).ready(function(){

	$("#demo").on("hide.bs.collapse", function(){
    $(".btn-collapse").html('<span class="fas fa-caret-down"></span> show more');
  });
  	$("#demo").on("show.bs.collapse", function(){
    $(".btn-collapse").html('<span class="fas fa-caret-up"></span> show less');
  });


				
	// $('#loan-table').DataTable({});


var table = $('#loan-table').DataTable({	


    columnDefs: [
    {
    // puts a button in the last column
    targets: [6], 
      render: function (data, type, row) {
       
        if (row[5] =="Released") {
            return "<p class='action-btn'><button id="+row[2]+" class='btn btn-link btn-sm  view_loan_statement action-btn' data-id="+row[1]+"><a class='fas fa-search  info_modal_btn' data-toggle='tooltip' data-placement='left' title='View Loan Statement'></a>Loan Statement</button></p>    <p class='action-btn'><button id="+row[2]+" class='btn btn-link btn-sm  view-schedule action-btn' data-id="+row[1]+"><a class='fas fa-list  info_modal_btn' data-toggle='tooltip' data-placement='left' title='View Loan Statement'></a>Payment Schedule</button></p>";

        }
        if (row[5] =="Approved") {
            return "<p class='action-btn'><button id="+row[2]+" class='btn btn-link btn-sm  release action-btn' data-id="+row[1]+"><a class='fas fa-edit  info_modal_btn' data-toggle='tooltip' data-placement='left' title='approve'></a>Release</button></p>";

        }
        if (row[5] =="For Approval") {
            return "<p class='action-btn'><button id="+row[2]+" class='btn btn-link btn-sm approve action-btn' data-id="+row[1]+"><a class='fas fa-edit  info_modal_btn' data-toggle='tooltip' data-placement='left' title='approve'></a>Approve</button></p>     <p class='action-btn'><button id="+row[2]+" class='btn btn-link btn-sm  deny action-btn' data-id="+row[1]+"><a class='fas fa-edit  info_modal_btn' data-toggle='tooltip' data-placement='left' title='Deny'></a>Deny</button></p>";

        }
        if (row[5] =="Denied") {
            return "<p class='text-center'>N/A</p>";

        }
        return "";
    }
   },
   			{
                "targets": [1,2],
                "visible": false,
                "searchable": false
            },
             { 
             	targets : [5],
          		render : function (data, type, row) {
            	if(data=="Denied"){
            	return '<span class="p-1 text-muted ">'+data+'</span>';
            }
            	if(data=="Released"){
            	return '<span class="p-1 text-muted">'+data+'</span>';
            }
            	if(data=="Approved"){
            	return '<span class="p-1 text-muted ">'+data+'</span>';
            }
            	if(data=="For Approval"){
            	return '<span class="p-1 text-muted ">'+data+'</span>';
            } 
            return data;               
               
               
            
          }
        },           
    ],


   
 });

// view schedules
table.on("click", ".view-schedule",function () {
        var borrower_id = $(this).data('id');
        var loan_id=$(this).attr('id');      
        
        window.location.href="<?php echo base_url('schedule/populate_schedule?id=')?>"+loan_id;
   
     });

// loan statement
table.on("click", ".view_loan_statement",function () {
        var borrower_id = $(this).data('id');
        var loan_id=$(this).attr('id');
        
        window.location.href="<?php echo base_url('process_controller/loan_statement?id=')?>"+loan_id;
   
     });
//approve
table.on("click", ".approve",function () {
        var borrower_id = $(this).data('id');
        var r = confirm("Approved this Loan?");
if(r==true){

		var loan_id=$(this).attr('id');	
		var stt="approved";
				
		$.ajax({
			url:'<?php echo base_url()?>process_controller/approve_status',
			type:'post',
			data:{id:loan_id,status:stt},
			success:function(data){
				alert_success();
				reload();
			},
			error:function(err){
				alert(err);
			},			
		});
	}
	else
	{
		return false;
	}
   
     });

//deny
table.on("click", ".deny",function () {
        var borrower_id = $(this).data('id');
        var loan_id=$(this).attr('id');
       var r = confirm("Deny this Loan?");
if(r==true){

			
		var stt="denied";
				
		$.ajax({
			url:'<?php echo base_url()?>process_controller/approve_status',
			type:'post',
			data:{id:loan_id,status:stt},
			success:function(data){
				
				reload();
			},
			error:function(err){
				alert(err);
			},			
		});
	}
	else
	{
		return false;
	}	
        
   
     });
//release
table.on("click", ".release",function () {
        var borrower_id = $(this).data('id');
        var loan_id=$(this).attr('id');
     var r = confirm("Confirm Released?");
if(r==true){
			
		var stt="released";
				
		$.ajax({
			url:'<?php echo base_url()?>process_controller/approve_status',
			type:'post',
			data:{id:loan_id,status:stt,borrower_id:borrower_id},
			success:function(data){
				alert_released();
				reload();
			},
			error:function(err){
				alert(err);
			},			
		});
	}
	else
	{
		return false;
	}  
   
     });



function reload(){
	setTimeout(function(){
           location.reload(); 
      }, 1000);
}


function alert_success(){
  var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer:5000
    });
   
      Toast.fire({
        icon: 'success',
        title: '<span class="text-dark">Loans Approved!</span>',
        background:'#5cb85c',
        color:'red',
        iconColor: '#333'
      })
 }

 function alert_released(){
  var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer:5000
    });
   
      Toast.fire({
        icon: 'success',
        title: '<span class="text-white">Released!</span>',
        background:'#0290b4',
        color:'red',
        iconColor: '#333'
      })
 }





});



	
</script>

<style type="text/css">
.vertical-center{
	vertical-align: center !important;
}
p{
	margin: unset;	
}

label-warning{
	color:red;
}
/*.action-btn{
	margin: 3px;
	width: 8rem !important;
}*/


</style>