
<!-- Ledger -->
<div class="modal fade" id="loan-ledger"  role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="printThis">
      <?php foreach($info as $inf) { ?>     
        <?php 
        $term=$inf->plan;
        $maturity= date('m-d-Y',strtotime($inf->date_released.'+'.$term.' month'));
        $release=date('m-d-Y',strtotime($inf->date_released));
        ?>
        <div class="row">
          <div class="col"> <p class="text-center">Loan Ledger</p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Loan No. :<?php echo ' '.$inf->loan_id?></p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Name: <?php echo ' '.ucwords($inf->lname.', '.$inf->fname.' '.substr($inf->mname,0,1).'. '.$inf->suffix) ?> </p></div>
          <div class="col"> <p class="">Term: <?php echo ' '.$inf->plan.' mons. at '.$inf->interest_rate.' %' ?></p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Address: <?php echo ' '.ucwords($inf->address); ?></p></div>
          <div class="col"> <p class="">Loan Amount: <?php echo ' '.number_format($inf->amount,2) ?></p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Release Date: <?php echo ' '.$release; ?></p></div>
          <div class="col"> <p class="">Maturity: <?php echo $maturity; ?></p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Kind of Loan: <?php echo ' '.ucwords($inf->loan_type.' : '.$inf->description) ?></p></div>                    
        </div><br>
       <?php } ?>
         <div class="row">
          
          <table class="table table-bordered text-center table-sm">
            <thead class="text-center text-sm thead-light">
              <th>#</th>
              <th>Date</th>
              <th>Principal</th>
              <th>Interest</th>
              <th colspan="2" style="padding: unset !important;margin: unset !important;">
                <table style="padding: unset !important;margin: unset !important; width: 100%">
                    <th colspan="2" style="padding: unset !important;margin: unset !important;">Existing Balance</th>
                    <tr>
                    <td style="padding: unset !important;margin: unset !important;"><small>Balance</small></td>
                    <td style="padding: unset !important;margin: unset !important;"><small>Penalties</small></td>
                  </tr>
                  </table>
              </th>
              <th>Penalty/charges</th>
              <th>Total Payment</th>
              <th>Balance</th>
            </thead>
            <?php $i=1; ?>
      <?php foreach($ledger as $l) {?>
        <?php if($l->balance<1){
          $bal=0;
        }else{
          $bal=$l->balance;
        } ?>
            <tr>
              <td><?php  echo $i; ?></td>
              <td><?php echo $l->date_created ?></td>
              <td><?php echo number_format($l->principal,2) ?></td>
              <td><?php echo number_format($l->interest,2) ?></td>
              <td><?php echo number_format($l->existing_balance,2) ?></td>
              <td><?php echo number_format($l->existing_penalty,2) ?></td>
              <td><?php echo number_format($l->penalties,2) ?></td>
              <td><?php echo number_format($l->total_payment,2) ?></td>
              <td><?php echo number_format($bal,2) ?></td>
            </tr>
            <?php $i++; ?>
            <?php }?>

          </table>                    
        </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" id="Print">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Payments -->
<div class="modal" id="payment-modal"  role="dialog"  data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>

      <div class="modal-body"> 
      <?php 
        $penalty_rate=0;
       $tt_penalty=0; ?>  

     <?php foreach ($data as $key) { ?>
     <?php

     $penalty_rate=$key->penalty_rate;
     $term=$key->plan;
     $interest=$key->interest_rate;
     $next_payment=$key->next_payment;
     $amount=$key->amount;
    
     if($key->total_balance<1)
     {
      $balance=0;
     }else{
      $balance=$key->total_balance;
     }
     
     $cur_date=date('Y-m-d'); 

     $tt_interest=($amount*$interest)/100*$term;
     $monthly=($amount*$interest)/100+$amount/$term;

     $monthly_principal=$amount/$term;
     $monthly_interest=$tt_interest/$term;

     
     $days=0;
     $tt_payable=0;
     
     if($cur_date>$next_payment){
        $date1 = new DateTime($cur_date);
        $date2 = new DateTime($next_payment);
        $interval = $date1->diff($date2);  
        $days=$interval->days; 
        $tt_penalty=($monthly*$penalty_rate)/100*($days/30);      
        $tt_payable=$monthly+$tt_penalty;             
        
      
     
     }else{

       $tt_penalty=0;
       $tt_payable=$monthly+$tt_penalty;
    }     
     ?> 

<!-- calculating existing -->
      <?php
        $existing_balance=0;
        $monthlydue_penalty=0;
        $due_date="";
        $days_due=0;
        $total_dues=0; 

      ?>

     <?php foreach($existing as $ex){

      $existing_balance =$ex->existing_balance; 
      $due_date=$ex->due_date;

      // if($due_date==""){
      //   $due_date="n/a";
      // }else{
      //   $due_date=date('m-d-Y',strtotime($ex->due_date));
      // }

      $cur_date=date('Y-m-d');       
     
     if($cur_date>$due_date){
        $date1 = new DateTime($cur_date);
        $date2 = new DateTime($due_date);
        $interval = $date1->diff($date2);  
        $days_due=$interval->days; 
        $monthlydue_penalty=($existing_balance*$penalty_rate)/100*($days_due/30);       
        $total_dues=$existing_balance+$monthlydue_penalty+$tt_penalty;
      }
         
      }?>
     
    <div class="row">
      <div class="col"><label>Loan Reference No.  <?php  echo $key->loan_id?></label>
      </div>
    </div>
    <div class="row">
      <div class="col"><label>Due: 
        <?php if($balance<1){
        echo "n/a";
      } 
      else{
        echo date('m-d-Y',strtotime($next_payment));
      }?></label>

      </div>
    </div>
    <div class="row">
      <div class="col"><p><?php echo $days .' days Delay'; ?></p>
      </div>
    </div>
        

   
                <table class="table">
                  <thead class="table-bordered">
                <th>Monthly Payable</th>
                <th>Principal</th>
                <th>Total Interest</th>
                <th colspan="2" style="padding: unset !important;margin: unset !important;" class="text-center">
                  <table style="padding: unset !important;margin: unset !important; width: 100%">
                    <th colspan="2" style="padding: unset !important;margin: unset !important;">Previous Balance</th>
                    <tr>
                    <td style="padding: unset !important;margin: unset !important;"><small>Existing</small></td>
                    <td style="padding: unset !important;margin: unset !important;"><small>Charges</small></td>
                  </tr>
                  </table>

                </th>
                <th>Penalty</th>
                <th>Total Balance</th>
                <tr class="bg-light">
                  <td><?php echo number_format($monthly,2)?></td>
                  <td><?php echo number_format($amount,2); ?></td>
                  <td><?php echo number_format($tt_interest,2); ?></td>
                  <td><?php
                  if($existing_balance<1)
                  {
                    $existing_balance=0;
                  }
                  echo number_format($existing_balance,2);?></td>
                  <td><?php echo number_format($monthlydue_penalty,2); ?></td>
                  <td><?php echo number_format($tt_penalty,2); ?></td>
                  <td><?php 
                  if($balance<1){echo number_format($balance,2);}
                   else{ echo number_format($balance,2); } ?></td>
                </tr>
              </thead>
   <?php  } ?>
              </table>
               <div class="row">
      <div class="col"><hr></div>
    </div>

<div class="pull-left">
<p><h6>Existing Dues</h6></p>
<p>Due Date: <?php echo $due_date; ?></p>
<p><?php echo $days_due ?> days after due date</p>

 <form id="payments-form">

<p>Existing Balance : 
  <?php if($existing_balance<1){
    $existing_balance=0;
  }
  echo number_format($existing_balance,2); ?></p>

<p>Penalty : <?php echo number_format($monthlydue_penalty,2); ?></p>

<p>Current Penalty : <?php echo number_format($tt_penalty,2); ?></p>
<p class="text-dark"><hr></p>
<p>Total Dues: <?php echo number_format($total_dues,2);?></p>
</div>

<!--payment card -->
    <div class="card pull-right" style="width: 30rem">
      <div class="card-header text-center">
     <label class="control-label ">Payments</label>
      </div>
      <div class="card-body">
 
    <div class="form-group">
    <div class="row">
      
      <input type="hidden" id="existing_balance" name="existing_balance" value="<?php echo round($existing_balance,2)?>">
      <input type="hidden" id="existing_penalty" name="existing_penalty" value="<?php echo round($monthlydue_penalty,2)?>">
      <input type="hidden" name="total_dues" id="total_dues" value="<?php echo round($total_dues,2) ?>">


      <input type="hidden" class="payment_date" name="payment_date" value="<?php echo $next_payment ?>">
      <input type="hidden" class="loan_id" name="loan_id" value="<?php echo $key->loan_id ?>">
      <input type="hidden" class="monthly_principal" name="monthly_principal" value="<?php echo round($monthly_principal,2)?>">
      <input type="hidden" class="balance" name="balance" value="<?php echo $balance ?>">
      <input type="hidden" class="monthly_interest" name="monthly_interest" value="<?php echo round($monthly_interest,2) ?>">
      <div class="col-md"><label>Monthly Amount:</label><input type="text" value="<?php echo round($monthly,2)?>" name="amount" class="form-control" readonly></div>
    </div>
    <div class="row">
      <div class="col-md"><label>Penalty:</label><input type="text" value="<?php echo round($tt_penalty,2); ?>" id="current_penalty" name="penalty" class="form-control " readonly></div>
    </div>
    <div class="row">
      <div class="col-md"><label>Payment Amount:</label><input type="number" name="payment_amount" class="form-control" id="payment_amount" required value="" placeholder="<?php echo round($tt_payable+$total_dues,2); ?>"></div>
    </div>
  </div>

</div>


</div>

      </div>
            

      <div class="modal-footer">
        <button type="button" class="btn btn-info ledger mr-auto">View Ledger</button>
        <button type="submit" class="btn btn-primary post-payment">Post Payment</button>
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Back</button>
      </div>
</form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

  $('#payment-modal').modal('show');
  var balance=$('.balance').val();
  // alert(balance);
  if(balance<1)
  {
    $(".post-payment").attr("disabled", true);
  }else{
    $(".post-payment").attr("disabled", false);
  }
  


  });


      $('.close-btn').on('click',function(){
           goBack();
      })

      //submit payments

  $('#payments-form').on('submit',function(e){
    e.preventDefault();
    var existing_penalty=$('#existing_penalty').val();
    var existing_balance=$('#existing_balance').val();
    var total_dues =$('#total_dues').val();
    var payment_amount=$('#payment_amount').val();

    var Datastring=$('#payments-form').serialize();
    
    if(payment_amount<=Math.round(total_dues))
    {
      alert("\nPayment amount must include the existing unpaid balance\nInput amount higher than the total dues!");
      console.log(total_dues);
      return;
    }else{

    $.ajax({
      url:"<?php echo base_url()?>borrower/insert_payment",
      type:'post',
      data:Datastring,
      success:function(data){
        console.log(data);
        alert('Done');
        setTimeout(function(){
           location.reload(); 
      }, 1000);
      },
      error:function(err){
        console.log(err);
        alert(err);
      }

    });
  }
  // end if
})


  $('.ledger').on('click',function(){
    var loan_id=$('.loan_id').val();
    // alert($loan_id);
    $('#loan-ledger').modal('show');

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
 #loan-ledger {
    z-index: 1052 !important;
}

#payment-modal{
    z-index: 1051 !important;
    overflow-y:scroll;
}
p{
  margin: unset;
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
 
</style>