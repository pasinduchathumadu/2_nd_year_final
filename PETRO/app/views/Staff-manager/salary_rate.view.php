<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Manager Home</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/salary_rate.css" text="text/css" />
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
            <li class="active">
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
                <a href="<?php echo ROOT ?>/Staff-manager/Home">
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
                    <h1>Salary Percentage</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Salary_Rate">Salary Percentage</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Current Rates</h3>
                        
                    </div>
                    <!-- print error massage -->
                    <?php
                        if(isset($data['error'])){
                            echo '<span class="errorMsg">' .$data['error'].'</span>';
                        };
                        if(isset($data['success'])){ 
                            echo '<span class="successMsg">' .$data['success'].'</span>';
                        };
                    ?>
                    <table>
                        <tr><td> Basic Salary</td> <td>-</td> <td>Rs.<?php echo $data['Basic_salary']?>/=</td></tr>
                        <tr><td> Home Rental Allowances Rate</td> <td>-</td> <td><?php echo $data['HRA']?>%</td></tr>
                        <tr><td> Daily Allowances Rate</td> <td>-</td> <td><?php echo $data['Daily_allowances']?>%</td></tr>
                        <tr><td> Provident Fund Rate</td> <td>-</td> <td><?php echo $data['provident_fund']?>%</td></tr>
                        <tr><td> Over Time (per hour)</td> <td>-</td> <td>Rs.<?php echo $data['OT']?>/=</td></tr>

                    </table>
                    
                </div>
                <div class="order">
                    <div class="head">
                        <h3>Edit Salary Percentage</h3>
                        
                    </div>
                    <div class="form-inner">
                    <form class="form-container" action="<?php echo ROOT ?>/Staff-manager/Salary_Rate/editRates" method="post">
                        <div class="field">
                        <span class="form-tag">Update Basic Salary : </span>
                        <input type="text" name = "Basic" required placeholder="Enter New Basic Salary " require>
                        </div>
                        <div class="field">
                        <span class="form-tag">Update HRA Rate : </span>
                        <input type="text" name = "HRA" required placeholder="Enter New HRA Rate" require>
                        </div>
                        <div class="field">
                        <span class="form-tag">Update Daily_allowances Rate : </span>
                        <input type="text" name = "Daily_allowances" required placeholder="Enter New Daily_allowances Rate" require>
                        </div>
                        <div class="field">
                        <span class="form-tag">Update Provident_fund Rate : </span>
                        <input type="text" name = "Provident_fund" required placeholder="Enter New Provident_fund Rate" require>
                        </div>
                        <div class="field">
                        <span class="form-tag">OT Salary Rate (per hour) : </span>
                        <input type="text" name = "OT" required placeholder="Enter New OT rate" require>
                        </div>
                        <br><br>
                        <div class="btn">
                        <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="Register Now" >
                        </div>
                    </form>
                </div>
                </div>
            </div>


            

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- JS for side bar movement -->
    <script src="<?php echo ROOT ?>/JS/Staff-manager/script.js"></script>
   
    <!-- JS for profile icon drop down -->
    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
    </script>

</body>




</html>