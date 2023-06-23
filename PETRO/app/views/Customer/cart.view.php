






<?php
if(empty($data['error'])){
    $flag=TRUE;
}
else{
    $data['points']=NULL;
  $flag=FALSE;
}

if(empty($data['count1'])){
    $data['count1']=NULL;
}

if(empty($data['erro'])){
    $data['erro']=NULL;
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
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/cart.css" text="text/css">
   

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
                <h1>Shopping Cart
  
            </div>




<br>
<?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i:s');

?>


            <?php
              $grand_total=0;

 ?>
 
<div class="container">

<div class="shopping-cart">
<?php echo $data['error']?>
 

   <table>
      <thead>
         <th></th>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         
         <th>Total Price</th>
        
      </thead>
      <tbody>
  
      <?php
      if($flag==TRUE){
         if (mysqli_num_rows($data['result']) > 0) {
            while($row = mysqli_fetch_assoc($data['result'])) {
				?>
                
         <tr>
       
            <td><img src="<?php echo ROOT ?>/image/<?php echo $row['image']; ?>" height="50" alt=""></td>
            <td><input class="box5" type="text" value="<?php echo $row['name']; ?>" name="name"></td>
            <td><input type="text" value="Rs.<?php echo $row['price']; ?>" name="price" class="box6"></td>
    
            <td>

                  <input class="box"type="hidden" name="Oid" value="<?php echo $row['Oid']; ?>">
                  <input class="box"type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                  <input class="box"type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                 
                  <input class="box6"type="number" min="1" name="quantity" value="<?php echo $row['quantity']; ?>" readonly >

                     
            </td>

            
            
      
      
           
         
         

            <td><input class="box6"type="text" value="<?php echo $sub_total = ($row['price'] * $row['quantity']); ?>" name="total"></td>
           
            <td> 
                
            
      
             
            <form action="<?php echo ROOT ?>/Customer/Cart/remove " method="POST">
         
              <input type="hidden" value="<?php echo  $row['Oid'] ?>" name="Oid" readonly>
              <input type="hidden" value="<?php echo  $row['p_id'] ?>" name="p_id" readonly>
              <input type="hidden" min="1" name="quantity" value="<?php echo $row['quantity']; ?>" >
               <button type="submit" class="delete-btn" onclick="">remove</a></td>
          
            </form>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
        }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Total :</td>
         <td>Rs.<input class="box6"type="text" value="<?php echo $grand_total; ?>" name="total"></td>
        
        

      </tr>
   </tbody>
   </table>
</div></div>

</div>
<a href="<?php echo ROOT ?>/Customer/Store" class="store"> <-Store </a>
<br>

<form action="<?php echo ROOT ?>/Customer/Cart/add " method="POST">
<br>


<div class="table-data">
                <div class="order">
                    <div class="head">
                        
                    <?php
if($data['count1']>=1){
    ?>


                        <div class="address">
                        <h3>Delivery Details</h3><br>
                   <p class="er">     <?php
      
      echo $data['erro'];
  ?></p><br>
    <p class="details"> All the products are cash on delivery </p>
    <br>
   <input type="hidden" name="pids" value="<?php echo $data['result1']; ?>">
   <input class="box"type="hidden" name="user_id" value="<?php echo $data['id']; ?>">

   <input type="text" value="" name="address" placeholder="address" class="box12" required max="100"><br><br>
   <input type="text" value="" name="phone" placeholder="phone" class="box12" pattern="[0-9]{10}" ><br><br>

   <input type="text" value="Cash" name="pmethod" class="box12" required ><br><br>
 
  



  <?php 
   if($data['points']>=300){?><br>
   <p class="not"> Your <?php echo $data['points']; ?> Points will be reduce from your bill</p><br>

  <input type="hidden" id="points" name="points" value="<?php echo $data['points']; ?>">
  <input type="hidden" id="points" name="total" value="<?php echo  $grand_total -  $data['points'];?>">
  <?php }

   else{?>

<input type="hidden" id="points" name="points" value="0">
<input type="hidden" id="points" name="total" value="<?php echo  $grand_total?>"><br>

<?php } ?>


      <input type="submit" name="Payment" value="Place Order" class="place">
      <br><br>
      </div>
	<br>
  
    <?php } ?>

   	
   </form>
<br><br>

                     
                    </div>

  



                </div>
                <div class="todo">
                <h3>Return Regulations</h3><br>
                    <div class="head">
                    
                       <p>Returns must be made immediately upon checking the goods on delivery , only if the received goods are either damaged and or wrong product /size subject however to the condition that the product packaging /seal is not broken .
                         Returns shall be handed over to the courier and the refund will be made to the credit card within 7 working days </p>
                 </div>

                 <li class="point">
              
              <span class="text">
                  <h2> Petro Points - <?php echo  $data['points'] ?></h2>
                
              </span>
             
          </li>
          <p>You can redeem the petro points </p>
                 <br><br> <br>
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