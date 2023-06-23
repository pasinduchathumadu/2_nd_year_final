<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Manager Home</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/home.css" text="text/css" />
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
            <li class="active">
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
                <a href="<?php echo ROOT ?>/Staff-manager/Profile">
                    <i class='bx bxs-face' ></i>
                    <span class="text">Profile</span>
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
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- manger's function boxes -->
            <ul class="box-info">
                <li>
                    <i class='bx bxs-pointer'></i>
                    <span class="text">
                        <a href="<?php echo ROOT ?>/Staff-manager/Assign_pumpper"><b>Assign Pumper</b></a>
                       
                    </span>
                </li>
                <li>
                    <i class='bx bxs-comment-dots' ></i>
                    <span class="text">
                        <a href="<?php echo ROOT ?>/Staff-manager/Complain"><b>View & Responds to complaint</b></a>
                        
                    </span>
                </li>
                <li>
                    <i class='bx bx-line-chart'></i>
                    <span class="text">
                        <a href="<?php echo ROOT ?>/Staff-manager/Salary_Rate"><b>Salary Percentage</b></a>
                        
                    </span>
                </li>
            </ul>
            <ul class="box-info">
                <li>
                    <i class='bx bx-male'></i>
                    <span class="text">
                        <a href="<?php echo ROOT ?>/Staff-manager/view_pumper"><b>View Pumpers</b></a>
                       
                    </span>
                </li>
                <li>
                    <i class='bx bxs-book-bookmark' ></i>
                    <span class="text">
                        <a href="<?php echo ROOT ?>/Staff-manager/Pumper_registration"><b>Pumper Registration</b></a>
                        
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <a href="<?php echo ROOT ?>/Staff-manager/view_customer"><b>View Customer</b></a>
                        
                    </span>
                </li>
                
            </ul>


            <div class="table-data">

                <!-- calander -->
                <div class="todo">
                    <header>
                        <p class="current-date"></p>
                        <div class="icons">
                            <span id="prev" class="material-symbols-rounded">chevron_left</span>
                            <span id="next" class="material-symbols-rounded">chevron_right</span>
                        </div>
                    </header>
                    <div class="calendar">
                        <ul class="weeks">
                            <li>Sun</li>
                            <li>Mon</li>
                            <li>Tue</li>
                            <li>Wed</li>
                            <li>Thu</li>
                            <li>Fri</li>
                            <li>Sat</li>
                        </ul>
                        <ul class="days"></ul>
                    </div>

                </div>

                <!-- Members & Complains section  -->
                <div class="todo">
                    <div class="head">
                        <h3>Members & Complains</h3>
                    </div>

                    <table class="table">
                        <tr><td>Total Pumper Count :</td>
                            <?php echo "<td>" .$data['totalPumper']. "</td>"?></tr>
                        <tr><td>Working Pumpers :</td>
                            <?php echo "<td>" .$data['activepumper']. "</td>"?></tr>
                        <tr><td>Not Assigned Pumpers :</td>
                            <?php echo "<td>" .$data['waitingPumper']. "</td>"?></tr>
                        <tr><td>Total Customer Count :</td>
                            <?php echo "<td>" .$data['totalCustomer']. "</td>"?></tr>
                        <tr><td>Total Pending complains :</td>
                            <?php echo "<td>" .$data['pending']. "</td>"?></tr>
                        <tr><td>Total Viewed complains :</td>
                            <?php echo "<td>" .$data['view']. "</td>"?></tr>
                    </table>

                </div>

                <!-- Pumper Mashine Details Section -->
                <div class="order">
                    <div class="head">
                        <h3>Pumper Mashine Details</h3>
                        
                    </div>
                    <!-- pumper status colour code -->
                    <div class="flex-container-tag">
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('D001');
                           echo "<h3 style='background-color: $color;'>D1</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('D002');
                           echo "<h3 style='background-color: $color;'>D2</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('D003');
                           echo "<h3 style='background-color: $color;'>D3</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('D004');
                           echo "<h3 style='background-color: $color;'>D4</h3>"; 
                        ?></div>
                    
                        <h1> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     </h1>

                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('P001');
                           echo "<h3 style='background-color: $color;'>P1</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('P002');
                           echo "<h3 style='background-color: $color;'>P2</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('P003');
                           echo "<h3 style='background-color: $color;'>P3</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->dashboard->mashineColour('P004');
                           echo "<h3 style='background-color: $color;'>P4</h3>"; 
                        ?></div>
                    </div>

                    <table class="table">
                        <tr><td>Total Diesel Mashine :</td>
                            <?php echo "<td> 4 </td>"?></tr>
                        <tr><td>Total Working Diesel Mashine :</td>
                            <?php echo "<td>" .$data['workingDiesel']. "</td>"?></tr>
                        <tr><td>Total Petrol Mashine :</td>
                            <?php echo "<td> 4 </td>"?></tr>
                        <tr><td>Total Working Petrol Mashine :</td>
                            <?php echo "<td>" .$data['workingPetrol']. "</td>"?></tr>
                        
                    </div>
                </div>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- JS for side bar movement -->
    <script src="<?php echo ROOT ?>/JS/Staff-manager/script.js"></script>
    <!-- JS for Calander -->
    <script src="<?php echo ROOT ?>/JS/Staff-manager/calender.js"></script>

    <!-- JS for profile icon drop down -->
    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
    </script>
</body>




</html>