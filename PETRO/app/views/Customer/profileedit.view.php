



<?php
if(empty($data['error'])){
    $data['error']=NULL;
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
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/profileedit.css" text="text/css">
   

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
            <li class="active">
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
    
          <a href="<?php echo ROOT ?>/Customer/Profile" >
       
          <img src="<?php echo ROOT ?>/image/bp.jpg"  style="width:35px;height:35px;  border-radius: 50%;"></a>
        
          </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            
            <div class="head-title">
             <h1 class="head1">Edit Your Profile </h1>
            </div>




<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Personal Details</h3>
                     
                    </div>
                    <br>
                    
         <div class="form2">                   
                               
    <label for="fname">First Name: </label>
    <input type="text" value="<?php echo  $data['fname'] ?>" class="box3" readonly><br><br><br>
    <label for="lname">Last Name: </label>
     <input type="text" value="<?php echo  $data['lname'] ?>" class="box3" readonly><br><br><br>
    <label for="Email">Email: </label>
    <input type="text" value="<?php echo  $data['email'] ?>" class="box3" readonly><br><br><br>
    <label for="Contact No">Contact No: </label>
    <input type="text" value="<?php echo  $data['phone'] ?>" class="box3" readonly><br><br><br>
    <label for="Contact No">NIC: </label>
    <input type="text" value="<?php echo  $data['NIC'] ?>" class="box3" readonly><br><br><br>
         

</div>
                            
                        
                        

                </div>
                <div class="todo">
                    <div class="head">
                   


                        
<form action="<?php echo ROOT?>/Customer/Profileedit/add" method="POST">
<h1> Update Profile </h1>
    

     <br>
   <div class="form">
   <p class="mobile"><?php echo $data['error']?> </p>
    
      
            <input type="text" name="fname" value="<?php echo $data['fname']; ?>" class="box" >
            <input type="text" name="lname" value="<?php echo $data['lname']; ?>" class="box" >
            <input type="text" name="phone" value="<?php echo $data['phone']; ?>" class="box" >
            <input type="hidden" name="email" value="<?php echo $data['email']; ?>" class="box" >
    <br><br>
  
             <a href="<?php echo ROOT ?>/Customer/Change_password" class="btn5">Change Password</a><br>
   
          
       
     
          
   
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>" readonly>
          
  
<br><br>
   
          <input type="submit" value="Update" name="update_profile" class="btn4"><br><br>
</div>
 </form>

                       
                    </div>

                </div>
            </div><br><br>

    


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







