<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Admin/home.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <nav>
            <ul>
            <li><a href="<?php echo ROOT ?>/Admin/Home" class="logo">
                        <img src="<?php echo ROOT ?>/image/Manager/home-button.png">
                        <span class="nav-item"></span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">Add D_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">Add C_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View D_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View C_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View Customer</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View Complain</span>
                    </a></li>



                <li><a href="#" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1 class="admin">Admin Dashboard</h1>
                <i class="fas fa-user-cog"></i>
            </div>

<br><br>

<div id="container6">
  <div><h1 class="ad">10100<br><br> USERS</h1></div>
  <div></div>
  <div></div>
  <div></div>
</div>



<div class="row">
  <div class="column" style="background-color:transparent;">


  <canvas id="myChart2" style="width:100%;max-width:500px"></canvas>

<script>
     
        var x1 =" <?php echo " $eligible_amount" ; ?>";
        var x2 =" <?php echo " $eligible_amount2" ; ?>";
        var x3 =" <?php echo " $eligible_amount3" ; ?>";
        var x4 =" <?php echo " $eligible_amount4" ; ?>";
var xValues = ["92-Octane", "95-Octane", "Super-Diesel", "Auto-Diesel"];
var yValues = [x1, x2, x3, x4];
var barColors = [
  "#091d2a",
  "#2e5976",
  "#547b95",
  "#91abbc"
];

new Chart("myChart2", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Availabilty of Fuel"
    }
  }
});
 
</script>

  </div>
  <div class="column" style="background-color:transparent;">
    <br><br><br><br><br><br><br><br>
  <table id="customers">
  <tr>
    <th>Fuel Type</th>
    <th>Available</th>
    <th>Not Allowed</th>
    <th>Price</th>
  </tr>
  <tr>
    <td><?php echo $data['fuel_type']; ?></td>
    <td><?php echo $data['eligible_amount']; ?></td>
    <td>Germany</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td><?php echo $data['fuel_type2']; ?></td>
    <td><?php echo $data['eligible_amount2']; ?></td>
    <td>Sweden</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td><?php echo $data['fuel_type3']; ?></td>
    <td><?php echo $data['eligible_amount3']; ?></td>
    <td>Mexico</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td><?php echo $data['fuel_type4']; ?></td>
    <td><?php echo $data['eligible_amount3']; ?></td>
    <td>Austria</td>
    <td>Germany</td>
  </tr>
  
</table>

  </div>
</div>



<br>





<br><br><br><br><br><br>















            <div class="users">
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/m1.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Distribution/';">Update Fuel Availability</button>
                </div>
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/m2.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Customer_manager/';">View & Analyze Fuel stock</button>
                </div>
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/emp.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Distribution/';">Add Daily Report</button>
                </div>
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/cus.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Customer_manager/';">View Report history</button>
                </div>
            

            </div>


            <div class="users">
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/m1.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Distribution/';">View Pumpers</button>
                </div>
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/m2.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Customer_manager/';">View Orders</button>
                </div>
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/emp.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Distribution/';">Assign Pumpers</button>
                </div>
                <div class="card">
                    <img src="<?php echo ROOT ?>/image/Manager/cus.png">

                    <div class="per">

                    </div>
                    <button onclick="window.location.href= '<?php echo ROOT ?>/Admin/Customer_manager/';">Lubricants</button>
                </div>
            

            </div>




<br><br>








<div class="row">
    <br><br> <br>
  <div class="column" style="background-color:transparent;">


  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = [50,60,70,80,90,100,110,120,130,140,150];
var yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>

  </div>
  <div class="column" style="background-color:transparent;">
    
    <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [  "#091d2a","#2e5976","#547b95","#91abbc"];

new Chart("myChart3", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>

  </div>
</div>










    </div>

</body>

</html>