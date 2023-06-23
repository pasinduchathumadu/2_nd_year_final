
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






<div class="container">
	
	<div class="screen">
		<div class="screen__content">
      <img src="<?php echo ROOT ?>/image/Common/petro.jpg" alt="petro logo" class="logo">
			<form action="<?php echo ROOT ?>/Home/Login/login" method="post" class="login">
			<?php echo $data['err'] ?>
       
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="email" class="login__input" placeholder="Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password"class="login__input" placeholder="Password">
				</div>
				<button class="button login__submit" type="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
            <br>
            
            <a href="" class="rn">Register Now </a>
			</form>
			<div class="social-login">
			
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>


 <br><br>

</body>
</html>








