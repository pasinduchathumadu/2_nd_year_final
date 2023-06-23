<?php
  if(($data['err'])==0){
    $v1=$data['OT_SALARY'];

    $v2=$data['HRA_s'];
    $v3=$data['DA_s'];
    $v4=$data['PF_s'];
    $v5=$data['GS_s'];
    $v6=$data['basic_s'];
    $v7= $data['total'];
 

    $t_1=$data['jan'];
    $t_2=$data['feb'];
    $t_3=$data['march'];
    $t_4=$data['april'];
    $t_5=$data['may'];
    $t_6=$data['jun'];
    $t_7=$data['july'];
    $t_8=$data['sep'];
    $t_9=$data['Aug'];
    $t_10=$data['oct'];
    $t_11=$data['nov'];
    $t_12=$data['dec'];
  
  }
  else{
    $v1=0;
    $v2=0;
    $v3=0;
    $v4=0;
    $v5=0;
    $v6=0;
    $v7=0;
    $t_1=$data['jan'];
    $t_2=$data['feb'];
    $t_3=$data['march'];
    $t_4=$data['april'];
    $t_5=$data['may'];
    $t_6=$data['jun'];
    $t_7=$data['july'];
    $t_8=$data['sep'];
    $t_9=$data['Aug'];
    $t_10=$data['oct'];
    $t_11=$data['nov'];
    $t_12=$data['dec'];
   
  
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
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Pumper/salary.css" text="text/css">
    
   

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
            <li class="active">
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

            <li>
                <a href="<?php echo ROOT ?>/Pumper/Analysis">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li class="active">
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
       
       

        <div class="table-data">
            <div class="order">
            <h2>Preveious Monthly Salaries - <?php echo $data['id']?></h2><br>
                <br><br><br><br> 
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                <script>
                    window.onload=function(){
                    var x1 ="<?php echo "$t_1"; ?>";
                    var x2 ="<?php echo "$t_2" ; ?>";
                    var x3 ="<?php echo "$t_3" ; ?>";
                    var x4 ="<?php echo "$t_4" ; ?>";
                    var x5 ="<?php echo "$t_5"; ?>";
                    var x6 ="<?php echo "$t_6" ; ?>";
                    var x7 ="<?php echo "$t_7" ; ?>";
                    var x8 ="<?php echo "$t_8" ; ?>";
                    var x9 ="<?php echo "$t_9"; ?>";
                    var x10 ="<?php echo "$t_10" ; ?>";
                    var x11 ="<?php echo "$t_11" ; ?>";
                    var x12 ="<?php echo "$t_12" ; ?>";

                    var xValues = ["JAN", "FEB", "MAR", "APR","MAY","JUN","JULY","AUG","SEP","OCT","NOV","DEC"];
                    var yValues = [x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12];
                    var barColors = ["#800000", "#800000","#800000","#091d2a","#091d2a"];
                    var label = ['Total Salary'];
                  
                    var chart2=new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{
                        label:label,
                        
                        backgroundColor: barColors,
                        data: yValues,
                        tension:0.1,
                        }]
                    },
                    options: {
                       
                        scales: {
                        y: 
                            {
                                min: 1000
                            }
                    
                    },
                        title: {
                        display: true,
                        text: "Total Salary - Month"
                        }
                       
                    }
                    });
                }
                    chart2.render();
                    </script>
                   
                   
                
            </div>

                
                <div class="order">
                
                <h4 class="middle">Payment Sheet Of <?php echo $data['month']?>-<?php echo $data['year']?></h4>




                    <ul class="responsive-table">
                    <li class="table-header">


                    </li>
                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">BASIC SALARY:</div>
                    
                    <div class="col col-4" data-label="Payment Status"><?php echo $v6?></div>
                    </li>
                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">Home Rental Allowance:</div>

                    <div class="col col-4" data-label="Payment Status"><?php echo $v2?></div>
                    </li>
                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">Daily Allowances:</div>

                    <div class="col col-4" data-label="Payment Status"><?php echo $v3?></div>
                    </li>
                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">OT Salary:</div>

                    <div class="col col-4" data-label="Payment Status"><?php echo $v1?></div>
                    </li>
                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">Gross Salary:</div>

                    <div class="col col-4" data-label="Payment Status"><?php echo $v5?></div>
                    </li>

                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">Provident Fund:</div>

                    <div class="col col-4" data-label="Payment Status"><?php echo $v4?></div>
                    </li>
                    
                    <li class="table-row">
                    <div class="col col-1" data-label="Job Id">TOTAL SALARY:</div>

                    <div class="col col-4" data-label="Payment Status"><?php echo $v7?></div>
                    </li>
                  

                    <form action="<?php echo ROOT ?>/Pumper/Working_salary/previous" method="post">
                        <label class="pre1">PREVIOUS SALARY REPORT:</label>
                        <input type="month" id="bdaymonth" name="bdaymonth" class="bday" required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      
                        <br><br>
                        <button class="btn">GENERATE REPORT</button>
                        <a href="<?php echo ROOT ?>/Pumper/Working_salary/Download"><i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span></a>

                    </form>

            </ul>
            </div>

               



                </div>
            </div>
            </div>
            




            </div>
            </div>





                </main>


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