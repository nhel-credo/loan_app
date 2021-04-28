<div class="content-wrapper">
  <div class="container-fluid">
  <br>
  <div class="card">
    <div class="card-header">
      <p class="card-title">Dashboard</p>
    </div>
    <div class="card-body">
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo ' '. number_format($payments,2) ?></h3>

                <p>Payments Today</p>
              </div>
              <div class="icon">
                <i class="fas fa-money"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $current_loan ?></h3>

                <p>Current Loans</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('active_loans/get_all_active') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $borrower ?></h3>

                <p>Borrowers</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-friends"></i>
              </div>
              <a href="<?php echo base_url('borrower/get_borrower')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count_due ?></h3>

                <p>Due Today</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $total_released ?></h3>

                <p>Total Loans Released</p>
              </div>
              <div class="icon">
                <i class="fas fa-money"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo ' '. number_format($total_recievable,2) ?></h3>

                <p>Total Recievable</p>
              </div>
              <div class="icon">
                <i class="fas fa-money"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>          
          <!-- ./col -->

        </div>
<!-- content wrapper -->
        </div>
        <!-- card body -->
      </div>
    </div>
  </div>