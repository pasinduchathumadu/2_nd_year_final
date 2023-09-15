<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Pumper/user.css" text="text/css">




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
            <li class="active">
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
            <li>
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
                <a href="#">
                    <i class='bx bx-left-arrow-circle bx-fade-left-hover'></i>
                    <span class="text">Back</span>
                </a>
            </li>
            <li>
                <!-- check the pumper is assigned or not -->
                <a href="<?php echo ROOT ?>/Pumper/Logout" <?php if ($data['logout_error'] != '') { ?> onclick="validate_form()" <?php } ?> class="logout">
                    <i class='bx bxs-log-out-circle bx-fade-left-hover'></i>
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
        <!-- NAVBAR -->


        <!-- MAIN -->
        <main>

            <!-- Price range of the fuel Availbility -->
            <ul class="box">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>92-Octane</h3>
                        <h3>Rs.<?php echo $data['price_92'] ?></h3>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>95-Octane</h3>
                        <h3>Rs.<?php echo $data['price_95'] ?></h3>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>Auto-Diesel</h3>
                        <h3>Rs.<?php echo $data['price_auto'] ?></h3>
                    </span>
                </li>

                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>Super-Diesel</h3>
                        <h3>Rs.<?php echo $data['price_super'] ?></h3>
                    </span>
                </li>
            </ul>
            <br>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>ORDER VALIDATION</h3>

                    </div>


                    <form action="<?php echo ROOT ?>/Pumper/User/order_verify" method="post"><br>

                        <label class="main4">Enter the Order Number:</label>
                        <input class="textarea" type="text" name="order_id" required><br>
                        <!-- display error message for pre-order -->
                        <p class="error"><?php echo $data['error'] ?></p><br>

                        <button type="submit" name="submit" class="btn">Confirm</button>
                        <br><br>

                    </form>

                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Non-Ordered Customers</h3>
                    </div>

                    <div class="inner">

                        <form action="<?php echo ROOT ?>/Pumper/User/Non_order" method="post">
                            <h3>Require Registerd Phone Number</h3><br>
                            <label class="middle">Contact-Number :</label>
                            <input type="text" name="no" class="contact" required /><br><br>
                            <!-- display error message for non-ordering -->
                            <p class="error"><?php echo $data['error_non'] ?></p><br>

                            <button type="submit" name="submit" class="btn1">Procced</button>
                        </form>

                    </div>


                </div>


                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Availbility Of The Filling Station</h3>
                            <!-- display fuel Availbility -->
                        </div>
                        <ul class="box">
                            <li>
                                <i class='bx bxs-gas-pump'></i>
                                <span class="text">
                                    <h3>92-Octane</h3>
                                    <h3><?php echo $data['remain_92'] ?>L</h3>
                                </span>
                            </li>
                            <li>
                                <i class='bx bxs-gas-pump'></i>
                                <span class="text">
                                    <h3>95-Octane</h3>
                                    <h3><?php echo $data['remain_95'] ?>L</h3>
                                </span>
                            </li>
                            <li>
                                <i class='bx bxs-gas-pump'></i>
                                <span class="text">
                                    <h3>Auto-Diesel</h3>
                                    <h3><?php echo $data['remain_auto'] ?>L</h3>
                                </span>
                            </li>
                            <li>
                                <i class='bx bxs-gas-pump'></i>
                                <span class="text">
                                    <h3>Super-Diesel</h3>
                                    <h3><?php echo $data['remain_super'] ?>L</h3>
                                </span>
                            </li>
                        </ul>
                    </div>
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

        function validate_form() {
            window.alert("YOUR SHIFT TIME IS NOT OVER!!!");

        }
        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function() {
            sidebar.classList.toggle('hide');
        })

        function openForm() {
            document.getElementById("myForm").classList.add("animate");
            document.getElementById("myForm").style.display = "block"

        }

        function closeForm() {
            document.getElementById("myForm").classList.remove("animate");
            document.getElementById("myForm").style.display = "none";
            openForm1();
        }


        function openForm1() {
            document.getElementById("myForm1").classList.add("animate");
            document.getElementById("myForm1").style.display = "block"

        }

        function closeForm1() {
            document.getElementById("myForm1").classList.remove("animate");
            document.getElementById("myForm1").style.display = "none";
            closeForm1();

        }


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