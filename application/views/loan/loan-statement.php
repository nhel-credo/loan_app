<!--Loan Statement Modal -->
<div class="modal fade" id="loan_statement_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body" id="printThis">
      	<div class="row">
      		<div class="col">
      			<p class="text-center">LOAN STATEMENT</p>
      		</div>     		
      	</div>
      	<div class="row">
      <?php foreach ($loans as $loan) { ?>
      <?php  $borrower= ucwords($loan->lname.', '.$loan->fname.' '.substr($loan->mname,0,1).'.'.$loan->suffix) ?>
     <?php
      
      $month=$loan->plan;
      $maturity= date('m-d-Y',strtotime($loan->date_released.'+'.$month.' month'));
      ?>
      


      
 
                 
                  
      			<div class="col"><p class="text-center" id="loan_id"><?php echo $loan->loan_id ?></p></div>
      		</div>
      		<div class="row">
      			<div class="col"><p class="pull-left text-center width100 bottom-border"><?php echo $maturity;  ?></p></div>
      			<div class="col"><p class="pull-right text-center width100 bottom-border"><?php echo date('m-d-Y',strtotime($loan->date_released)) ?></p></div>
      		</div>
      		<div class="row">
      			<div class="col"><p class="pull-left text-center width100">Maturity Date</p></div>
      			<div class="col"><p class="pull-right text-center width100">Date Released</p></div>
      		</div>
      		<div class="row">
      			<div class="col-sm-4"><p class="">Name of Borrower:</p></div>
      			<div class="col width200"><p class="bottom-border text-center"><?php echo ucwords($loan->lname.', '.$loan->fname.' '.substr($loan->mname,0,1).'. '.$loan->suffix) ?></p></div>
      		</div>
      		<div class="row">
      			<div class="col-sm-2"><p class="">Address:</p></div>
      			<div class="col"><p class="bottom-border"><?php echo ucwords($loan->address) ?></p></div>
      		</div>
      		<div class="row">
      			<div class="col"><p class="">Kind of Loan:</p></div>
                        <div class="col"><p class="bottom-border"><?php echo ucwords($loan->loan_type)?></p></div>
      			<div class="col-xs-1"><p class="">Description:</p></div>
                        <div class="col"><p class="bottom-border"><?php echo ucwords($loan->description)?></p></div>
      		</div>
      		<div class="row">
      			<div class="col"><p class="">Term: </p></div>
                        <div class="col"><p class="bottom-border"><?php echo $loan->plan.' mons.' ?></p></div>
                        <div class="col-sm-1"><p class="">at </p></div> 
                        <div class="col"><p class="bottom-border"><?php echo $loan->interest_rate." %" ?></p></div>   
      	   </div> 
      	   <div class="row">
      			<div class="col-sm-6"><p class=" loan-amount">Amount of Loan:</p></div> 
                        <div class="col"><p class="bottom-border"><?php echo number_format($loan->amount,2) ?></p></div>  
      	   </div> 
      	   <div class="row">
                  <?php 
                  $interest=($loan->amount*$loan->interest_rate/100)*$loan->plan; 
                  $loan_amount=$loan->amount;
                  ?>
      			<div class="col"><p class="">Interest:</p></div>
                        <div class="col"><p class="bottom-border"><?php echo number_format($interest,2) ?> </p></div>   
      	   </div>
       <?php }?>
      	   <div class="row">
      			<div class="col"><p class="">Deductions:</p></div>   
      	   </div> 
               <?php foreach ($deductions as $dd) { ?>
                   
               
      	   <div class="row">
      			<div class="col">
      				<table>
      					<tr class="row">
      						
      						<td class="col"><p class="width100 l"><?php echo $dd->deduction_name ?></p></td>
      						<td class="col"><p><?php echo number_format($dd->amount,2) ?></p></td>
      					</tr>      					
      				</table>
      			</div>   
      	   </div>
            <?php } ?>
      	   <div class="row">
                  <?php foreach($tt_deductions as $td) { ?>
                  <?php 
                  $net= number_format($loan_amount-$td->amount,2);
                   ?>

      			<div class="col"><p class="">Total Deductions:</p></div>
                        <div class="col"><p class="bottom-border"><?php echo $td->amount?></p></div>   
      	   </div> 
      	   <div class="row">
      			<div class="col"><p class="">NET PROCEEDS:</p></div>
                        <div class="col"><p class="bottom-border"><?php echo number_format($loan_amount-$td->amount,2)?></p></div>   
      	   </div>
            <?php } ?>
      	   <div class="row">
      			<div class="col"><p class="">Prepared By:</p></div>
      			<div class="col"><p class="pull-left">Approved By:</p></div> 
      	   </div>
      	    <div class="row">
      			<div class="col"><input class="input-border text-center" type="text" name="" style="width: 100%"></div>
      			<div class="col"><input class="input-border text-center" type="text" name="" style="width: 100%" class="pull-right"></div> 
      	   </div>
      	   <div class="row">
      			<div class="col"><p>Received:</p></div>
      			<div class="col"><p class="pull-right">Php <?php echo $net; ?></p></div> 
      	   </div>
      	   <div class="row">
      			<div class="col"><center><p class="width200 text-center bottom-border"><?php echo $borrower ?></p></center></div>      			 
      	   </div>
      	   <div class="row">
      			<div class="col"><p class="text-center">(Borrower)</p></div>      			 
      	   </div>


      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" id="Print">Print</button>
        <button type="button" class="btn btn-secondary back-btn" data-dismiss="modal">Back</button>        
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
      $(document).ready(function(){
            $('#loan_statement_modal').modal('show');

      $('.back-btn').on('click',function(){
             goBack();
      })
})


document.getElementById("Print").onclick = function () {
    printElement(document.getElementById("printThis"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}

function goBack() {
  window.history.back();
}

</script>

<style type="text/css">
p{
      margin: unset;

}
.width100{
      width: 100px;

}
.width200{
      width: 200px !important;      
}
.bottom-border{
      border-bottom: 1px solid black;
}
.input-border{
      border:none;
      border-bottom: 1px solid black;
}

@media screen {
    #printSection {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:0;
        top:0;
        width: 100%;
        height: 100%;
       
    }
}
</style>