<?php
$flag = '';
if (empty($data['error'])) {
    $flag = true;
} else {
    $flag = false;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Admin/report.css" text="text/css">



    <title>AdminHub</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-gas-pump'></i>
            <span class="text">PETRO</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?php echo ROOT ?>/Admin/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>






            <li>
                <a href="<?php echo ROOT ?>/Admin/Complain">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Response Complaint</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">

            <li>
                <a href="<?php echo ROOT ?>/Home/Login" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>

            <form action="#">
                <div class="form-input">


                    <button type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/th.jpg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <h2>Distribution Manager - Profile</h2>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">


                    </div>

                    <?php
                    if ($flag == true) {
                        if (mysqli_num_rows($data['result']) > 0) {
                            while ($row = mysqli_fetch_assoc($data['result'])) {
                                $phone = $row['phone'];
                                $first = $row['fname'];
                                $last = $row['lname'];
                                $NIC = $row['NIC'];
                                $email = $row['email'];
                    ?>
                                <div class="wrapper">
                                    <div class="form-container">

                                        <div class="form-inner">
                                            <img src="<?php echo ROOT ?>/image/Manager/businessman.png" alt="" style="width:200px;height:300px;">
                                            <form action="<?php echo ROOT ?>/Admin/View_dis/remove" method="POST">

                                                <div class="field">
                                                    <input type="email" class="box" name="email" value="Email: <?php echo $email ?>" readonly>
                                                </div>
                                                <div class="field">
                                                    <input type="text" class="box1" name="First_name" value="First Name: <?php echo $first ?>" readonly>
                                                </div>
                                                <div class="field">
                                                    <input type="text" class="box1" name="Last_name" value="Last Name: <?php echo $last ?>" readonly>
                                                </div>
                                                <div class="field">
                                                    <input type="text" class="box" name="distribution_manager_NIC" value="NIC: <?php echo $NIC ?>" readonly>
                                                </div>
                                                <div class="field">
                                                    <input type="text" class="box" name="phone" value="Phone Number: <?php echo $phone ?>" readonly>
                                                </div><br><br>
                                                <div class="left">
                                                    <button type="submit" name="submit" value="remove" class="btn1">Remove</button>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                    <?php

                            }
                        }
                    }
                    ?>







                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

        allSideMenu.forEach(item => {
            const li = item.parentElement;

            item.addEventListener('click', function() {
                allSideMenu.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });




        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function() {
            sidebar.classList.toggle('hide');
        })







        const searchButton = document.querySelector('#content nav form .form-input button');
        const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
        const searchForm = document.querySelector('#content nav form');

        searchButton.addEventListener('click', function(e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchButtonIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchButtonIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        })





        if (window.innerWidth < 768) {
            sidebar.classList.add('hide');
        } else if (window.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }


        window.addEventListener('resize', function() {
            if (this.innerWidth > 576) {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        })



        const switchMode = document.getElementById('switch-mode');

        switchMode.addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        })
    </script>
</body>

</html>