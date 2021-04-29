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

        <div class="row">
          <div class="col">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
<!-- content wrapper -->
        </div>
        <!-- card body -->
      </div>
    </div>
  </div>



<script type="text/javascript">
  window.onload = function() {
 
var dataPoints = [];
var data_released=[];
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  zoomEnabled: true,
  title: {
    text: "Summary",
    fontSize: 19,
  },
  axisY: {
    logarithmic: true, //change it to true
    title: "Amount of Loans Released",
    titleFontSize: 15,
    prefix: "Php",
    titleFontColor: "#51CDA0",
    lineColor: "#51CDA0",
    gridThickness: 1,
    lineThickness: 1,
  },
   axisY2: {
    logarithmic: true, //change it to false
    title: "Total Payments",
    titleFontSize: 15,
    prefix: "Php",
    titleFontColor: "#6D78AD",
    lineColor: "#6D78AD",
    gridThickness: 1,
    lineThickness: 1,
  },
  axisX:{
    title:"Date of Transaction",
    titleFontSize: 15,
    labelAngle:-45,
  },
  legend:{
    verticalAlign: "top",
    fontSize: 12,
    dockOutsidePlotArea: true
  },
  data: [{
    type: "spline",
    axisYType: "secondary",
    yValueFormatString: "Php#,##0.00",
    name:"Payments",
    showInLegend:true,
    dataPoints: dataPoints,
  },
  {
    type: "spline",
    yValueFormatString: "Php#,##0.00",
    name:"Release",
    showInLegend:true,
    dataPoints: data_released,
  }],
});
 
function addData(data) {

 
  var daily = data.daily;
  var released=data.released;
   console.log(released);

  for (var i = 0; i < daily.length; i++) {
    dataPoints.push({
      x:new Date(daily[i].date_created),
      y:parseFloat(daily[i].total_payment),
    });
    // console.log(daily[i].date_created);
  }

    for (var i = 0; i < released.length; i++) {
    data_released.push({
      x:new Date(released[i].date_released),
      y:parseFloat(released[i].amount),
    });
    // console.log(released[i].amount);
  }



  chart.render();
}
 
$.getJSON("<?php echo base_url()?>home_controller/growth", addData);
 
}
    
</script>