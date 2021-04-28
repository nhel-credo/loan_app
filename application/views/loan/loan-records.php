<div class="modal" id="loan-records-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
    
        <h5 class="modal-title">Loan Records</h5>
        <div class="ml-auto pull-right">
            <button type="button" class="btn btn-primary open-loan-form" data-id=""><span class="fas fa-plus"></span>New Loan Application</button>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 
        
        <table id="loans-records-table" class="table">
          
          <!-- 
            <thead>
                <th>#</th>
                <th>Ref no.</th>
                <th>Loan Details</th>
                <th>Status</th>
                <th>Action</th> -->
            <!-- /thead>
        <?php $i=1?>
        <?php foreach ($current as $cl) { ?> 
             <tr>
              <td><?php echo $i;?></td>
               <td><?php echo $cl->loan_id ?></td>
               <td><?php echo $cl->loan_type?></td>
               <td><?php echo $cl->is_current?></td>
             </tr>
            
           <?php $i++ ?>
           <?php } ?> -->
        </table>
     
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#loan-records-modal').modal('show');
  })
</script>