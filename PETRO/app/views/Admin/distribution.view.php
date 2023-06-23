<?php
   if(empty($data['error'])){
        $data['error']=null;
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Add Distribution Manager</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Manager/report.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav>
            <ul>
            <li><a href="<?php echo ROOT ?>/Admin/Home" class="logo">
                        <img src="<?php echo ROOT ?>/image/Manager/home-button.png">
                        <span class="nav-item"></span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">Add D_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">Add C_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View D_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View C_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View Customer</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View Complain</span>
                    </a></li>

            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Add Distribution Manager</h1>
            </div><br><br>
            <div class="wrapper">
                <div class="form-container">

                    <div class="form-inner">
                    <img src="<?php echo ROOT ?>/image/Manager/businessman.png" alt="">
                    <form action="<?php echo ROOT?>/Admin/Distribution/register" method="POST">
                        <div class="field">
                            <input type="text" class="box" name="distribution_manager_id" placeholder="Manager ID" required>
                        </div>
                        <div class="field">
                        <input type="text" class="box1" name="First_name" placeholder="First Name" required>
                        </div>
                        <div class="field">
                        <input type="text" class="box1" name="Last_name" placeholder="Last Name" required>
                        </div>
                        <div class="field">
                        <input type="text" class="box"  name="distribution_manager_NIC" placeholder="NIC" minlength="10" required>
                        </div>
                        <div class="field">
                        <input type="email" class="box" name="distribution_manager_email" placeholder="Email"  required>
                        </div>
                        <div class="field">
                        <input type="password" class="box" id="t1" name="password" placeholder="Password" required>
                        </div>
                        <br>
                        <div class="btn">
                                <div class="btn-layer"></div>
                                    <input type="submit" name="send" value="Create Account">
                                </div>
                        </div>
                    </form>
                    <label class="error"><?php echo $data['error']?></label>
                    </div>
                </div>
            </div>


       
    </div>

</body>

</html>