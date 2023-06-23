<?php

$first = $_SESSION['fuel_first_name'];
$last = $_SESSION['fuel_last_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Manager/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


    <title>Update Fuel</title>
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
                <a href="<?php echo ROOT ?>/Manager/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo ROOT ?>/Manager/Update">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Update Fuel Details</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Manager/View_history">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Manager/Add_report">
                    <i class='bx bxs-report'></i>
                    <span class="text">Add Daily Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Manager/Report_history">
                    <i class='bx bx-history'></i>
                    <span class="text">Report History</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Manager/View_order">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">View Orders</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Manager/Max">
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">Maximum Fuel</span>
                </a>
            </li>
            <li>
                <a href="Product">
                    <i class='bx bxs-cart-add'></i>
                    <span class="text">Add Products</span>
                </a>
            </li>

        </ul>
        <ul class="side-menu">
            <li>
                <a href="Home">
                    <i class='bx bx-left-arrow-circle bx-fade-left-hover'></i>
                    <span class="text">Back</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
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
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <?php echo $first; ?><?php echo " "; ?><?php echo $last; ?>
            </a>
            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/Manager/pro.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Update Fuel Details</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Update Fuel Details</a>
                        </li>
                        <!--li><i class='bx bx-chevron-right'></i></li-->

                    </ul>
                </div>

            </div>

            <ul class="box-info">

                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Octane 92</h3>
                        <p>Allowed :
                            <?php echo ($data["eligible_amount"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Blocked :
                            <?php echo ($data["remain_amount"] ?? null); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty : <?php echo ($data["empty"] ?? null); ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Octane 95</h3>
                        <p>Allowed :
                            <?php echo ($data["eligible_amount2"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Blocked :
                            <?php echo ($data["remain_amount2"] ?? null); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty : <?php echo ($data["empty2"] ?? null); ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Super Diesel</h3>
                        <p>Allowed :
                            <?php echo ($data["eligible_amount3"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Blocked :
                            <?php echo ($data["remain_amount3"] ?? null); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty : <?php echo ($data["empty3"] ?? null); ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Auto Diesel</h3>
                        <p>Allowed :
                            <?php echo ($data["eligible_amount4"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Blocked :
                            <?php echo ($data["remain_amount4"] ?? null); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty : <?php echo ($data["empty4"] ?? null); ?></p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>Update Availability</h3>

                    </div>
                    <div class="form-inner">
                        <div class="error">
                            <?php if (!empty($_SESSION['error'])) : ?>
                                <i class='bx bx-error-alt'></i>
                                <span class="text"><?php echo $_SESSION['error_message']; ?></span>
                            <?php endif; ?>
                            <!-- Clear the error message from the session variable -->
                            <?php unset($_SESSION['error_message']); ?>

                            <?php echo $data['error'] ?>;
                        </div>
                        <form action="<?php echo ROOT ?>/Manager/Update/add" method="POST">
                            <p></p>
                            <div class="">
                                <br>
                                <select name="fuel_type" required>
                                    <option value="" disabled selected hidden>Select Fuel Type</option>
                                    <option value="octane 92">Octane 92</option>
                                    <option value="octane 95">Octane 95</option>
                                    <option value="super diesel">Super Diesel</option>
                                    <option value="auto diesel">Auto Diesel</option>
                                </select>
                            </div>

                            <div class="field">
                                <input type="number" placeholder="Arrived Amount" name="arrive_amount" max=15000>
                            </div>
                            <div class="field">
                                <input type="number" placeholder="Buying Price" name="buying_price">
                            </div>

                            <br>
                            <div class="btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="Add">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Price List</h3>

                    </div>
                    <ul class="todo-list">
                        <li>
                            <p>Octane 92 : Rs. <?php echo ($data["price"]) ?></p>
                            <i class='bx bx-dollar-circle'></i>
                        </li>
                        <li>
                            <p>Octane 95 : Rs. <?php echo ($data["price2"]) ?></p>
                            <i class='bx bx-dollar-circle'></i>
                        </li>
                        <li>
                            <p>Super Diesel : Rs. <?php echo ($data["price3"]) ?></p>
                            <i class='bx bx-dollar-circle'></i>
                        </li>
                        <li>
                            <p>Auto Diesel : Rs. <?php echo ($data["price4"]) ?></p>
                            <i class='bx bx-dollar-circle'></i>
                        </li>

                    </ul>
                    <br>
                    <a href="<?php echo ROOT ?>/Manager/Change_price" class="checkbox1">Click here to change prices</a>
                </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="calender.js"></script>
    <script src="<?php echo ROOT ?>/JS/Manager/script.js"></script>
    <script src="todo.js"></script>
</body>

</html>