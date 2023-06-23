<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Manager Home</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/Edit_profile.css" text="text/css" />
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/style.css" text="text/css" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- to get calander move icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <!-- SIDE BAR -->

    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-gas-pump'></i>
            <span class="text">PETRO</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Assign_pumpper">
                    <i class='bx bxs-pointer'></i>
                    <span class="text">Assign Pumper</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Complain">
                    <i class='bx bxs-comment-dots' ></i>
                    <span class="text">View & Responds to complaint</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/view_pumper">
                    <i class='bx bx-male'></i>
                    <span class="text">View Pumpers</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Pumper_registration">
                <i class='bx bxs-book-bookmark' ></i>
                    <span class="text">Pumper Registration</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/view_customer">
                    <i class='bx bxs-group'></i>
                    <span class="text">View Customer</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Salary_Rate">
                    <i class='bx bx-line-chart'></i>
                    <span class="text">Salary Percentage </span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Feedback">
                    <i class='bx bxs-message-rounded-check'></i>
                    <span class="text">User Feedback</span>
                </a>
            </li>
            <li>
                <a href="">
                    <!-- <i class='bx bxs-group'></i>
                    <span class="text">Salary Percentage </span> -->
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/profile">
                    <i class='bx bxs-left-arrow-circle'></i>
                    <span class="text">Back</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Logout" class="logout">
                    <i class='bx bxs-log-out' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <!-- SIDE BAR -->




    <!-- CONTENT -->
    <section id="content">
        <!-- Top NAV BAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link"></a>
            <form action="#">
                <div class="form-input">
                    
                </div>
            </form>
            
            
            <!-- Display logged user's name  -->
            <h3><?php echo $_SESSION['manager_name']," ",$_SESSION['manager_name_Last']?></h3>
            
            <!-- profile pic -->
            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/proIcon.png" onclick="toggleMenu()">
            </a>

            <!-- profile Drop down menu -->
            <div class="sub-menu-wrap" id="submenu">
                <div class= "sub-menu">
                    <a href="<?php echo ROOT ?>/Staff-manager/Profile" class="sub-menu-link">
                        <img src="<?php echo ROOT ?>/image/profile_dropdown/profile.png">
                        <p>Profile</p>
                        <span>></span>
                    </a>
                    <a href="<?php echo ROOT ?>/Staff-manager/Logout" class="sub-menu-link">
                        <img src="<?php echo ROOT ?>/image/profile_dropdown/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Top NAV BAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Edit My Profile</h1>
                    <ul class="breadcrumb">
                        <li>
                        <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/profile">My Profile</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/edit_profile">Edit My Profile</a>
                        </li>
                    </ul>
                </div>
            </div>

            


            <div class="table-data">
                <div class="todo">
                    <div class="form-inner">
                        <!-- print error massage -->
                        <?php
                            if(isset($data['error'])){ 
                                echo '<span class="errorMsg">' .$data['error'].'</span>';
                            };
                            if(isset($data['success'])){ 
                                echo '<span class="successMsg">' .$data['success'].'</span>';
                            };
                        ?>
                    <form action="<?php echo ROOT ?>/Staff-manager/Edit_profile/submit_edit" method="post">
                        <div class="field">
                        <input value="<?php echo $data['first_name']?>" type="text" name="firstName" placeholder="Change First name">
                        </div>
                        <div class="field">
                        <input value="<?php echo $data["last_name"]?>" type="text" name="lastName" placeholder="Change Last name">
                        </div>
                        <div class="field">
                        <td><input value="<?php echo $data["phone_no"]?>" type="text" name="phoneNumber" placeholder="Change Phone number">
                        </div>
                        <div class="field">
                        <input value="<?php echo $data["nic" ]?>" type="text" name="nic" placeholder="Change NIC">
                        </div>
                        <div class="field">
                        <input value="<?php echo $data["email" ]?>" type="" name="email" readonly>
                        </div>
                        <div>
                        <div class="field">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Change password (Leave empty to keep old password)">
                        </div>
                        <div class="field">
                        <input type="password" class="form-control" name="retype_password" placeholder="Retype new password">
                        </div><br>
                        <div class="btn">
                        <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="Save" onclick="test_str()">
                        </div>
                    </form>
                </div>

                <div class="order">
                </div>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="<?php echo ROOT ?>/JS/Staff-manager/script.js"></script>
    
    <!-- Password Validation -->
    <script>
        //
        function test_str() {
            var res;
            //get string by password id
            var str = document.getElementById("password").value;
            //regular expression(/ /),  tested against all possible matches in a string globaly (/ /g)

            //simple letters (/[a-z]/g) 
            //capital letters (/[A-Z]/g) 
            //numbers (/[0-9]/g)
            //symbols (/[^a-zA-Z\d]/g)
            if (str.match(/[a-z]/g) && str.match(/[A-Z]/g) && str.match(/[0-9]/g) && str.match(/[^a-zA-Z\d]/g) && str.length >= 8)
                res = "TRUE";
            else if(str.length > 0){
                alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
            }
        }
    </script>

    <!-- JS for profile icon drop down -->
    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
    </script>
</body>




</html>