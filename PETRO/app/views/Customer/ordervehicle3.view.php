

<?php
if(empty($data['message'])){
    $data['message']=NULL;
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
   
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/ordervehicle.css" text="text/css">
     <!-- My CSS -->
    
   

    <title>petro</title>
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

            <li>
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
  
            </div>

            <ul class="box">
            <li>
            <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3> Auto Diesel </h3><br>
                        <p class="av">Rs.<?php echo  $data['price_auto'] ?></p><br>
                        <p class="av"><?php echo  $data['remain_auto'] ?> L</p>
                    </span>
                </li>
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <h3> Octane 92</h3><br>
                        <p class="av">Rs.<?php echo  $data['price_92'] ?></p><br>
                        <p class="av"><?php echo  $data['remain_92'] ?> L</p>
                    </span>
                </li>
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <h3> Octane 95 </h3><br>
                        <p class="av">Rs.<?php echo  $data['price_95'] ?></p><br>
                        <p class="av"><?php echo  $data['remain_95'] ?> L</p>
                    </span>
                </li>

                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <h3> Super Diesel </h3><br>
                        <p class="av">Rs.<?php echo  $data['price_super'] ?></p><br>
                        <p class="av"><?php echo  $data['remain_super'] ?> L</p>
                    </span>
                </li>
            </ul>




            <br><br>





<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Place an Order</h3>
         
        </div>
    

                
        <p class="err">        
        <?php
      
    echo $data['message'];
?>
</p>      




        <form action="<?php echo ROOT ?>/Customer/Ordervehicle3/add " method="POST">
   

   
   
     <input type="hidden" name="id" value="<?php echo $data['id']; ?>" class="box1" readonly >
     <input type="hidden" name="email" value="<?php echo $data['email']; ?>" class="box1" readonly > <br>
     <input type="text" name="vno" value="<?php echo $data['vno2']; ?>" class="box1" readonly><br><br>
 

     <input type="text" name="vtype" value="<?php echo $data['vtype2']; ?>" class="box1" readonly><br><br>


    <?php 
if($data['ftype2']=="petrol"){?>

    <select name="ftype" class="box1" required>
    <option value=""disabled selected hidden>--Fuel Type--</option>
        <option value="octane 92">Octane 92</option>
        <option value="octane 95">Octane 95</option>
    
    </select>
    <?php } ?>
    
    

    
    
                                               <?php 
if($data['ftype2']=="diesel"){?>

    <select name="ftype" class="box1" required>
    <option value=""disabled selected hidden>--Fuel Type--</option>
        <option value="super diesel"> Super Diesel</option>
        <option value="auto diesel"> Auto Diesel</option>
    
    </select>
    <?php } ?>
    

    

    <?php if($data['vtype2']=="car")
   {
    $max= $data['car'];;
   }
    else if($data['vtype2']=="van"){
        $max= $data['car'];;
    }

    else if($data['vtype2']=="threewheel"){
        $max= $data['three'];;
    }

    else if($data['vtype2']=="mcycle"){
        $max= $data['mc'];;
    }

    else {
        $max= $data['bus'];;
    }
   ?>

   <br><br>   
    <input type="number" name="amount" placeholder="Fuel amount" class="box1" min="1"  max="<?php echo "$max" ?>"required><br><br>
    

     
    <input type="hidden" id="points" name="petropoints" value="<?php echo $data['points']; ?>"><br>
    


<!-- Petro Points -->



  <?php 
   if($data['points']>=300){?><br>
   <p class="not"> Your <?php echo $data['points']; ?> Points will be reduce from your bill</p>

  <input type="hidden" id="points" name="points" value="<?php echo $data['points']; ?>">
  <?php }

   else{?>
<br>

<input type="hidden" id="points" name="points" value="0">

<?php } ?>






    <button type="submit" name="submit" class="btn4" required>Place Order</button>
    <br>
    

</form>
</div>




 <!-- Max amount for vehicles -->



    
    <div class="todo">
    <h1>Maximum Amount at a Time</h1><br>
        <div class="head">
           
       


        <ul class="todo-list">
        
      
        <li class="completed">
       <p> Car  </p> <p class="max"><?php echo $data['car']; ?> L </p>
       
      
        </li>
        

   
        <li class="completed">
     
        <p> Van  </p> <p class="max"><?php echo $data['van']; ?> L</p>
           
        </li>
     


        <li class="completed">
        <p> 3 Wheel  </p> <p class="max"><?php echo $data['three']; ?> L</p>
          
        </li>


 
        <li class="completed">
        <p> Motor - Cycle  </p> <p class="max"><?php echo $data['mc']; ?> L</p>
        </li>

        <li class="completed">
        <p> Bus  </p> <p class="max"><?php echo $data['bus']; ?> L</p>
       
        </li>

        <li class="completed">
        <p> Heavy Vehicles  </p> <p class="max"><?php echo $data['heavy']; ?> L</p>
       
        </li>
  
<br>
        <li class="point">
              
              <span class="text">
                  <h2> Petro Points - <?php echo  $data['points'] ?></h2>
                
              </span>
             
          </li>
          <p>You can redeem the petro points when points exceed 300 </p>
  
    
    </ul> 
        




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


    </script>
</body>

</html>