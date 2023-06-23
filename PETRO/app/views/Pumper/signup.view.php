<?php
if(empty($data['err'])){
    $data['err']=null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pumper Registration</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/pumper_registration.css" text="text/css">
</head>
<body>
    <header>
    <img class="logo" src="<?php echo ROOT ?>/image/petro1.png" alt="logo">
        <Nav>
            <ul class="nav_link">
                <li><a href="#">HOME</a></li>
                <li><a href="#">AVAILABILITY</a></li>
                <li><a href="#">ABOUT</a></li>
            </ul>
        </Nav>
        <a href="#" class="cnt"><button>CONTACT</button></a>
    </header>
    <div class="form-container">
        <form method="post" action="<?php echo ROOT ?>/Pumper/Signup/register">
            <h3>register Pumper</h3>
            
            <!-- print error massage -->
            <?php
            if(isset($data['error'])){   
                echo '<span class="errorMsg"> : '.$data['error'].'</span>';
            };
            ?> 

            <input type="text" name = "id" required placeholder="Enter Pumper's ID">
            <input type="text" name = "firstName" required placeholder="Enter Pumper's First Name">
            <input type="text" name = "lastName" required placeholder="Enter Pumper's Last Name">
            <input type="text" name = "nic" required placeholder="Enter Pumper's NIC">
            <input type="text" name = "phoneNumber" required placeholder="Enter Pumper's Phone Number">
            <select class="profile-gender" name="gender" >
                <option value="">--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="text" name = "Email" required placeholder="Enter Pumper's Email">
            <input type="password" name = "password" required placeholder="Enter Pumper's password">
            <input type="password" name = "cpassword" required placeholder="Confirm Pumper's password">   
            <input type="submit" name="submit" value="Register Now" class="form-btn">
            
            <a href="<?php echo ROOT ?>/Staff-manager/View_pumper" class="back-button">
                <lable>back</lable>
            </a>

        </form>
    </div>
</body>
</html>