

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
		
		$url1="/PETRO/public/Customer/Addvehicle1";
		$url2="/PETRO/public/Customer/Addvehicle2";
		$url3="/PETRO/public/Customer/Addvehicle3";
   
    
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
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/profile.css" text="text/css">
   

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
    
          <a href="<?php echo ROOT ?>/Customer/Profile" >
       
          <img src="<?php echo ROOT ?>/image/bp.jpg"  style="width:35px;height:35px;  border-radius: 50%;"></a>
        
          </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <h1 class="up"> USER  PROFILE</h1>
  
            </div>

         
<br>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Personal Details</h3>
                    
                     
                    </div>
 <br>
                
                            
                               
    <label for="fname"><b>First Name: </b></label>
   <input type="text" value="<?php echo  $data['fname'] ?>" class="box3" readonly><br><br><br>
   <label for="lname"><b>Last Name: </b></label>
   <input type="text" value="<?php echo  $data['lname'] ?>" class="box3" readonly><br><br><br>
   <label for="Email"><b>Email:</b> </label>
   <input type="text" value="<?php echo  $data['email'] ?>" class="box3" readonly><br><br><br>
   <label for="Contact No"><b>Contact No: </b></label>
   <input type="text" value="<?php echo  $data['phone'] ?>" class="box3" readonly><br><br><br>

    <label for="Contact No"><b>NIC: </b></label>
    <input type="text" value="<?php echo  $data['NIC'] ?>" class="box3" readonly><br><br><br>

    <label for="pp"><b>Petro Points: </b></label>            
    <input type="text" value="<?php echo  $data['points'] ?>" name="points" value="" class="box3" readonly ><br><br>
                            
                        
                        
        
            
    </div>



     <!-- Vehicle Details -->

                <div class="todo">
                    <div class="head">
                        <h3>Vehicle & Machine Details</h3>
                       
                    </div>
                    <ul class="todo-list">
                    
                  
                        <li class="completed">
                        <?php
		if ($data['vno'] == "")
{
  echo ' <a href='.$url1.'  class="add"> + Add Vehicle </a>'; 
}
?>
 <a href="<?php echo ROOT ?>/Customer/Updatevehicle1" class="vehicle"> <?php echo $data['vno']; ?> </a>
                      
                        </li>
                        

                   
                        <li class="completed">
                        <?php
		if ($data['vno1'] == "")
{
  echo ' <a href='.$url2.'  class="add"> + Add Vehicle </a>'; 
}
?>
 <a href="<?php echo ROOT ?>/Customer/Updatevehicle2" class="vehicle"> <?php echo $data['vno1']; ?> </a>
                           
                        </li>
                     

               
                        <li class="completed">
                        <?php
		if ($data['vno2'] == "")
{
  echo ' <a href='.$url3.'  class="add"> + Add Vehicle </a>'; 
}
?>
 <a href="<?php echo ROOT ?>/Customer/Updatevehicle3" class="vehicle"> <?php echo $data['vno2']; ?> </a>
                          
                        </li>
              

                 
                        <li class="completed">

 <p class="vehicle"> <?php echo $data['sNo']; ?> </a>
                       
                        </li>
                  
                    
                    </ul>
                </div>
            </div>
    <br><br>






  <form action="<?php echo ROOT?>/Customer/Profile/add" method="post">
<a href="<?php echo ROOT ?>/Customer/Profileedit" class="edit"><b>Edit </b></a>
<input type="hidden" value="<?php echo  $data['email'] ?>" name="delete" readonly>
<button onclick="document.getElementById('id01').style.display='block'" type="button" class="delete">Remove</button><br>
<br>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>

    <div class="container">
        <br><br><br><br>  <br><br><br><br>
      <h1>Remove Profile</h1>
      <p>Are you sure you want to Remove your Profile?</p>
    
      <div class="clearfix">

        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Remove</button>

    
      </div>
    </div>
  </div>
</form>


<br><br>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
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




    </script>


</body>

</html>







