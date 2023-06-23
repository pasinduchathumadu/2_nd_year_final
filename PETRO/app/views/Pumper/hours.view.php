<?php
    $flag='';
    if(empty($data['error'])){
        $flag=true;
       
    }
    else{
        $data['total']= NULL;
        $v1=null;
        $v2=null;
        $flag=false;
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
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Pumper/working.css" text="text/css">
    
   

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
            <li class="active">
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
  
            </div>

<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Working Hours - <?php echo $data['date']?></h3> <br><h3><span class="txt">Pumper ID - <?php echo $data['id']?></span></h3>

                    </div>
                    <div class="attendance-list">
                   
                    <div class="bar"> 
                        <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search" class="search"><span class="txt1">
                        
                        <button  class="btn" onclick="openForm()">Filter</button></span>
               
                <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">  
              

                
                        <thead>
                            <tr>
                            <th>N0</th>
                            <th>Date</th>
                            <th>Login Time</th>
                            <th>Logout Time</th>
                            <th>Working Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($flag==true){
                            if (mysqli_num_rows($data['result'])> 0) {
                                while($row = mysqli_fetch_assoc($data['result'])) {
                                    $seconds=($row['working_hours'])%60;
                                    $minutes=($row['working_hours'])/60%60;
                                    $hours =(int)(($row['working_hours'])/3600);
                                echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['Date']."</td>
                                <td>".$row['Login_Time']."</td>
                                <td>".$row['Logout_TIME']."</td>
                                <td>".$hours."h:".$minutes."min:".$seconds."s". "</td>
                                </tr>";
                               
                                }
                            }

                        }
                        else{
                                echo $data['error'];
                        }
                    ?>
 
                        </tbody>
                    </table>
                   
                </div>
                </div>
</div>
</div>

               
                    <div class="form-inner">
                    <div id="myForm" class="form-popup">
                    <form action="<?php echo ROOT?>/Pumper/Working_hours/previous" method="post">
                    <a href="<?php echo ROOT?>/Pumper/Working_hours" id="close-popup"><i class='bx bx-x'></i></a>
                        <label class="FROM">From :</label>  
                        <div class="field">
                            <input type="date" name="from" required>
                        </div>
                        <label class="TO">To :</label>   <div class="field"><input type="date" name="to" required/></div><br><br>
                        <button type="submit" name="submit" class="btn">Click Here</button>
                    </form>
                    </div>
                    </div>
                    
                    <div class="table-data">
                        <div class="order">
                    
                   
                        <div class="head">
                            
                        </div>

                        <div class="row">
                        <?php
                                $seconds=($data['total'])%60;
                                $minutes=($data['total'])/60%60;
                                $hours =(int)(($data['total'])/3600);
        
                            ?>
        
                           
            


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="myChart1" style="width:10%;max-width:700px"></canvas>
    
    <script>

        var x1 =" <?php echo "$seconds" ; ?>";
        var x2 =" <?php echo "$hours" ; ?>";
        var x3 =" <?php echo "$minutes" ; ?>";
       
       

        var xValues = ["Hours","Minutes","Seconds"];
        var yValues = [x2,x3,x1];
        var barColors = ["#808000", "#90EE90","#ADD8E6"];

    

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
            scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
                },
            legend: {display: true},
            title: {
            display: true,
            text: ""
            }
        }
        });
        </script>
    <script>initCharts();</script>
    <br><br><br>
                        </div>
    

  
                    
                    </div>
                    <div class="todo">
                        <div class="CENTER"><br>
                        <h1>Analyzing Total Working Hours</h1><br>
                        <h1><?php echo $data['date']?></h1><br><br>

                        <h3>Hours   :<?php echo $hours?>H</h3><br><br>
                        <h3>Minutes :<?php echo $minutes?>Min</h3><br><br>
                        <h3>Seconds :<?php echo $seconds?>S</h3>
                        
                    
                    </div>
                    </div>
                        </div>
                    
                    
                    
                   
                
               
                    



        </main>
        <div class="overlay"></div>

        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>
 function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                
                if (td||td1||td2||td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;


                    if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else if (txtValue .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue2 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }else if (txtValue3 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

}
 
const overlay = document.querySelector(".overlay");
    
    function openForm() {
    document.getElementById("myForm").classList.add("animate");
    document.getElementById("myForm").style.display = "block";
    overlay.classList.add("overlayStyle");
}

function closeForm() {
document.getElementById("myForm").classList.remove("animate");
document.getElementById("myForm").style.display = "none";
overlay.classList.remove("overlayStyle");
}
   

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