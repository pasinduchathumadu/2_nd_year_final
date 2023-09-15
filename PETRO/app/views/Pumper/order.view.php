<?php
if ($data['loading'] == '1') {
    $data['pumped_liters'] = null;
    $data['remaining_liters'] = null;
    $data['price'] = null;
    $data['balance'] = null;
    $data['per_liter'] = null;
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
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Pumper/order.css" text="text/css">
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
            <li class="active">
                <a href="<?php echo ROOT ?>/Pumper/User">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Working Report</span>
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
                    <i class='bx bxs-message-dots'></i>
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
                    <i class='bx bxs-group'></i>
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

            <ul class="box">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>Validate The Order</h3>
                        <p>New Order</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>Payment Details</h3>
                        <p>Here----------------------------------</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">

                    <table>
                        <tbody>
                            <div class="container2">
                                <!-- display the order details -->
                                <ul class="responsive-table">

                                    <li class="table-row">
                                        <div class="col col-1">
                                            Order ID
                                        </div>

                                        <div class="col col-4">
                                            <!-- display order_id -->
                                            <?php echo ($_SESSION['order_id']) ?>
                                        </div>
                                    </li>
                                    <li class="table-row">
                                        <div class="col col-1">
                                            Vehicle No
                                        </div>

                                        <div class="col col-4">
                                            <?php echo $data["vehicle_no"] ?>
                                        </div>
                                    </li>

                                    </li>
                                    <li class="table-row">
                                        <div class="col col-1">
                                            Fuel Type
                                        </div>

                                        <div class="col col-4">
                                            <?php echo $data["Fuel_Type"] ?>
                                        </div>
                                    </li>

                                    <li class="table-row">
                                        <div class="col col-1">
                                            Amount
                                        </div>

                                        <div class="col col-4">
                                            <?php echo $data["Amount"], " Liters", "<br>"; ?>
                                        </div>
                                    </li>
                                    <li class="table-row">
                                        <div class="col col-1">
                                            Payment
                                        </div>

                                        <div class="col col-4">
                                            RS.<?php echo $data["payment"] ?>
                                        </div>
                                    </li>
                                    <li class="table-row">
                                        <div class="col col-1">
                                            Paid By Points
                                        </div>

                                        <div class="col col-4">
                                            <?php echo $data["points"] ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </tbody>
                    </table>
                </div>




                <br>
                <?php
                if ($data['remark'] == 0) { ?>
                    <!-- enter the pumping details -->
                    <div class="todo">
                        <form name="myForm" action="<?php echo ROOT ?>/Pumper/Order/order_complete" onsubmit="return validateForm()" method="post" required>
                            <label>Enter Liters:</label>
                            <input class="textarea" type="number" name="pumped" /><br><br>
                            <button type="submit" name="OK" id="ok" class="btn">Complete</button><br><br>
                        </form>
                        <br>
                    <?php
                } else {
                    ?>
                        <div class="todo1">
                            <!-- display error message -->
                            <?php if ($data['success']) { ?>
                                <p class="success"><?php echo $data['success'] ?></p><br>
                            <?php
                            }
                            ?>
                            <?php if ($data['error']) { ?>
                                <p class="error"><?php echo $data['error'] ?></p><br>
                            <?php
                            }
                            ?>
                        <?php
                    }
                        ?>








                        <div class="container2">

                            <ul class="responsive-table">
                                <!-- payment details -->

                                <li class="table-row">
                                    <div class="col col-1">
                                        Pumped Liters
                                    </div>

                                    <div class="col col-4">
                                        <?php echo $data['pumped_liters'] ?>
                                    </div>
                                </li>

                                <li class="table-row">
                                    <div class="col col-1">
                                        Remaining Liters</div>

                                    <div class="col col-4"><?php echo $data['remaining_liters'] ?></div>
                                </li>

                                <li class="table-row">
                                    <div class="col col-1">Price Per Litere:</div>

                                    <div class="col col-4">
                                        <?php echo $data['per_liter'] ?>
                                    </div>
                                </li>

                                <li class="table-row">
                                    <div class="col col-1">
                                        Price:
                                    </div>

                                    <div class="col col-4">
                                        <?php echo $data['price'] ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if ($data['remark'] == 1) {
                        ?>
                            <br><br>
                            <button type="submit" name="OK" id="ok" class="btn1"><a class="link" href="<?php echo ROOT ?>/Pumper/User">Next Order</a></button><br><br>

                        <?php
                        }
                        ?>
                        </div>
                    </div>

                    <br><br>





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


        function validateForm() {
            var x = document.forms["myForm"]["pumped"].value;
            if (x == "" || x == null) {
                alert("Amount of the pumped liters must be filled out");
                return false;
            } else {
                return true;
            }
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