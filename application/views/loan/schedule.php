<!-- schedule -->
<div class="modal" id="loan-schedule"  role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body" id="printThis">
        <?php foreach($data as $d) { ?>
        <?php 
        $term=$d->plan;
        $maturity= date('m-d-Y',strtotime($d->date_released.'+'.$term.' month'));
        $release=date('m-d-Y',strtotime($d->date_released));
        ?>
     
        <div class="row">
          <div class="col"> <p class="text-center">Payment Schedule</p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Loan No. :<?php echo " ".$d->loan_id ?></p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Name: <?php echo ' '.ucwords($d->lname.', '.$d->fname.' '.substr($d->mname,0,1).'. '.$d->suffix) ?></p></div>
                    
        </div>
        <div class="row">        
          <div class="col"> <p class="">Release Date: <?php echo ' '.$release; ?></p></div>          
        </div>
        <div class="row">
          <div class="col"> <p class="">Maturity: <?php echo $maturity; ?></p></div>
          <div class="col"> <p class="">Loan Amount: <?php echo ' '.number_format($d->amount,2) ?></p></div>          
        </div>        
        <?php } ?>
        <div class="row">
          <div class="col"><hr></div>
        </div>
        <div class="row">
          <div class="col">
        <table class="table  table-sm text-center">
          <thead class="text-sm">
            <th>#</th>
            <th>Principal</th>
            <th>Interest</th>
            <th>Penalties</th>
            <th>Total</th>
            <th>Due Date</th>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php 
            $principal=0;
            $interest=0;
            $penalty=0;
            $monthly=0;
            ?>
            <?php foreach ($schedule as $sc) { ?>
              <?php $principal+=$sc['principal']; ?>
              <?php $interest+=$sc['interest']; ?>
              <?php $penalty+=$sc['penalty']; ?>
              <?php $monthly+=$sc['monthly']; ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo number_format($sc['principal'],2) ?></td>
                <td><?php echo number_format($sc['interest'],2) ?></td>
                <td><?php echo number_format($sc['penalty'],2) ?></td>
                <td><?php echo number_format($sc['monthly'],2) ?></td>
                <td><?php echo $sc['dates'] ?></td>

            </tr>
            <?php $i++ ?>
            <?php } ?>
            <tr class="font-weight-bold" style="background:#b3b2b236;">
              <td></td>
              <td><?php echo number_format($principal,2) ?></td>
              <td><?php echo number_format($interest,2) ?></td>
              <td><?php echo number_format($penalty,2) ?></td>
              <td><?php echo number_format($monthly,2) ?></td>

            </tr>
            
          </tbody>
        </table>
        </div>
      </div>
      <div class="row">
        <div class="col"><p class="text-sm">Pay promtly to avoid penalty charges.</p></div>
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" id="Print">Print</button>
        <button type="button" class="close-btn btn btn-secondary" data-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#loan-schedule').modal('show');
  });

  $('.close-btn').on("click",function () {          
        
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

</script>


<style type="text/css">
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
