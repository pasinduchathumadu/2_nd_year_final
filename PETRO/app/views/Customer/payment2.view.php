








<?php


if(empty($data['error'])){
    $flag=TRUE;
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
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/payment.css" text="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
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
            <li>
                <a href="<?php echo ROOT ?>/Customer/Store">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Store</span>
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
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Storehistory">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Store History</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Complaint">
                    <i class='bx bxs-group'></i>
                    <span class="text">Complaints</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Aboutus">
                    <i class='bx bxs-group'></i>
                    <span class="text">About Us</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Customer/Profile">
                    <i class='bx bxs-cog'></i>
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
    
          <a href="#" class="">
       
          <img src="<?php echo ROOT ?>/image/bp.png"  style="width:35px;height:35px;"></a>
        
          </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
  <h1 class="head">Payment</h1>
            </div>
<br>



 



<form action="<?php echo ROOT ?>/Customer/Payment2/add " method="POST">
 

 
  
      <?php
      if($flag==TRUE){
         if (mysqli_num_rows($data['result']) > 0) {
            while($row = mysqli_fetch_assoc($data['result'])) {
				?>
                
       
       
        
    
         

                  <input class="box"type="hidden" name="Oid" value="<?php echo $row['Oid']; ?>">
                  <input class="box"type="hidden" name="name" value="<?php echo $row['name']; ?>">
                  <input class="box"type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                  <input class="box"type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                 
                  <input class="box"type="hidden" name="price" value="<?php echo $row['price']; ?>">
            
                  <input class="box6"type="hidden" min="1" name="quantity" value="<?php echo $row['quantity']; ?>" readonly >

    

            
            
      
      
           
         
         

           
            
      
       
       
      <?php
       
            }
         }
        }
      ?>

   
<input type="hidden" name="pids" value="<?php echo $data['result1']; ?>">







<div class="table-data">
                <div class="order">
                    <div class="head">
                     
                     
                    </div>






                    
    <div class="container">











    
      

	   

   
	 
    
          
       


      
  
          
      
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="22/03">
      
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              
 
      
        <input type="submit" value="Continue to checkout" class="btn" name="pay">
    
 </div>
  



                </div>
                <div class="todo">
                    <div class="head">
                 
                       
                    </div>
                  

                    <ul class="todo-list">
                    
                 

                        
                            <h1 class="total"> Total
                                <br>Rs<?php echo $data['total']; ?> </h1><br><br>
                          
                        
                                <input type="hidden"  name="total" value="<?php echo $data['total']; ?>">  
                                <input type="hidden"  name="address" value="<?php echo $data['address']; ?>">  
                                <input type="hidden"  name="phone" value="<?php echo $data['phone']; ?>">  
                                <input type="hidden"  name="points" value="<?php echo $data['points']; ?>">   
                                <input type="hidden"  name="pmethod" value="<?php echo $data['pmethod']; ?>">   

  
                        <li class="completed">
                        <p>Address- <?php echo $data['address']; ?></p>
                     
                        </li>

                        
                        <li class="completed">
                        <p>Phone - <?php echo $data['phone']; ?></p>
                     
                        </li>
                

                     
                    
                    </ul>

                </div>
            </div>
            </form>




















          










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





























