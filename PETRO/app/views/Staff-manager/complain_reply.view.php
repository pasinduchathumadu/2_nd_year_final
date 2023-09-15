
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complain reply</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Staff-manager/complain_reply.css" text="text/css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/style.css" text="text/css" />
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
            <li class="active">
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
                <a href="">
                    <!-- <i class='bx bxs-group'></i>
                    <span class="text">Salary Percentage </span> -->
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Complain">
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
                <h1>Complain</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="<?php echo ROOT ?>/Staff-manager/Complain">View complaint</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="<?php echo ROOT ?>/Staff-manager/Complain">Responds to complaint</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
            <div class="head">
                        
                     
        </div>
            <div class="container3">
                <!-- print error massage -->
                <?php
                    if(isset($data['error'])){ 
                        echo '<span class="errorMsg">' .$data['error'].'</span>';
                    };
                    if(isset($data['success'])){ 
                        echo '<span class="successMsg">' .$data['success'].'</span>';
                    };
                ?>
            
            <form action="<?php echo ROOT?>/Staff-manager/complain_reply/register" method="POST">
                <label for="fname">Complain ID:</label>
                <input type="text" id="com_id " name="com_id" value="COM<?php echo $data['com_id'] ?>" readonly>

            
                <label for="fname">Pumper ID:</label>
                <input type="text" id="user_id" name="user_id" value="<?php echo $data['user_id']?>" readonly>

            
                
                <label for="lname">Complain:</label>
                <input type="text" id="complain" name="complain" value="<?php echo $data['complain']?>"readonly>

                <label for="lname">Complained Date & Time:</label>
                <input type="text" id="date_time" name="date_time" value="<?php echo $data['date_time']?>" readonly>

                <label for="lname">Status:</label>
                <td><select class="com-status" name="status" selected value="<?php echo $data['status']?>">
                        <option value="">--Select Status--</option>
                        <option selected value="<?php echo $data['status']?>"><?php echo $data['status']?></option>
                        <?php
                            if($data['status'] == "Pending"){ ?>
                                <option value="Viewed">Viewed</option>
                                <option value="replied">Replied</option>
                        <?php   
                            } elseif ($data['status'] == "Viewed"){  ?> 

                                <option value="Pending">Pending</option>
                                <option value="Replied">Replied</option>
                        <?php       
                            }else {?> 
                                <option value="Viewed">Viewed</option>
                                <option value="Pending">Pending</option>
                        <?php } ?> 
                    </select>
                </td>
                <label for="subject">Response:</label>
                <?php
                    if($data['response']){ ?>
                        <textarea name="response" placeholder="<?php echo $data['response'] ?>" style="height:200px"><?php echo $data['response'] ?></textarea>
                <?php   
                    } else {  ?> 
                        <textarea name="response" placeholder="write Responses here......." style="height:200px" ></textarea>
                <?php       
                    } ?> 
                
                <input type="submit" value="Submit">
                
            </form>
        
            </div>
        </div>
                </div>
                <br>
                 

                    
            </div>
        </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

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
