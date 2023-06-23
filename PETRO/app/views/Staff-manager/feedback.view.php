<?php
   if(!empty($data)){
    $count1=$data['result1'];
    $count2=$data['result2'];
    $count3=$data['result3'];
    $count4=$data['result4'];
    $count5=$data['result5'];
   }
   
        
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complain</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/feedback.css" />
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/style.css" text="text/css" />

    <!-- Font Awesome Cdn Link -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <li  class="active">
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
                    <h1>User Feedback</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Feedback">User Feedback</a>
                        </li>
                    </ul>
                </div>
            
            </div>

            <div class="table-data">
                <div class="order">
                    <h3>Feedback Analysis</h3>
                    <div class="flex-container">
                        <table class="table">
                            <tr><td>Number of Very Satisfied :</td>
                                <?php echo "<td> "  .$count1." </td>"?></tr>
                            <tr><td>Number of Satisfied :</td>
                                <?php echo "<td> "  .$count2." </td>"?></tr>
                            <tr><td>Number of Neutral :</td>
                                <?php echo "<td> "  .$count3." </td>"?></tr>
                            <tr><td>Number of Dissatisfied :</td>
                                <?php echo "<td> "  .$count4." </td>"?></tr>
                            <tr><td>Number of Very Dissatisfied :</td>
                                <?php echo "<td> "  .$count5." </td>"?></tr>
                        </table>
                    </div>

                </div>
                
                <div class="order">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                        <canvas id="myChart" style="width:100%;max-width:500px"></canvas>
                        <script>

                            
                            window.onload=function(){
                                var x1 =" <?php echo "$count1" ; ?>";
                                var x2 =" <?php echo "$count2" ; ?>";
                                var x3 =" <?php echo "$count3" ; ?>";
                                var x4 =" <?php echo "$count4" ; ?>";
                                var x5 =" <?php echo "$count5" ; ?>";
                                

                            var xValues = ["Very Satisfied", "Satisfied" ,"Neutral", "Dissatisfied","Very Dissatisfied"];
                            var yValues = [ x1,x2,x3,x4,x5,0];
                            var barColors = ["#BFD7ED", "#60A3D9","#0074B7","#003B73","#0C2D48"];

                            var chart2=new Chart("myChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Feedback Analysis Chart"
                                }
                            }
                            });
                        }
                        chart2.render();
                    </script>
                </div>
            </div>

            <div class="table-data">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Feedback ID </th>
                            <th> User ID </th>
                            <th> Date </th>
                            <th> Rating </th>
                            <th> Feedback </th>
                        </tr>
                    </thead>
                        <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($data['result'])){
                                
                        ?>
                            <td name="com-id"> FB<?php echo $row['feedback_id'];?> </td>
                                <td> <?php echo $row['user_id'];?> </td>
                                <td> <?php echo $row['date'];?> </td>
                                <td> <?php echo $row['rating'];?> </td>
                                <td> <?php echo $row['feedback'];?> </td>
                            </tr>
                        <?php
                            }
                        ?>
                </table>
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