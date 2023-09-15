
<?php
 if(empty($data['err'])){
   $data['err']=NULL;
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>PETRO</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Common/login.css" text="text/css">
  
</head>

<body>
    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT ?>/image/Common/log.png" alt="" class="image"></a>
     
        </header>
        <div class="wrapper">
            <div class="title">
                Login Form
            </div>
            <form action="<?php echo ROOT ?>/Home/Login/login" method="post" class="login">
            <label class="error"><?php echo $data['err'] ?></label>
                <div class="field">
                    <input type="text" name="email" required>
                    <label>Email Address</label>
                </div>
                <div class="field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
					<div class="pass-link">
					<a href="<?php echo ROOT ?>/Pumper/Forget_password" class="forget">Forget Password? </a>
                    
                	</div>
                   
                </div>
                <div class="field">
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">
                    Not a member? <a href="<?php echo ROOT ?>/Customer/Register">Signup now</a>
                </div>
				
				
            </form>
        </div>
<br><br> <br><br>  <i class='bx bx-home'></i>
        <a href="<?php echo ROOT ?>/Home/Home" class="home">Back to Home </a>
    </div>

</body>
</html>










