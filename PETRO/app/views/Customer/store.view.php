


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
   
     <!-- My CSS -->
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/store.css" text="text/css">
   

    <title>Petro</title>
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
            <li class="active">
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





            <?php
      
      echo $data['message'];
?>




<div class="container-fluid">
<div class="container">
<div class="search">
<h1>All Products</h1>
<input type="text" name="" id="find" placeholder="search here...." onkeyup="search()">
   
                       
                        <a href="default.asp"> <p class="cart2"> <?php echo $data['count1']?></p>
                        <img src="<?php echo ROOT ?>/image/checkout.png"  style="width:40px;height:32px;">CART</a>
</div>

<div class="product-list">

<?php


   if (mysqli_num_rows($data['result']) > 0) {
            while($row = mysqli_fetch_assoc($data['result'])) {

              $tomorrow = date("Y/m/d", time() + 86400);
				?>
    <div class="product">
	<form action="<?php echo ROOT ?>/Customer/Store/add " class="box" method="POST">
         <img  class="imgg" src="<?php echo ROOT ?>/image/<?php echo $row['image']; ?>" alt="" width="100px"; height="100px"; >
         <h3 class="name"><?php echo $row['name']; ?></h3><br>
         <div class="price">Rs.<?php echo $row['price']; ?></div>
         <input type="number" min="1" value="1"name="product_quantity" class="input">
		<input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
        
         <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
		<input type="hidden" name="cdate" value="<?php echo date("Y/m/d") ?>" class="box" readonly >
		<input type="hidden" name="ndate" value="<?php echo "$tomorrow" ?>" class="box" readonly><br>
         
         <input type="submit" value="Buy Now" name="add_to_cart" class="btn" >
		
      </form>

      </div>
	  <?php
      };
   };
   ?>
   <br>

</div>
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



<script type="text/javascript">
function search() {
let filter = document.getElementById('find').value.toUpperCase();
let item = document.querySelectorAll('.product');
let l = document.getElementsByTagName('h3');
for(var i = 0;i<=l.length;i++){
let a=item[i].getElementsByTagName('h3')[0];
let value=a.innerHTML || a.innerText || a.textContent;
if(value.toUpperCase().indexOf(filter) > -1) {
item[i].style.display="";
}
else
{
item[i].style.display="none";
}
}
}
</script>




</body>

</html>