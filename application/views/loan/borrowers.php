<!--Create New Loan Application Form -->
<div class="modal fade" id="loan-form-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title">Loan Form</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('process_controller/create_new_loan') ?>" method="post" id="new_loan_application" enctype="multipart/form-data" role="form">
      <div class="modal-body">
         <div class="form-group">
           
        <!-- borrower id hidden -->
        <input class="id" type="hidden" name="borrower_id">
        <!--  -->
            <div class="row">
                <div class="col"><p class="">Loan Type:</p>
                    
                    <select required="true" style="width:100%;" class="form-control select2" id="loan_type" name="loan_type">
                        <option disabled selected="">Select..</option>
                       

                       <?php foreach ($types as $key){?>                        
                        <option value="<?php echo $key->type?>"><?php echo $key->type?></option>
                        <?php }?>
                    </select>
                
                  </div>
                <div class="col"><p class="">Description:</p>
                    <select required="true" style="width:100%;" id="loan_description" name="loan_description" class="form-control select2">
                        <option disabled selected>Select..</option>
                       <?php foreach ($description as $key){?>                        
                        <option value="<?php echo $key->description?>"><?php echo $key->description?></option>
                        <?php }?>
                    </select>
                </div>
                
            </div>          
        </div>
         <div class="form-group">
            <div class="row">
                
                <div class="col"><p class="">Loan Purpose:</p><input type="text" class="form-control" name="loan_purpose" placeholder="" required="required">
                </div>
                <div class="col"><p class="">Loan Amount:</p><input type="number" class="form-control" name="loan_amount" placeholder="" required="required">
                </div>
            </div>          
        </div>
         <div class="form-group">
            <div class="row">
                <div class="col"><p class="">Payment Plan:</p>
                    <select required="true" style="width:100%;" id="loan_plan" class="form-control select2" name="loan_term">
                        <option disabled selected>Select..</option>
                       <?php foreach ($plans as $pln){?>                        
                        <option value="<?php echo $pln->term?>"><?php echo $pln->term.' mons.'?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="col"><p class="">Interest Rate:</p>
                <select required="true" style="width:100%;" id="interest_rate" class="form-control select2" name="interest_rate">
                        <option disabled selected>Select..</option>
                       <?php foreach ($interest as $int){?>                        
                        <option value="<?php echo $int->interest?>"><?php echo $int->interest.' %'?></option>
                        <?php }?>
                    </select>
                </div>
                
                 <div class="col"><p class="">Penalty Rate:</p>
                    <select required="true" style="width:100%;" id="penalty_rate" class="form-control select2" name="penalty_rate">
                        <option disabled selected>Select..</option>
                       <?php foreach ($penalty as $pr){?>  
                       <?php var_dump($pr) ?>                      
                        <option value="<?php echo $pr->penalty_rate?>"><?php echo $pr->penalty_rate.' %.'?></option>
                        <?php }?>
                    </select>
                </div>

               

         </div>          
        </div>
       
        <h6 class="text-center">Deductions</h6>
        <div class="form-group user-details">
            <div class="row">
                <div class="col"><p class="">Name:</p></div>
                <div class="col"><p class="">Reference:</p></div>
                <div class="col"><p class="">Amount:</p></div>
            </div>
            <div class="row">
                <div class="col">
                    <select required="true" style="width:100%;" id="deduction1" class="form-control select2" name="deductions[]">
                        <option disabled selected>Select..</option>
                       <?php foreach ($deductions as $ddn){?>                        
                        <option value="<?php echo $ddn->deductions_name?>"><?php echo $ddn->deductions_name?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col"><input type="text" class="form-control" name="reference[]" placeholder="" required="required">
                </div>
                <div class="col"><input type="text" class="form-control" name="amount[]" placeholder="" required="required">
                </div>
                 <button class="btn btn-info add-field">+</button>
                </div><br>
              
                
                   
        </div>
                <h6 class="text-center">References</h6>
        <div class="form-group">
            <div class="row">
                <div class="col"><p class="">Co-Maker 1:</p>
                     <select required="true" style="width:100%;" id="co-maker1" class="form-control select2" name="co-maker[]">
                        <option disabled selected>Select..</option>
                       <?php foreach ($data as $row){?>
                       <?php $value=ucfirst($row->fname).' '.ucfirst(substr($row->mname,0,1)).'. '.ucfirst($row->lname).' '.ucfirst($row->suffix)?>                         
                        <option value="<?php echo $value?>"><?php echo ucfirst($row->fname).' '.ucfirst(substr($row->mname,0,1)).'. '.ucfirst($row->lname).' '.ucfirst($row->suffix)?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col"><p class="">Contact:</p><input type="tel" class="form-control" name="contact[]" placeholder="11 digits mobile number" required="required" pattern="[0-9]{11}" maxlength="11">
                </div>
            

                </div>
                
        </div>
            <div class="form-group">
            <div class="row">
                <div class="col"><p class="">Co-Maker 2:</p>
                    <select required="true" style="width:100%;" id="co-maker2" class="form-control select2" name="co-maker[]">
                        <option disabled selected>Select..</option>
                       <?php foreach ($data as $row){?>
                       <?php $value=ucfirst($row->fname).' '.ucfirst(substr($row->mname,0,1)).'. '.ucfirst($row->lname).' '.ucfirst($row->suffix)?>                         
                        <option value="<?php echo $value?>"><?php echo ucfirst($row->fname).' '.ucfirst(substr($row->mname,0,1)).'. '.ucfirst($row->lname).' '.ucfirst($row->suffix)?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col"><p class="">Contact:</p><input type="tel" class="form-control" name="contact[]" placeholder="11 digits mobile number" required="required" maxlength="11" pattern="[0-9]{11}">
                </div>
                
            </div>
                </div>
                <div class="form-group">
            <div class="row">               
                <div class="col"><p class="">Collateral:</p><textarea class="form-control" rows="3" id="collateral" name="collateral"></textarea>
                </div>
                <div class="col">
                   <p class="">Collateral Image:</p>
                <img src="" id="collateral_image" alt="image"><br>
                <input class="text-secondary collateral_image" type="file" name="collateral_image" onChange="collateral_preview(this)">
                </div>
            </div>
        
    </div>

      </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-md" style="width: 100px;">Apply</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- Loan Records Modal -->
<div class="modal" id="loan-records-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
    
        <h5 class="modal-title">Loan Records</h5>
        <div class="ml-auto pull-right">
            <button type="button" class="btn btn-link open-loan-form" data-id=""><!-- <span class="fas fa-plus"></span> --> New Loan Application</button>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 
        
        <table id="loan-records-table" class="table table-hover">
          
          
            <thead>
               <!--  <th>#</th> -->
                <th>No.</th>
                <th>Ref no.</th>
                <th>Loan Details</th>
                <th>Status</th>
                <th>Control</th>
                
                <!-- <th>Action</th> -->
            </thead>
            <tbody>
        <!-- <?php $i=1?>
        <?php foreach ($current as $cl) { ?> 
             <tr>
              <td><?php echo $i;?></td>
               <td><?php echo $cl->loan_id ?></td>
               <td><?php echo $cl->loan_type?></td>
               <td><?php echo $cl->is_current?></td>
             </tr>
            
           <?php $i++ ?>
           <?php } ?> -->
         </tbody>
        </table>
     
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Borrower Modal -->
<div id="edit-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 700px;">
      <div class="modal-header">
        <h5 class="modal-title">Borrower's Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="signup-form">
    <form id="update-form" role="form">
       
        <p class="hint-text">Personal Information</p><br>
        <!-- id hidden -->
        <input type="hidden" class="form-control" id="uid" name="borrower_id" >
        <!--  -->
        <div class="form-group">
            <div class="row">
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">FirstName</h6><input type="text" class="form-control" name="fname" id="ufname" placeholder="First Name" required="required"></div>
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">MiddleName</h6><input type="text" class="form-control" name="mname" id="umname" placeholder="Middle Name" required="required"></div>
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">LastName</h6><input type="text" class="form-control" id="ulname" name="lname" placeholder="Last Name" required="required"></div>
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Suffix(Optional)</h6><input type="text" class="form-control" name="suffix" id="usuffix" placeholder="Suffix Optional"></div>


            </div>          
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Birth Date</h6><input type="date" class="form-control" name="dob" id="udob" placeholder="Birthdate" required="required"></div>
            <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Sex</h6>
                <select class="form-control" name="gender" id="ugender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

            </div>
            <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Civil Status</h6>
                <select class="form-control" name="status" id="ustatus">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="separated">Separated</option>
                    <option value="widow">Widow</option>
                </select>

            </div>
        </div>
        </div>
    

        <div class="form-group">
           <div class="row">
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Citizenship</h6><input type="text" class="form-control" id="unationality" name="nationality" placeholder="Nationality" required="required"></div>
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Contact</h6><input type="text" maxlength="11" pattern="[0-9]{11}" class="form-control" id="ucontact" name="contact" placeholder="Contact" required="required"></div>
                <div class="col"><h6 for="fname" class="pull-left text-secondary text-sm">Occupation</h6><input type="text" class="form-control" id="uoccupation" name="occupation" placeholder="Occupation" required="required"></div>
            </div> 
        </div>  

        <div class="form-group"><h6 for="fname" class="pull-left text-secondary text-sm">Address</h6>
            <input type="text" class="form-control" name="address" id="uaddress" placeholder="Address" required="required">
        </div>
         <div class="form-group">
  <div class="row">
    <div class="col">
        
                <label class="control-label text-dark">Update Profile Image</label><br>
                <img src="" id="img_url" alt="your image"><br>
                <input class="text-secondary" type="file" name="update_user_image" id="update_user_image" onchange="img_pathUrl(this)" accept=".jpg, .jpeg, .png, .gif">
              </div>
            </div>
          </div>
       

    
        
   
    </div>
      </div>
      <div class="modal-footer">
        <button id="update_borrower" type="submit" class="btn btn-info" onclick="on_update()">Save</button>
         </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>




<!-- Insert Modal -->
<div id="mymodal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 700px;">
      <div class="modal-header">
        <h5 class="modal-title">New Borrower</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="signup-form">
    <form id="form" role="form" enctype="multipart/form-data">
       
        <p class="hint-text">Personal Information</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="mname" id="
                    mname" placeholder="Middle Name" required="required"></div>
                <div class="col"><input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="suffix" id="suffix" placeholder="Suffix Optional"></div>


            </div>          
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col"><input type="date" class="form-control" name="dob" id="dob" placeholder="Birthdate" required="required" onchange="validate_dob()"></div>
            <div class="col">
                <select class="form-control" name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

            </div>
            <div class="col">
                <select class="form-control" name="status" id="status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="separated">Separated</option>
                    <option value="widow">Widow</option>
                </select>

            </div>
        </div>
        </div>
    

        <div class="form-group">
           <div class="row">
                <div class="col"><input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" required="required"></div>
                <div class="col"><input type="text" class="form-control" maxlength="11" pattern="[0-9]{11}" id="contact" name="contact" placeholder="Contact" required="required"></div>
                <div class="col"><input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" required="required"></div>
            </div> 
        </div>  

        <div class="form-group">
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required="required">
        </div>

        <div class="form-group">
  <div class="row">
    <div class="col">
                <label class="control-label text-dark">Profile Image</label><br>
                <img src="" id="img" alt="your image"><br>
                <input class="text-secondary" type="file" name="user_image" id="user_image" onChange="img_preview(this)" accept=".jpg, .jpeg, .png,.gif">
              </div>
            </div>
          </div>
       

    
        
   
    </div>
      </div>
      <div class="modal-footer">
        <button id="submit" type="submit" class="btn btn-info">Submit</button>
         </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




    

<div class="content-wrapper">
<div class="container-fluid">
 
<!--  <div class="row bg-light">
 <div class="col text-center">
   <h4 class="control-label">Borrower List</h4>
 </div>     
   </div> -->

   <div class="card">
    <div class="header">
    </div>
    <div class="card-body bg-light">
  
  <div class="row" style="height:5rem;">   
     <div class="col mb-4 col-sm-4"  style="margin:5px;">
      <label class="control-label">Search</label>
    <input class="filter form-control" placeholder="search" />
      </div>  
     <div class="col" style="margin-top: 39px;">
      <button id="add_borrower" class=" btn btn-info pull-right btn-sm "><span class="fas fa-plus-square" style="margin: 5px;"></span>ADD NEW</button>   
    </div>   
    
  </div>

  
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

<?php  foreach ($data as $row) { ?>
<div class="col mb-4">
 <div class="card hovercard" data-string="<?php echo $row->fname.$row->mname.$row->lname.$row->ref_id ?>">
  <div class="cardheader">
<!-- leave blank -->
  </div>
          <a target="_blank" href="<?php echo base_url().'upload/'.$row->image?>"><div class="avatar">
            <img  src="<?php echo base_url().'upload/'.$row->image?>" alt="Card image cap">
          </div></a>
            <div class="card-body">
               <div class="info">
                <div class="row ">
                    <div class="h6">
                        <a><?php echo ucfirst($row->lname).', '.ucfirst($row->fname).' '.ucfirst(substr($row->mname,0,1)).'. '.ucfirst($row->suffix)?></a>
                    </div>
                  </div>
                    <div class="desc"><?php echo $row->ref_id ?></div>
                    <div class="desc"><?php echo ucwords($row->address) ?></div>
                    <div class="desc"><?php echo $row->contact ?></div>
                    
                </div>
                <div class="row">
                    <a class="btn btn-default  btn-sm view-record" title="View Loan Records" data-id="<?php echo $row->id?>" >
                        <i class="fas fa-search"></i>
                    </a>
                    <a class="btn btn-default btn-sm update_borrower" title="View Borrowers Info" data-id="<?php echo $row->id?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-default btn-sm delete" title="Delete" data-id="<?php echo $row->id?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                   
                </div>        
                
            </div>
             <div class="card-footer"></div>
        </div>
      </div>
<?php } ?>
  </div>  

</div>
</div>


<!-- <div class="card bg-light">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <p class="card-title">Borrowers</p>
    </div>
    <div class="col">
      <button id="add_borrower" class=" btn btn-info pull-right btn-sm" style="margin:15px;"><span class="fas fa-plus-square" style="margin: 5px;"></span>ADD NEW</button>
    </div>
  </div>
</div>
  <div class="card-body">
        
        <div class="container" style="padding: 10px;">
            <table id="borrower_data" class="table table-stripped table-hover">
                <thead class="table-success">

                <th class="align-center text-center" width="30">#</th>
                <th width="100" class="text-center">Image</th> 
                <th class="">Details</th>
                <th class="text-center" width="80">DoB</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Status</th>
                <th class="text-center">Citizenship</th>
                <th class="text-center">Occupation</th>   
                <th class="text-center">Controls</th>
            </thead>

               <?php $i=1; ?>
                <?php  foreach ($data as $row) { ?>
                <?php $date = new DateTime($row->dob)?>
                    <tr>
                        <td class="align-center text-center"><strong><?php echo $i ?></strong></td>                                               
                        <td class="align-center"><a target="_blank" href="<?php echo base_url().'upload/'.$row->image?>"><img src="<?php echo base_url().'upload/'.$row->image?>"  class="img-thumbnail .img" width="120" /></a></td>
                        <td>
                            <p>ID No: <strong class="text-sm"><?php echo $row->ref_id; ?></strong></p>
                            <p>Name: <strong class="text-sm"><?php echo ucfirst($row->fname).' '.ucfirst($row->mname).' '.ucfirst($row->lname).' '.ucfirst($row->suffix)?></strong></p>
                            <p>Contact: <strong class="text-sm"><?php echo ucfirst($row->contact); ?></strong></p>
                            <p>Address: <strong class="text-sm"><?php echo ucfirst($row->address) ?></strong></p>
                        </td>
                        <td class="align-center text-center"><?php echo $date->format('M d Y')?></td>
                        <td class="align-center text-center"><?php echo ucwords($row->gender) ?></td>
                        <td class="align-center text-center"><?php echo ucwords($row->status)?></td>
                        <td class="align-center text-center"><?php echo ucwords($row->nationality) ?></td>
                        <td class="align-center text-center"><?php echo ucwords($row->occupation)?></td>
                        
                        
                        <td class="align-center">
                            <div class="text-center">
                                <button  class="btn-width btn btn-info btn-sm view-record" data-id="<?php echo $row->id?>"><a class="fas fa-search text-white info_modal_btn" data-toggle="tooltip"
                                 data-placement="left" title="View Records"></a>Records</button>

                                <button  class="btn-width btn btn-warning btn-sm  update_borrower" data-id="<?php echo $row->id?>"><a class="fas fa-edit text-white"  data-toggle="tooltip"  name="edit" title="Edit" ></a>Details</button>

                                <button class="btn-width btn btn-danger btn-sm delete" data-id="<?php echo $row->id?>"><a class="fas fa-trash-alt text-white" data-toggle="tooltip" data-placement="top" title="Remove"></a>Remove</button>

                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php }  ?>
               
             </table>
        </div>
    </div>
  </div> -->
</div>


</div>

<script type="text/javascript">


$('.open-loan-form').click(function(){
    $('#loan-records-modal').modal('hide');
    $('#loan-form-modal').modal('show');
})


$(document).ready( function () {
  var table = $('#loan-records-table').DataTable({
    columnDefs: [
    {
    //sets style for status
    targets: [3], 
      render: function (data, type, row) {
             if (data=="current") {
              var color='badge-success'
              }
              if (data=="paid-up") {
              var color='badge-default'
              }
              if (data=="due") {
              var color='badge-danger'
              }
                return '<span class="p-1 badge badge-pill w-75 '+color+' text-md">'+data+'</span>';
       },    
       
     },{
     targets: [4], 
      render: function (data, type, row) {
             if (row[3]=="current") {
              return '<button class="payment-btn btn btn-sm btn-link" data-id='+row[1]+'>Payment</button>';
              }
              if (row[3]=="due") {
              return '<button class="payment-btn btn btn-sm btn-link" data-id='+row[1]+'>Payment</button>';
              } 
               if (row[3]=="paid-up") {
              return '<button class="ledger-btn btn btn-sm btn-link" data-id='+row[1]+'>Ledger</button>';
              }             
              return '';
       }
     },
     ],
       
  });

  //payment
table.on('click','.ledger-btn',function(){
  var loan_id=$(this).data('id');
  window.location.href="<?php echo base_url('ledger/get_ledger?id=')?>"+loan_id;
})



  //payment
table.on('click','.payment-btn',function(){
  var loan_id=$(this).data('id');
  window.location.href="<?php echo base_url('borrower/payments?id=')?>"+loan_id;
})

});




//on view loan records modal
$(document).on('click','.view-record',function(){
    var borrower_id =$(this).data('id');
    $('.id').val(borrower_id);     

    $.ajax({
      url:'<?php echo base_url()?>borrower/get_current_loans',
      type:'post',      
      data:{id:borrower_id},
      success:function(response){
        var current = JSON.parse(response);
        // alert(response);
        populateDataTable(current);
        

       $('#loan-records-modal').modal('show');
      },
      error:function(err){
        alert(err);
      }

    });

  });

//populating loan record to datatable by loan ID
 function populateDataTable(data) {
      $("#loan-records-table").DataTable().clear().draw(); 
      $.fn.dataTable.ext.errMode = 'none';
        var row = 1;
        $.each(data, function (index, value) {

            $('#loan-records-table').dataTable().fnAddData( [
                row,
                value.loan_id,
                value.loan_type,
                value.is_current,
                 
              ]);

           row++;
        });
    }



$(document).ready(function(){
    $('#add_borrower').click(function(event){
      $('#mymodal').modal('show');
    })


$('#borrower_data').DataTable({});

       


                    $(document).on('click','.update_borrower',function(){
                   
                    var borrower_id = $(this).data('id');
                    // alert(borrower_id);
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>borrower/getby_id',
                        type: 'post',
                        data: {borrower_id:borrower_id},
                        success: function(response){ 
                            
                            var borrower = JSON.parse(response);  
                              
                       
                            for (var i = 0; i < borrower.length; i++) { 
                                var id=borrower[i].id;
                                var fname=borrower[i].fname;
                                var mname=borrower[i].mname;
                                var lname=borrower[i].lname;
                                var suffix=borrower[i].suffix;
                                var dob=borrower[i].dob;
                                var gender=borrower[i].gender;
                                var status=borrower[i].status;
                                var nationality=borrower[i].nationality;
                                var contact=borrower[i].contact;
                                var occupation=borrower[i].occupation;
                                var address=borrower[i].address;
                                var img=borrower[i].image;
                                var location="<?php echo base_url().'upload/'?>"+img;
                                //setting values to modal

                                $('#uid').val(id);
                                $('#ufname').val(fname);
                                $('#umname').val(mname);
                                $('#ulname').val(lname);
                                $('#usuffix').val(suffix);
                                $('#udob').val(dob);
                                $('#ugender').val(gender);
                                $('#ustatus').val(status);
                                $('#unationality').val(nationality);
                                $('#ucontact').val(contact);
                                $('#uoccupation').val(occupation);
                                $('#uaddress').val(address);
                                $('#img_url').attr('src',location);

                               

                            }
                            // // Display Modal
                            $('#edit-modal').modal('show'); 
                       },

                       error:function(err){
                        alert(err);
                       }

                    });
                });
    });

    //new loan application//
    
   $(document).on('submit','#new_loan_application',function(event) {
       event.preventDefault();       
    var extension = $('.collateral_image').val().split('.').pop().toLowerCase();  
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
           {  
                alert("Invalid Image File");  
                $('#collateral_image').val('');  
                return false;  
           }

    var DataString=new FormData(this);

          $.ajax({
           url: "<?php echo base_url();?>process_controller/create_new_loan",
           type: "post",
           data:DataString,
           contentType:false,
           processData:false,
           success: function(data) {

            $('#loan-form-modal').modal('hide');

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

   
      Toast.fire({
        icon: 'success',
        title: 'Application Submitted!'
      });
  
  setTimeout(function(){
           location.reload(); 
      }, 1000);

},

error:function(err){
  alert(err);
}

       });  
     
   });



function validate_dob()
{
    var dob=$('.dob').val();
    var now=new Date();
    alert(dob);
}


    //insert//
    
   $(document).on('submit','#form',function(event) {
       event.preventDefault();
       
    var extension = $('#user_image').val().split('.').pop().toLowerCase();  
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
           {  
                alert("Invalid Image File");  
                $('#user_image').val('');  
                return false;  
           }

    var DataString=new FormData(this);

          $.ajax({
           url: "<?php echo base_url();?>Borrower/insert_borrower",
           type: "post",
           data:DataString,
           contentType:false,
           processData:false,
           success: function(data) {

            $('#mymodal').modal('hide');

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

   
      Toast.fire({
        icon: 'success',
        title: 'Done!'
      });
  
  setTimeout(function(){
           location.reload(); 
      }, 1000);

},

error:function(err){
  alert(err);
}

       });  
     
   });
        //update //

   $(document).on('submit','#update-form',function(e){
  e.preventDefault(); 

  
   var extension = $('#update_user_image').val().split('.').pop().toLowerCase();  
   
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
           {  
                alert("Invalid Image File");  
                $('#user_image').val('');  
                return false;  
           }
   
    var string=new FormData(this);           
    
    $.ajax({
      url:'<?php echo base_url()?>borrower/on_update',
      type:'post',
      data:string,
      contentType:false,  
      processData:false,
      success:function(data){
        
      alert_success();
      $('#edit-modal').modal('hide');

      setTimeout(function(){
           location.reload(); 
      }, 1000);

      },
      error:function(err){
        alert(err);
      }

    }) 
   
  });

   //delete borrower
  $(document).on('click','.delete',function(e){
    e.preventDefault();

      Swal.fire({
  title: 'Are you sure?',
  text: "You want to delete this?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',

}).then((result) => {
  if (result.isConfirmed) {
    _delete();
    Swal.fire(
      'Deleted!',
      'Record has been deleted.',
      'success'
    )
  }
})
  })

  function _delete()
  {
    var id = $('.delete').data('id');      
      $.ajax({
        url:'<?php echo base_url();?>borrower/delete',
        type:'post',
        data:{id:id},
        
        success:function(data){
              
           location.reload(); 
            
        },
        error:function(err){
          alert(err);
        }
      })
  }


 function alert_success(){
  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });

   
      Toast.fire({
        icon: 'success',
        title: 'Successful!'
      })
 }



function show_error()
{
     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Password not Matched!',
  })
}


$('#loans-records-table').DataTable({});

$(document).ready(function(){
    $(".select2").select2();
})


//add deductions field
    $(".add-field").click(function(){
    
   
        $(".user-details").append('<div class="form-group user_data"><div class="row"><div class="col"><select class="form-control select2" name="deductions[]"><option disabled selected>Select..</option><?php foreach ($deductions as $ddn){?><option value="<?php echo $ddn->deductions_name?>"><?php echo $ddn->deductions_name?></option><?php }?></select></div><div class="col"><input type="text" class="form-control" name="reference[]" placeholder="" required="required"></div><div class="col"><input type="text" class="form-control" name="amount[]" placeholder="" required="required"></div><button class="remove-btn btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">-</button></div></div>');    
          
  });

//remove deduction field

$("body").on("click",".remove-btn",function(e){
       $(this).parents('.user_data').remove();
  });

 function img_pathUrl(input){
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
    function img_preview(input){
        $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
     function collateral_preview(input){
        $('#collateral_image')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }


    function validate_dob() {
        var dateString = document.getElementById('dob').value;
        var dob = new Date(dateString);
        var today = new Date();
        if ( dob > today ) { 
           alert('Birthdate must be lesser than today');
            reset_date();
            return false;
        }
        return true;
    }

    function reset_date() {
  $('#dob').val('').attr('type', 'date');
}



// filter data in cards
$(".filter").on("keyup", function() {
  var input = $(this).val().toUpperCase();

  $(".card").each(function() {
    if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
      $(this).hide();
    } else {
      $(this).show();
    }
  })
});

</script>



<style type="text/css">
/*.card {
  width: 150px;
  height: 160px;
  display: inline-block;
  padding: 10px;
  border: 1px solid black;
  margin-bottom: 10px;
}*/

.filter {
  margin-bottom: 30px;
  display: block;
}




.btn-width{
  width:80px;
  margin:3px;
}
.img {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 120px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

.align-center{
  vertical-align: middle !important;
}
p{
  margin: unset;
  
}

#img {
  background: #ddd;
  width:100px;
  height: 90px;
  display: block;
}
#img_url {
  background: #ddd;
  width:100px;
  height: 90px;
  display: block;
}
#collateral_image {
  background: #ddd;
  width:200px;
  height: 100px;
  display: block;
}





/*card styles*/


.card {
    padding-top: 20px;
    margin: 15px;
    /*margin: 10px 0 20px 0;
*/    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color:whitesmoke;
    border: 1px solid gainsboro;
    width: 11rem;
}

.card.hovercard .cardheader {
    background:silver;
    background-size: cover;
    height: 4rem;

}

.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}

.card.hovercard .avatar img {
    width: 65px;
    height: 65px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}

.card-btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }


</style>