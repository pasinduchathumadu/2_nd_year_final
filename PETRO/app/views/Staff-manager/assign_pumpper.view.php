<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PETRO</title>
    <!-- css for icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/assign_pumpper.css"/>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/style.css" text="text/css" />

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
            <li class="active">
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
                    <h1>Assign Pumper</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Assign_pumpper">Assign Pumper</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="todo">
                        
                        <form action="<?php echo ROOT ?>/Staff-manager/Assign_pumpper/assign" method="post" class="form-inner">                    
                            <div >
                                <h2>Select Pump Mashine</h2>
                                <select class="form-select" name="pumperMashine" selected value="<?php echo $data["PumpID"]?>">
                                    <option value="">--Pump Mashine--</option>
                                    <?php
                                        while($rows = mysqli_fetch_array($data['result'])){
                                            echo "<option value='".$rows['PumpID']."'>".$rows['PumpID']."</option>";
                                        }
                                    ?>  
                                </select>
                            </div>
                            <div>
                                <h2>Select a Pumper</h2>
                                <select class="form-select" name="pumperid" selected value="<?php echo $data["id "]?>">
                                    <option value="">--Pumper ID--</option>
                                    <?php
                                        while($rows = mysqli_fetch_array($data['resultPumper'])){
                                            echo "<option value='".$rows['id']."'>".$rows['id']."</option>";
                                        }
                                    ?> 
                                    
                                    <option value="remove" name='remove'>Remove Pumper</option> 
                                </select>
                            </div>
                            <!-- print error massage -->
                                <?php
                                    if($data['error']!=0 || isset($data['error'])){ 
                                        echo '<span class="errorMsg">&nbsp' .$data['error'].'</span>';
                                    };
                                ?>
                             
                            <div class="btn">
                            <div class="btn-layer"></div>
                                <input type="submit" name="submit" value="Assign" >
                            </div>
                        </form>

                       

                   
                    
                </div>
                
                <div class="todo">
                    <div class="flex-container">
                        <table class="table">
                            <tr><td>Total Pumpers count :</td>
                                <?php $totalpumper = $this->order->pumpercount();
                                echo "<td> "  .$totalpumper." </td>"?></tr>
                            <tr><td>Total Assigned Pumpers :</td>
                                <?php $totalpumper = $this->order->activepumpercount();
                                echo "<td> "  .$totalpumper." </td>"?></tr>
                        </table>
                    </div>
                    <br>
                    <div class="flex-container-tag">
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('D001');
                           echo "<h3 style='background-color: $color;'>D1</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('D002');
                           echo "<h3 style='background-color: $color;'>D2</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('D003');
                           echo "<h3 style='background-color: $color;'>D3</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('D004');
                           echo "<h3 style='background-color: $color;'>D4</h3>"; 
                        ?></div>
                    
                        <h1> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     </h1>

                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('P001');
                           echo "<h3 style='background-color: $color;'>P1</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('P002');
                           echo "<h3 style='background-color: $color;'>P2</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('P003');
                           echo "<h3 style='background-color: $color;'>P3</h3>"; 
                        ?></div>
                        <div class="pump-colour"> <?php
                            $color = $this->order->mashineColour('P004');
                           echo "<h3 style='background-color: $color;'>P4</h3>"; 
                        ?></div>
                    </div>
                </div>
                        
            </div>
            <br>
        
            <div class="table-data">
                <div class="todo">  
                    <h2>Diesel Machine 01</h2>
                    <ul class="box-info">

                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 01 (D001)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('D001');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span>
                        </li>
                    <li>
                    
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 02 (D002)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('D002');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span>
                    </li> 
                </div>
                <div class="todo">  
                    <h2>Diesel Machine 02</h2> 
                    <ul class="box-info">

                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 03 (D003)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('D003');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span>
                        </li>
                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 04 (D004)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('D004');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span>
                    </li>
                    </ul>
                </div>
            </div>


            <div class="table-data">
                <div class="todo">  
                    <h2>Petrol Machine 01</h2>
                    <ul class="box-info">
                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 01 (P001)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('P001');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span></li>
                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 02 (P002)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('P002');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span></li>
                    </ul> 
                </div>

                <div class="todo">  
                    <h2>Petrol Machine 02</h2>
                    <ul class="box-info">
                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 03 (P003)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('P003');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span>
                        </li>
                    <li>
                        <i class='bx bxs-gas-pump'></i>
                        <span class="text">
                            <h3>Pump 04 (P004)</h3>
                            <p><?php
                                    $assignedpumper = $this->order->show_assign_pumpper('P004');
                                    echo "<p value>'".$assignedpumper."'</p>"; 
                                ?>
                            </p>
                        </span>
                    </li>

                    </ul>
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