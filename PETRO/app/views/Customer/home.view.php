
<?php
    $flag='';
    if(empty($data['error'])){
        $flag=true;
    }
    else{
        $flag=false;
    }
?>

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
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/home2.css" text="text/css">
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/shop.css" text="text/css">
    
   

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
            <li class="active">
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
       
          <img src="<?php echo ROOT ?>/image/bp.jpg"  onclick="togglemenu()"style="width:35px;height:35px;">
        
          <div class="sub-menu-wrap" id="submenu">
                <div class= "sub-menu">
                    <a href="<?php echo ROOT ?>/Staff-manager/Profile" class="sub-menu-link">
                        <img src="<?php echo ROOT ?>/image/profile_dropdown/profile.png">
                        <p>Profile</p>
                        <span>></span>
                    </a>
                    <a href="<?php echo ROOT ?>/Staff-manager/Logout" class="sub-menu-link">
                        <img src="<?php echo ROOT ?>/image/profile_dropdown/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
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
                        <h3> Auto Diesel </h3>
                        <h3>Rs.<?php echo  $data['price_auto'] ?></h3>
                        <p><?php echo  $data['remain_auto'] ?> L</p>
                    </span>
                </li>
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <h3> Octane 92</h3>
                        <h3>Rs.<?php echo  $data['price_92'] ?></h3>
                        <p><?php echo  $data['remain_92'] ?> L</p>
                    </span>
                </li>
                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <h3> Octane 95 </h3>
                        <h3>Rs.<?php echo  $data['price_95'] ?></h3>
                        <p><?php echo  $data['remain_95'] ?> L</p>
                    </span>
                </li>

                <li>
                <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                    <h3> Super Diesel </h3>
                        <h3>Rs.<?php echo  $data['price_super'] ?></h3>
                        <p><?php echo  $data['remain_super'] ?> L</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Pending Fuel Orders</h3>
                     
                    </div>
                    <table>
                        <thead>
                            <tr>
                               
            <th scope>Order ID</th>
			  <th >V/M No</th>
              
			   <th scope>Fuel Type</th>
			  <th scope>Amount(l)</th>
			  <th scope>Price</th>
			  <th scope>Order Date</th>
			  <th scope>Exp Date</th>
                            </tr>
                        </thead>
                        <tbody>
        
                 			 
			 <?php
    

  
  
  

        if (mysqli_num_rows($data['result']) > 0) {
            while($row = mysqli_fetch_assoc($data['result'])) {

	  
				echo "<tr>
			<td>".$row['Oid']."</td>
            <td>".$row['VMno']."</td>
            
            <td>".$row['ftype']."</td>
            <td>".$row['amount']."</td>
            <td>".$row['price']."</td>
			<td>".$row['cdate']."</td>
			<td>".$row['ndate']."</td>
		
			
        
			</tr>";

						
					
				
			}}
		
		   ?>
  



                        </tbody>
                        
                    </table><br>
        
                  
                </div>



                



                <div class="todo">
                    <div class="head">
                        <h3>Place an Order</h3>
                       
                    </div>
                    <ul class="todo-list">
                     <h3> My Vehicles </h3>   <br>
                    
                    <?php 
  if($data['vno']!="" ){?>
  <?php $_SESSION['o1']=$data['vno'];?>
                        <li class="completed">
                            
                            <a class="VM" href="<?php echo ROOT ?>/Customer/Ordervehicle1"><?php echo  $data['vno'] ?></a>
                            <i class='bx bxs-car'></i>
                        </li>
                        <?php } ?>

                        <?php 
  if($data['vno1']!="" ){?>
  
                        <li class="completed">
                        <a class="VM" href="<?php echo ROOT ?>/Customer/Ordervehicle2"><?php echo  $data['vno1'] ?></a>
                        <i class='bx bxs-car'></i>
                        </li>
                        <?php } ?>

                        <?php 
  if($data['vno2']!="" ){?>
  <?php $_SESSION['o3']=$data['vno2'];?>
                        <li class="completed">
                        <a class="VM" href="<?php echo ROOT ?>/Customer/Ordervehicle3"><?php echo  $data['vno2'] ?></a>
                        <i class='bx bxs-car'></i>
                        </li>
                        <?php } ?>
                        <br>
                        <h3> My Machines </h3>   <br>
                        <?php 
  if($data['sNo']!="" ){?>
                        <li class="completed">
                        <a class="VM" href="<?php echo ROOT ?>/Customer/Ordermachine"><?php echo  $data['sNo'] ?></a>
                        <i class='bx bxs-checkbox-minus'></i>
                       
                        </li>
                        <?php } ?>
                    
                    </ul>
<br><br>

                    <ul class="box2">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h2> Petro Points <?php echo  $data['points'] ?></h2>
                      
                    </span>
                </li>
</ul>

                </div>
            </div>

<br><br>






<div class="container-fluid">
<div class="container">
<div class="search">
<h1>Latest Products</h1>

</div>
<div class="product-list">

<?php


   if (mysqli_num_rows($data['result1']) > 0) {
            while($row = mysqli_fetch_assoc($data['result1'])) {

              $tomorrow = date("Y/m/d", time() + 86400);
				?>
    <div class="product">
	<form action="<?php echo ROOT ?>/Customer/Store/add " class="box" method="POST">
         <img  class="imgg" src="<?php echo ROOT ?>/image/<?php echo $row['image']; ?>" alt="" width="100px"; height="100px"; >
         <h3 class="name"><?php echo $row['name']; ?></h3>
         <div class="price">Rs.<?php echo $row['price']; ?></div>
		  <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
		
        
		
      </form>

      </div>
	  <?php
      };
   };
   ?>
   

</div>
</div>
<a class="shop" href="<?php echo ROOT ?>/Customer/Store"> Shop Now </a>
</div><br><br>










<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Pending Store Orders</h3>
                      
                    </div>
                    <table>
                        <thead>
                            <tr>
                               
            <th scope="col">Order ID</th>
			  <th scope="col">Product ID</th>
			  <th scope="col">Product Name</th>
			   <th scope="col">Price</th>
			  <th scope="col">Quantity</th>
			  <th scope="col">Ordered Date</th>
                            </tr>
                        </thead>

                        <tbody>
        
                 			 
        <?php






   if (mysqli_num_rows($data['result2']) > 0) {
       while($row = mysqli_fetch_assoc($data['result2'])) {

 
           echo "<tr>
       <td>".$row['Oid']."</td>
       <td>".$row['p_id']."</td>
       
       <td>".$row['name']."</td>
       <td>".$row['price']."</td>
       <td>".$row['quantity']."</td>
       <td>".$row['odt']."</td>
      
   
       
   
       </tr>";

                   
               
           
       }}
   
      ?>




                   </tbody>

                    </table>
                    <br>
                    <a class="pending" href="<?php echo ROOT ?>/Customer/Pendingstore"> See All </a>
                  
                </div>
    </div>

             



        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
    </script>


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