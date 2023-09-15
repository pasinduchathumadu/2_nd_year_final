


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <title>PETRO</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Common/avail.css">
</head>

<body>

    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT?>/image/Common/log.png" alt="" class="image"></a>
            <nav class="navbar">
                <ul>
                <li><a href="<?php echo ROOT ?>/Home/Home">Home</a></li>
                    <li><a href="<?php echo ROOT ?>/Home/Available">Availability</a>
                      
                    </li>
                    <li><a href="<?php echo ROOT ?>/Home/Aboutus">About Us</a></li>
                    <li><a href="<?php echo ROOT ?>/Home/Login">LogIn</a></li>
                </ul>
            </nav>
        </header>
        
<br><br><br><br><br><br><br><br>

<h1 class="fuel"> Fuel Availability </h1><br>
<div class="row">
  <div class="column">
    <div class="card">
    <h3 class="details"> Auto Diesel </h3>
    <h3 class="details2">Rs.<?php echo  $data['price_auto'] ?></h3>
    <p class="details3"><?php echo  $data['remain_auto'] ?> L</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <h3 class="details"> Octane 92 </h3>
      <h3 class="details2">Rs.<?php echo  $data['price_92'] ?></h3>
       <p class="details3"><?php echo  $data['remain_92'] ?> L</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <h3 class="details"> Octane 95 </h3>
    <h3 class="details2">Rs.<?php echo  $data['price_95'] ?></h3>
    <p class="details3"><?php echo  $data['remain_95'] ?> L</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <h3 class="details2"> Super Diesel </h3>
    <h3 class="details2">Rs.<?php echo  $data['price_super'] ?></h3>
    <p class="details3"><?php echo  $data['remain_super'] ?> L</p>
    </div>
  </div>
</div>


        <br>
<div class="container-fluid">
<div class="container">
<div class="search">
<h1 class="fuel2">Products Availability</h1>

</div>
<br>

<div class="product-list">

<?php


   if (mysqli_num_rows($data['result1']) > 0) {
            while($row = mysqli_fetch_assoc($data['result1'])) {

				?>
    <div class="product">
	<form action="" class="box" method="POST">
         <img  class="imgg" src="<?php echo ROOT ?>/image/<?php echo $row['image']; ?>" alt="" width="100px"; height="100px"; >
         <h3 class="name"><?php echo $row['name']; ?></h3><br>
         <div class="price">Rs.<?php echo $row['price']; ?></div>
         
	
        
        
  
	
         
         
		
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
          

<script>
// Wrap every letter in a span
var textWrapper = document.querySelector('.fuel');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.fuel .letter',
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i
  }).add({
    targets: '.fuel .letter',
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i
  });

  </script>


<script>
// Wrap every letter in a span
var textWrapper = document.querySelector('.fuel2');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.fuel2 .letter',
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i
  }).add({
    targets: '.fuel2 .letter',
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i
  });

  </script>
            

			


</body>



</html>