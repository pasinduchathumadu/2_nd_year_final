<?php
  if(!empty($data['92'])){
    $v1=$data['92'];
    $v2=$data['95'];
    $v3=$data['super'];
    $v4=$data['auto'];
    $v5=$data['total_A'];
    $v6=$data['total_B'];
    $v7=$data['total_c'];
    $v8=$data['total_d'];
   
  
  }
  else{
    $v1=NULL;
    $v2=NULL;
    $v3=NULL;
    $v4=NULL;
    $v5=null;
    $v6=null;
    $v7=null;
    $v8=null;
  
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Pumper/fuck.css" text="text/css">
    
   

    <title>AdminHub</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-gas-pump'></i>
            <span class="text">PETRO</span>
        </a>
        <ul class="side-menu top">
            <li class="">
                <a href="<?php echo ROOT ?>/Pumper/User">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Working Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working_hours">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Working Hours</span>
                </a>
            </li>

            <li class="active">
                <a href="<?php echo ROOT ?>/Pumper/Analysis">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working_salary">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Salary Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Change_password">
                    <i class='bx bxs-group'></i>
                    <span class="text">Change Password</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Pumper/Complain">
                    <i class='bx bxs-group'></i>
                    <span class="text">Complain Box</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT?>/Pumper/Logout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
   
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
           
            <form action="#">
                <div class="form-input">


                    <button type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
        
            <?php echo $_SESSION['first_name']?>
            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/th.jpg">
            </a>
        </nav>
        <!-- MAIN -->
        <main>
        <div class="head-title">
                <h2>Analyze The Fuel Distributed  : <?php echo $data['date']?> <br>By <?php echo $_SESSION['id']?> </h2>
               
  
            </div>

<div class="table-data">
    <div class="order">
            <div class="row">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="myChart1" style="width:110%;max-width:700px"></canvas>
    <canvas id="myChart2" style="width:110%;max-width:700px"></canvas>
    <script>
        var x1 =" <?php echo "$v1" ; ?>";
        var x2 =" <?php echo "$v2" ; ?>";
        var x3 =" <?php echo "$v3" ; ?>";
        var x4 =" <?php echo "$v4" ; ?>";
        var x5 =" <?php echo "$v5" ; ?>";
        var x6 =" <?php echo "$v6" ; ?>";
        var x7 =" <?php echo "$v7" ; ?>";
        var x8 =" <?php echo "$v8" ; ?>";


        var xValues = ["OCTANE 92", "OCTANE 95", "SUPER DIESEL", "AUTO DIESEL"];
        var yValues = [ x1, x2,x3,x4,0];
        var barColors = ["#808000", "#800000","#808000","#800000","#091d2a"];

        var xValues_2 = ["Machine 1", "Machine 2", "Machine 3", "Machine 4"];
        var yValues_2 = [ x5,x6,x7,x8,0];
        

        var chart1=new Chart("myChart1", {
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
            text: "PUMPED FUEL"
            }
        }
        });
        </script>
        <script>
        var chart2=new Chart("myChart2", {
        type: "bar",
        data: {
            labels: xValues_2,
            datasets: [{
            backgroundColor: barColors,
            data: yValues_2
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "MACHINE OF THE FILLINE STATION"
            }
        }
        });
    </script>
    <script>initCharts();</script>
    <br><br><br>
    

    </div>
    <div class="head">
            <h3>Request The Date</h3>
        </div>
        <form action="<?php echo ROOT ?>/Pumper/Analysis/previous" method="post">
        <label class="pre1">REQUEST PREVIOUS DAY:</label>
        <input type="date" id="bdaymonth" name="bdaymonth" class="bday"  required>

        <button type="submit" name="submit" class="btn">GENERATE REPORT</button>
        

        </form>




</div>
<div class="todo">
    <div class="head">
        <h3>DISTRIBUTED FUEL</h3>
    </div>
    <div class="todo-list">
    <li>OCTANE 92  &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <?php echo $v1?> Liters
        </li>
        <li>OCTANE 95  &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <?php echo $v2?> Liters
        </li>
        <li>SUPER DIESEL  &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $v3?> Liters
        </li>
        <li>AUTO DIESEL  &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $v4?> Liters
        </li>
        

    </div>
    <br><br>
    <li class="table-header">
        .

    </li><br><br>
    <div class="head">
        <h3>Machine</h3>
    </div>
    <div class="todo-list">
    <div class="OUTLINE">
        PETROL
    </div><br>
    <li>Machine 1 &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $v5?><?php echo " Liters"?>
        </li>
        <li>Machine 2  &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $v6?> Liters
        </li>
        <div class="OUTLINE">
        DIESEL
    </div><br>
        <li>Machine 3  &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $v3?> Liters
        </li>
        <li>Machine 4  &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $v4?> Liters
        </li>
    </div>
    
</div>




  





        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>



const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
})





if (window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
    if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
})
    </script>
</body>

</html>