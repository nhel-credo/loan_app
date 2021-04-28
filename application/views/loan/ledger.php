<!-- Ledger -->
<div class="modal fade" id="loan-ledger"  role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
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
              <th>Penalty/charges</th>
              <th>Total Payment</th>
              <th>Balance</th>
            </thead>
            <?php $i=1; ?>
            <?php 
            $principal=0;
            $interest=0;
            $penalties=0;
            ?>
<?php foreach($ledger as $l) { ?>
 
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo date('m-d-Y',strtotime($l->date_created)) ?></td>
              <td><?php echo $l->principal ?></td>
              <td><?php echo $l->interest ?></td>
              <td><?php echo $l->penalties ?></td>
              <td><?php echo $l->total_payment ?></td>
              <td><?php echo number_format($l->balance) ?></td>
            </tr>
            <?php $i++;?>
      <?php }?>
            
          </table>                    
        </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" id="Print">Print</button>
        <button type="button" class="close-btn btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    $('#loan-ledger').modal('show');
  })

 $('.close-btn').on('click',function(){
             goBack();
      }); 



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


 //  var timer = 0;
// function set_interval() {  
//   timer = setInterval("auto_logout()", 10000);
// }

// function reset_interval() {

//   if (timer != 0) {
//     clearInterval(timer);
//     timer = 0;   
//     timer = setInterval("auto_logout()",10000);  
//   }
// }

// function auto_logout() {  
//   window.location = "<?php echo base_url('login')?>";
//     history.pushState(null, null, null);
//     window.addEventListener('popstate', function () {
//         history.pushState(null, null, null);
//     });
// }


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