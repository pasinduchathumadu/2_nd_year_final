<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Pumper/change.css" text="text/css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Common/common.css" text="text/css">
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
            <li class="">
                <a href="<?php echo ROOT ?>/Pumper/User">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working">
                <i class='bx bxs-report'></i>
                    <span class="text">Pumped History</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working_hours">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Working Hours</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Pumper/Analysis">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working_salary">
                <i class='bx bxs-report'></i>
                    <span class="text">Salary Report</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo ROOT ?>/Pumper/Change_password">
                    <i class='bx bxs-group'></i>
                    <span class="text">Change Password</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Pumper/Complain">
                <i class='bx bxs-envelope'></i>
                    <span class="text">Complain Box</span>
                </a>
            </li>




        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Logout" class="logout">
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

            <?php echo $_SESSION['first_name'] ?>
            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/th.jpg">
            </a>
        </nav>

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <?php
                // there is message to display
                if (($data['error']) || $data['success']) { ?>
                    <div class="table-data">
                        <div class="order">

                            <!-- show the message -->
                            <div class="todo1">
                                <?php if ($data['error'] != NULL) { ?>
                                    <p class="error"><?php echo $data['error'] ?></p>
                                <?php
                                }
                                ?>
                                <?php if ($data['success'] != NULL) { ?>
                                    <p class="success"><?php echo $data['success'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Change The Password</h3>
                    </div>
                    <div class="abc">
                        <div class=form-inner>
                            <!-- get required details and pass to the controller -->
                            <form method="POST" action="<?php echo ROOT ?>/Pumper/Change_password/change">
                                <div class="field">
                                    <input type="password" name="current_password" required placeholder="Enter Current Password">
                                </div><br>
                                <div class="field">
                                    <input type="password" name="new_password" id="t1" required placeholder="Enter New Password">
                                </div>
                                </p><br>
                                <div class="field">
                                    <input type="password" name="confirm_password" required placeholder="Confirm New Password">
                                </div>
                                </p><br><br>
                                <div class="bcd">
                                    <ul type="Square">
                                        <li>At least 1 uppercase character.</li>
                                        <li>At least 1 lowercase character.</li>
                                        <li>At least 1 digit.</li>
                                        <li>At least 1 special character.</li>
                                        <li>Minimum 8 characters.</li>
                                    </ul>
                                </div>
                                <br><br>
                                <button type="submit" name="submit" class="btn" onclick="test_str()">Save Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Profile Details</h3>
                    </div>
                    <ul class="todo-list">
                        <!-- show profile details -->
                        <li class="">
                            <div class="left">
                                Pumper ID:
                            </div>
                            <div class="right">
                                <?php echo $data['id'] ?>
                            </div>
                        </li>
                        <li class="">
                            <div class="left">
                                First Name:
                            </div>
                            <div class="right">
                                <?php echo $data['first'] ?>
                            </div>
                        </li>

                        <li class="">
                            <div class="left">
                                Last Name:
                            </div>
                            <div class="right">

                                <?php echo $data['last'] ?>
                            </div>
                        </li>
                        <li class="">
                            <div class="left">
                                NIC:
                            </div>
                            <div class="right">

                                <?php echo $data['nic'] ?>
                            </div>
                        </li>
                        <li class="">
                            <div class="left">
                                EMAIL:
                            </div>
                            <div class="right">

                                <?php echo $data['email'] ?>
                            </div>
                        </li>
                        <li class="">
                            <div class="left">
                                Contact-No:
                            </div>
                            <div class="right">

                                <?php echo $data['number'] ?>
                            </div>
                        </li>
                    </ul>

                    <ul class="box">
                        <li>
                            <!-- show the last access time -->
                            <i class='bx bxs-calendar-check'></i>
                            <span class="text">
                                <h3>Access Time</h3>
                                <p><?php echo $_SESSION['login_time'] ?></p>
                            </span>
                        </li>
                       
                    </ul>
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

        function test_str() {
            var res;
            var str =
                document.getElementById("t1").value;
            if (str.match(/[a-z]/g) && str.match(
                    /[A-Z]/g) && str.match(
                    /[0-9]/g) && str.match(
                    /[^a-zA-Z\d]/g) && str.length >= 8)
                res = "TRUE";
            else
                alert("Boundary rules are not matched!Check the conditions.");
        }
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