

<?php
if(empty($data['message'])){
    $data['message']=NULL;
}
?>


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
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/comp.css" text="text/css">
   
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
            <li class="active">
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
    
          <a href="<?php echo ROOT ?>/Customer/Profile" class="profile">
       
          <img src="<?php echo ROOT ?>/image/bp.jpg"  style="width:35px;height:35px;"></a>
        
          </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
  <h1 class="head">Make a Complaint</h1>
            </div>
<br>





<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Complaint Box</h3><br>
 
                     
                    </div>

                    <p class="complete">   
                        
                        <?php echo $data['error'] ?></p>


                    <div class="comp">

            <form action="<?php echo ROOT ?>/Customer/Complaint/add " method="POST">
               <br>

              <input type="hidden" class="" placeholder="NAME" value="CUS<?php echo $data['id']; ?>" name="id" required>
              <input class="complaint" placeholder="EMAIL"value=" <?php echo $data['email']; ?>" name="email"><br><br><br>

           <p class=""> Issue Type</p>   <br>           
             <input type="radio"  name="issue" value="Fuel" required>
             <label for="feedback">Fuel</label>
             <input type="radio"  name="issue" value="Store" required>
             <label for="feedback">Store</label>

<br><br><br>
              <input class="complaint2" placeholder="Message" name="complaint" required><br><br>

                   </div><br><br><br><br><br><br><br>
              <button type="submit" class="button">SEND</button>

            </form>
  



            </div>

            <!-- Contact details -->

                <div class="todo">
                    <div class="head">
                        <h3>Contact Us</h3>
                       
                    </div>
                  

                    <ul class="todo-list">
                    
                 

                        <li class="completed">
                            <p> 077 - 2987654 </p>
                          
                        </li>
                 

  
                        <li class="completed">
                        <p> petro@gmail.com</p>
                     
                        </li>

                        
                        <li class="completed">
                        <p> 172/A,Flower rd, Colombo 07</p>
                     
                        </li>
                

                     
                    
                    </ul>

                </div>
            </div>





<!-- Complaint Response -->



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Complain Response</h3>
                      
                    </div>
                    <table>
                        <thead>
                            <tr>
                               
            <th scope="col">Complain ID</th>
            <th scope="col">Issue Type</th>
			  <th scope="col">Complain</th>
			  <th scope="col">Date-Time</th>
			   <th scope="col">Response</th>
			
                            </tr>
                        </thead>

                        <tbody>
        
                 			 
        <?php






   if (mysqli_num_rows($data['result']) > 0) {
       while($row = mysqli_fetch_assoc($data['result'])) {

 
           echo "<tr>
       <td>".$row['com_id']."</td>
       <td>".$row['issue_type']."</td>
       <td>".$row['complain']."</td>
       
       <td>".$row['date_time']."</td>
       <td>".$row['response']."</td>
   
      
   
       
   
       </tr>";

                   
               
           
       }}
   
      ?>




                   </tbody>

                    </table>
                    <br>
                 
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