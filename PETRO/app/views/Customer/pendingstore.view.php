



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
    $flag2='';
    if(empty($data['error'])){
        $flag2=true;
    }
    else{
        $flag2=false;
    }
?>

<?php
    $flag3='';
    if(empty($data['error'])){
        $flag3=true;
    }
    else{
        $flag3=false;
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
     <!-- My CSS -->
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/pending.css" text="text/css">
   

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
            
            <li class="active">
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
                    
                    <button type="submit" class="search-btn">
                </div>
            </form>
  
        
      
            
            <p> <?php echo  $data['fname'] ?></p>
    
            <a href="<?php echo ROOT ?>/Customer/Profile" class="profile">
 
    <img src="<?php echo ROOT ?>/image/bp.jpg"  style="width:35px;height:35px;  border-radius: 50%;"></a>
        
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
  
            </div>


			<h1> Pending Fuel Orders </h1><br>   






            <div class="table" >
		<table class="table1">
		  <thead>
			<tr>
			  <th scope="col">Order ID</th>
			  <th scope="col">Vehicle No</th>
			  <th scope="col">Fuel Type</th>
			   <th scope="col">Fuel Amount</th>
               <th scope="col">Price</th>
			
			  <th scope="col">Ordered Date</th>
              <th scope="col">Ordere Expire  Date</th>
			
			   
			  
			</tr>
		  </thead>
		  <tbody>
		     

				 
          <?php

   
	if($flag2==true){
        

         if (mysqli_num_rows($data['result3']) > 0) {
            while($row = mysqli_fetch_assoc($data['result3'])) {
				?>
                    
         <tr>
       
      
            <td><input class="box6" type="text" value="<?php echo $row['Oid']; ?>" name="oid" ></td>
          
            <td><input type="text" value="<?php echo $row['VMno']; ?>" name="user_id" class="box6"></td>
            <td><input type="text" value="<?php echo $row['ftype']; ?>" name="price" class="box6"></td>
            <td><input type="text" value="<?php echo $row['amount']; ?>" name="amount" class="box6"></td>
            <td><input type="text" value="Rs.<?php echo $row['price']; ?>" name="price" class="box6"></td>
            <td><input type="text" value="<?php echo $row['cdate']; ?>" name="price" class="box7"></td>
            <td><input type="text" value="<?php echo $row['ndate']; ?>" name="price" class="box6"></td>
    
          
            <td> 
            
            <form action="<?php echo ROOT?>/Customer/Pendingstore/remove" method="post">
            
            <input type="hidden" value="<?php echo $row['ftype']; ?>" name="ftype" class="box6">
            <input type="hidden" value="<?php echo $row['amount']; ?>" name="amount" class="box6">
              <input type="hidden" value="<?php echo  $row['Oid'] ?>" name="Oid" readonly>
               <button type="submit" class="dbtn2" >Cancel</a></td>
          
            </form>
         </tr>
      <?php
       
            }
         }}
         else{
            echo $data['error'];
       }
      ?>
		  
		  </tbody>
		</table>
        <br><br><br>
	</div>  





    <h1> Pending Store Orders </h1><br>  


<div class="table" >
		<table class="table1">
		  <thead>
			<tr>
			  <th scope="col">Order ID</th>
			  <th scope="col">Product Name</th>
			  <th scope="col">Quantity</th>
			   <th scope="col">Price</th>
			
			  <th scope="col">Ordered Date</th>
			
			   
			  
			</tr>
		  </thead>
		  <tbody>
		     

				 
          <?php
    
   
	if($flag==true){
        if (mysqli_num_rows($data['result']) > 0) {
            while($row = mysqli_fetch_assoc($data['result'])) {

	  
				echo "<tr>
			<td>".$row['Oid']."</td>
            <td>".$row['name']."</td>
            <td>".$row['quantity']."</td>
            <td>".$row['price']."</td>
            <td>".$row['odt']."</td>
      
			</tr>";
						
					
				
			}}}
			else{
				echo $data['error'];
		   }

		  
		   ?>
					
		  
		  </tbody>
		</table>
        <br><br><br>
	</div>  




    <div class="table" >
		<table class="table1">
		  <thead>
			<tr>
			  <th scope="col">Order ID</th>
			  <th scope="col">Address</th>
			  <th scope="col">Contact No</th>
			   <th scope="col">Total Price</th>
			
			  <th scope="col">Payment Method</th>
			
			   
			  
			</tr>
		  </thead>
		  <tbody>
		     

				 
          <?php
    

   
	if($flag==true){
        if (mysqli_num_rows($data['result2']) > 0) {
            while($row = mysqli_fetch_assoc($data['result2'])) {

	  
				echo "<tr>
			<td>".$row['pids']."</td>
            <td>".$row['address']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['total']."</td>
            <td>".$row['pmethod']."</td>
      
			</tr>";
						
					
				
			}}}
			else{
				echo $data['error'];
		   }

		  
		   ?>
				
	
			
		  
		  </tbody>
		</table>
        <br><br><br><br><br><br><br><br><br>
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