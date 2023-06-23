





<?php
if(empty($data['total'])){
    $data['total']=NULL;
}
if(empty($data['total1'])){
    $data['total1']=NULL;
}
if(empty($data['total2'])){
    $data['total2']=NULL;
}
if(empty($data['total3'])){
    $data['total3']=NULL;
}
if(empty($data['total4'])){
    $data['total4']=NULL;
}

if(empty($data['totalamount'])){
    $data['totalamount']=NULL;
}
if(empty($data['alltotal92'])){
    $data['alltotal92']=NULL;
}

if(empty($data['alltotal95'])){
    $data['alltotal95']=NULL;
}

if(empty($data['alltotalsd'])){
    $data['alltotalsd']=NULL;
}

if(empty($data['alltotalad'])){
    $data['alltotalad']=NULL;
}

if(empty($data['alltotal'])){
    $data['alltotal']=NULL;
}

if(empty($data['alltotalprice'])){
    $data['alltotalprice']=NULL;
}

if(empty($data['No'])){
    $data['No']=NULL;
}

if(empty($data['startDate'])){
    $data['startDate']=NULL;
}

if(empty($data['finishDate'])){
    $data['finishDate']=NULL;
}

if(empty($data['Date'])){
    $data['Date']=NULL;
}







?>

<?php
if(!empty($data)){
    $all92=$data['alltotal92'];
    $all95=$data['alltotal95'];
    $allsd=$data['alltotalsd'];
    $allad=$data['alltotalad'];
}
else{
    $all92=NULL;
    $all95=NULL;
    $allsd=NULL;
    $allad=NULL;
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/home2.css" text="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
     <!-- My CSS -->
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/mv.css" text="text/css">
   

    <title>PETRO</title>
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
                <a href="<?php echo ROOT ?>/Customer/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo ROOT ?>/Customer/Store">
                <i class='bx bx-store'></i>
                    <span class="text">Store</span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo ROOT ?>/Customer/Pendingstore">
                <i class='bx bxs-stopwatch'></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Pumphistory">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Pumping History</span>
                </a>
            </li>

            <li class="active">
                <a href="<?php echo ROOT ?>/Customer/Analyze">
                <i class='bx bxs-bar-chart-alt-2' ></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Storehistory">
                <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Store History</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Complaint">
                <i class='bx bxs-envelope'></i>
                    <span class="text">Complaints</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Feedback">
                <i class='bx bxs-message-dots'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Aboutus">
                <i class='bx bxs-business' ></i>
                    <span class="text">About Us</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Customer/Profile">
                <i class='bx bxs-user'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
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
                  
                  <button type="submit" class="search-btn"></button>
              </div>
          </form>

          <p> <?php echo  $data['fname'] ?></p>
    
          <a href="<?php echo ROOT ?>/Customer/Profile" class="profile">
       
          <img src="<?php echo ROOT ?>/image/bp.jpg"  style="width:35px;height:35px;"></a>
        
          </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
  <h1> Fuel Analyze </h1>
            </div>



            <ul class="box">
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <p> Auto Diesel </p>
                        <p>Rs.<?php echo  $data['price_auto'] ?></p>
                    
                    </span>
                </li>
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <p> Octane 92</p>
                        <p>Rs.<?php echo  $data['price_92'] ?></p>
                       
                    </span>
                </li>
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <p> Octane 95 </p>
                        <p>Rs.<?php echo  $data['price_95'] ?></p>
                        
                    </span>
                </li>

                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <p> Super Diesel </p>
                        <p>Rs.<?php echo  $data['price_super'] ?></p>
                   
                    </span>
                </li>
            </ul>




            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h1>Choose a Vehicle and Time period </h1>
                     
                    </div>
                    <br>
            <form action="<?php echo ROOT?>/Customer/Analyze/Analyze" method="post">
            <label for="" class="label">Vehicle No:</label>
            <select name="No" class="No" required>
            <?php 
  if($data['vno']!="" ){?>  <option value="<?php echo $data['vno']; ?>"><?php echo $data['vno']; ?></option><?php } ?>
       <?php   if($data['vno1']!="" ){?>      <option value="<?php echo $data['vno1']; ?>"><?php echo $data['vno1']; ?></option><?php } ?>
       <?php   if($data['vno2']!="" ){?>   <option value="<?php echo $data['vno2']; ?>"><?php echo $data['vno2']; ?></option><?php } ?>
  
       <?php   if($data['sNo']!="" ){?>  <option value="<?php echo $data['sNo']; ?>"><?php echo $data['sNo']; ?></option><?php } ?>
       
</select>
<br><br>
        
            <label for="" class="label">From</label>
            <input type="date" class="input" name="startDate">
            <br>
            <br>
            <label for="" class="label">To</label>
            <input type="date" class="input" name="finishDate"><br>
           
           
            <br>
            <br>
            
                <a href=""><button type="onclick" class="button">Analize</button></a>
            
        </form>
                


</div>
   
   
   

                
                <div class="todo">
                <h1>    <?php echo  $data['No'] ?> Analyze</h1><br>
                <h4> <?php echo  $data['Date'] ?> </h4>
                <br>
                  
                       
                   


                    <ul class="todo-list">



                    <ul class="todo-list">
                    
                 

                        <li class="completed">
                            <p> Total Amount :</p><p class="total"><?php echo  $data['total'] ?>L</p>
                          
                        </li>
                 

  
                        <li class="completed">
                        <p> Total Price :</p><p class="total">Rs.<?php echo  $data['totalamount'] ?></p>
                     
                        </li>
                

                        <li class="completed">
                        <p> Octane 92 Amount :</p><p class="total"><?php echo  $data['total1'] ?>L</p>
                    
                        </li>
                    
                        <li class="completed">
                        <p> Octane 95 Amount :</p><p class="total"><?php echo  $data['total2'] ?>L</p>
                       
                        </li>

                        <li class="completed">
                        <p> Super Diesel Amount :</p><p class="total"><?php echo  $data['total4'] ?>L</p>
                       
                        </li>

                        <li class="completed">
                        <p> Auto Diesel Amount :</p><p class="total"><?php echo  $data['total3'] ?>L</p>
                       
                        </li>
                     
                    
                    </ul>
                    
                    
                    
              
                
                
                    




            </div></div>

















            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h1>Analyze Chart</h1><br>
                        <h4> <?php echo  $data['Date'] ?></h4><br>
                     
                    </div>
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    <script>

                        window.onload=function(){
                            var x1="<?php echo "$all92";?>";
                            var x2="<?php echo "$all95";?>";
                            var x3="<?php echo "$allsd";?>";
                            var x4="<?php echo "$allad";?>";
                            console.log(x1);
                            

var xValues = ["octane 92", "octane 95", "Super Diesel", "Auto Diesel"];
var yValues = [x1, x2, x3, x4,0];
var barColors = [
  "#0c2536",
  "#205b81",
  "#71b3e2",
  
  "#a8b9c5"
];


var chart2=new Chart("myChart", {
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
      text: "Fuel Analyze of All vehicles & Machine"
    }
  }
});
                        }
                        chart2.render();
</script>
                


</div>
   
   
   

                
                <div class="todo">
                <h1>All Vehicles & Machine Analyze</h1><br>
                  
                       
                   


                <ul class="todo-list">
                    
                <h4> <?php echo  $data['Date'] ?> </h4><br>

                        <li class="completed">
                            <p> Total Amount :</p><p class="total"><?php echo  $data['alltotal'] ?>L</p>
                    
                        </li>
                 

  
                        <li class="completed">
                        <p> Total Price :</p><p class="total">Rs.<?php echo  $data['alltotalprice'] ?></p>
                     
                        </li>
                

                        <li class="completed">
                        <p> Octane 92 Amount :</p><p class="total"><?php echo  $data['alltotal92'] ?>L</p>
                        
                        </li>
                    
                        <li class="completed">
                        <p> Octane 95 Amount :</p><p class="total"><?php echo  $data['alltotal95'] ?>L</p>
                       
                        </li>

                        <li class="completed">
                        <p> Super Diesel Amount :</p><p class="total"><?php echo  $data['alltotalsd'] ?>L</p>
                       
                        </li>

                        <li class="completed">
                        <p> Auto Diesel Amount :</p><p class="total"><?php echo  $data['alltotalad'] ?>L</p>
                       
                        </li>
                     
                    
                    </ul>
                    




            </div></div>






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