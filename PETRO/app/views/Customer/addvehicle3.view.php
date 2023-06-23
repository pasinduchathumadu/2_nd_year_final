






<?php
if(empty($data['error'])){
    $data['error']=NULL;
}
?>

<?php 
		
		$url1="/PETRO/public/Customer/Addvehicle1";
		$url2="/PETRO/public/Customer/Addvehicle2";
		$url3="/PETRO/public/Customer/Addvehicle3";
    $url4="/PETRO/public/Customer/Addmachine";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/home2.css" text="text/css">
     <!-- My CSS -->
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/addvehicle.css" text="text/css">
   
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
            <h1 class="add1"> Add Vehicle 3</h1>
            </div>
            <br><br>
















            <div class="table-data">
                <div class="order">
                    <div class="head">
                    
                     
                    </div>
                

                            
                        
            

   
<form action="<?php echo ROOT?>/Customer/Addvehicle3/add" method="POST">
    
  
	  
	 
	     
      
     <p class="err">  <?php
      
	   echo $data['error'];
 ?>
 </p>
    
       
		
            <input type="text" name="vno2" value="<?php echo $data['vno2']; ?>" class="box" placeholder="Vehicle Number"   required>
			
         	   <select name="vtype2" class="box" id="vno1" value="<?php echo $data['vtype2']; ?>" required >
				                    <option value=""disabled selected hidden  >--Vehicle Type--</option>
                                    <option value="car">Car</option>
                                    <option value="van">Van</option>
                                    <option value="threewheel">Three - Wheel</option>
                                    <option value="mcycle">Motor-Cycle</option>
                                    <option value="bus">Bus</option>
                                    <option value="heavy">Heavy Vehicles</option>
                                </select>
        
			
			  <select name="ftype2" class="box" id="vno1" value="<?php echo $data['ftype2']; ?>" required >
			                       <option value=""disabled selected hidden  >--Fuel Type--</option>
                                   <option value="petrol">Petrol</option>
                                    <option value="diesel">Diesel</option>
                                </select>

                                <input type="hidden" name="phone" value="<?php echo $data['phone']; ?>" >
			 
			  
			
        
            <br><br>
     
       
		   <input type="submit" value="Add Vehicle 3" name="Update vehicle" class="btn4"><br><br>
       
		<a href="profile.php" class="back2">Back</a>
     
	  

     
    
   </form>
</div>
   
   
   
   
   
   
  
   







                
                <div class="todo">
                <h1>Vehicles & Machines</h1><br>
                    <div class="head">
                       
                   


                    <ul class="todo-list">
                    
                  
                    <li class="completed">
                    <?php
    if ($data['vno'] == "")
{
echo ' <a href='.$url1.' target="_blank" class="add"> + Add Vehicle </a>'; 
}
?>
<a href="<?php echo ROOT ?>/Customer/Updatevehicle1" class="vehicle"> <?php echo $data['vno']; ?> </a>
                  
                    </li>
                    

               
                    <li class="completed">
                    <?php
    if ($data['vno1'] == "")
{
echo ' <a href='.$url2.' target="_blank" class="add"> + Add Vehicle </a>'; 
}
?>
<a href="<?php echo ROOT ?>/Customer/Updatevehicle2" class="vehicle"> <?php echo $data['vno1']; ?> </a>
                       
                    </li>
                 

           
                    <li class="completed">
                    <?php
    if ($data['vno2'] == "")
{
echo ' <a href='.$url3.' target="_blank" class="add"> + Add Vehicle </a>'; 
}
?>
<a href="<?php echo ROOT ?>/Customer/Updatevehicle1" class="vehicle"> <?php echo $data['vno2']; ?> </a>
                      
                    </li>
          

             
                    <li class="completed">
                    <?php
    if ($data['sNo'] == "")
{
echo ' <a href='.$url4.' target="_blank" class="add"> + Add Machine </a>'; 
}
?>
<a href="<?php echo ROOT ?>/Customer/Updatevehicle1" class="vehicle"> <?php echo $data['sNo']; ?> </a>
                   
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