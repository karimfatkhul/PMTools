<?php $this->load->view('asset'); ?>
<title>Dashboard | Solusi 247</title>
<?php $this->load->view('navigasi'); ?>
  <div class="container-fluid dashboard px-4">
      <div class="row">
        <div class="col-md-8">
          <div class="row mb-3">
            <div class="col-md-12">
              <!-- Project Growth -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Project Growth</h3>
                  <div class="box-property">
                    <div class="form-group form-inline d-inline-flex mr-3">
                      <label class="mr-2">Select Project</label>
                      <select class="form-control">
                        <option>Hadoop</option>
                        <option>Braja</option>
                        <option>Destinasia</option>
                      </select>
                    </div>
                    <ul class="list-unstyled">
                      <li>
                        <a href="#">Week</a>
                      </li>
                      <li>
                        <a href="#">Month</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="areaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 ">
              <!-- Project Created -->
              <div class="box grad">
                <div class="box-body">
                  <h1 style="margin-left:15px; margin-bottom:0"><?php echo $counter['all'];?></h1>
                  <p class="small text-muted">Project Created</p>
                  <div class="mini-box" style="background:#559E63;">
                    <i class="material-icons" style="color: #fff;font-size: 30px;">assignment</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ">
              <!-- On Planing -->
              <div class="box grad">
                <div class="box-body">
                  <h1 style="margin-left:15px; margin-bottom:0"><?php echo $counter['on_planing'];?></h1>
                  <p class="small text-muted" >On Planning</p>
                  <div class="mini-box" style="background:#42B36E;">
                    <i class="material-icons" style="color: #fff;font-size: 30px;">alarm</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ">
              <!-- On Progress -->
              <div class="box grad">
                <div class="box-body">
                  <h1 style="margin-left:15px; margin-bottom:0"><?php echo $counter['on_progress'];?></h1>
                  <p class="small text-muted" >On Progress</p>
                  <div class="mini-box" style="background:#45D893;">
                    <i class="material-icons" style="color: #fff;font-size: 30px;">hourglass_empty</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ">
              <!-- Done -->
              <div class="box grad">
                <div class="box-body" style="border-right:0px !important;">
                  <h1 style="margin-left:15px; margin-bottom:0"><?php echo $counter['done'];?></h1>
                  <p class="small text-muted">Done</p>
                  <div class="mini-box" style="background:#5FE89F;">
                    <i class="material-icons" style="color: #fff;font-size: 30px;">assignment_turned_in</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <!-- Project Summary -->
          <div class="box">
            <div class="box-header pb-0">
              <h3 class="box-title">Project Summary</h3>
              <div class="col-sm-6 float-right mb-4 pr-0">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" id="myInput" placeholder="Search for..." aria-label="Search for..." onkeyup="myFunction()">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
            <div class="box-body" style="padding: 13px 20px !important">
              <table class="table table-responsive table-md table-hover" id="myTable" >
                <thead>
                  <tr>
                    <th scope="col" class="dash-title">Project Name</th>
                    <th scope="col" class="dash-title">Progress</th>
                  </tr>
                </thead>
                <tbody >
                  <?php
                  foreach($all_project as $u){
                    $nama_project = $u->nama_project;
                    $progress = $u->progress;
                    if($progress == null){
                      $progress = 0;
                    }
                    echo'
                    <tr>
                    <td>'.$nama_project .'</td>
                    <td>'.$progress .'%</td>
                    </tr>
                    ';
                  }
                  ?>
                </tbody>
              </table>
              <nav aria-label="Page navigation example" class="float-right pr-0">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
  </div>
<script type="text/javascript" src="<?php echo base_url('assets/js/Chart.min.js'); ?>"></script>
</div>
</body>
<script>
// Function for Table seraching
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
//Function for open Sidenav
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("nav").style.marginLeft = "200px";
    document.getElementById("burger").style.display = "none";
}
//Function for close Sidenav
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("nav").style.marginLeft = "auto";
    document.getElementById("burger").style.display = "block";
}
//FUnction for Chart Area
$(function () {
  // Get context with jQuery - using jQuery's .get() method.
  var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var areaChart = new Chart(areaChartCanvas);
  var areaChartData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
      {
        label: "Electronics",
        fillColor: "rgba(210, 214, 222, 1)",
        strokeColor: "rgba(210, 214, 222, 1)",
        pointColor: "rgba(210, 214, 222, 1)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56, 55, 40]
      },
      {
        label: "Digital Goods",
        fillColor: "rgba(26, 188, 156,1.0)",
        strokeColor: "rgba(26, 188, 156,0.8)",
        pointColor: "rgba(26, 188, 156,1.0)",
        pointStrokeColor: "rgba(26, 188, 156,0.8)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [28, 48, 40, 19, 86, 27, 90]
      }
    ]
  };
  var areaChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };
  //Create the line chart
  areaChart.Line(areaChartData, areaChartOptions);
});
</script>
</html>
