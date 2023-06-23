<?php
 if(empty($data['err'])){
   $data['err']=NULL;
 }
?>
<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/login.css" text="text/css">
  
</head>
<body>

<div class="navbar">
  <a href="home3.html" class="active">Home</a>
  <a href="#">Contact Us</a>
  <a href="#">About Us</a>
<br>
</div>
 <h1 class="home"> PETRO</h1>
<div class="sidebar">

</div>
<img src="<?php echo ROOT ?>/image/pet3.jpg" class="shed">
<br>

<div class="form-container">
   <?php echo $data['err'] ?>

<form action="<?php echo ROOT ?>/Customer/Login/login" method="post">
      <h2>Log In</h2>
       <label for="email"> Email </label> <br>
      <input type="email" name="email" placeholder="enter email" class="box" required><br>
	  
	   <label for="password"> Password </label> <br>
      <input type="password" name="password" placeholder="enter password" class="box" required>
	  <br><br>
      <input type="submit" name="submit" value="Log In" class="btn"><br><br>
	   <a href="" class="fp">Forgot Password?</a>
      <p>don't have an account? <a href="<?php echo ROOT ?>/Customer/Contact" class="register">Register Now</a></p>
   </form>

</div>
<br>
 <!--<a href="#" class="fueldetails">View Fuel Details</a>-->
 <br><br>

</body>
</html>