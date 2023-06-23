<?php
$flag = '';
if (empty($data['error'])) {
    $flag = true;
} else {
    $flag = false;
}
?>

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


    <title>Add Daily Report</title>
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
            <li>
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
            <li class="active">
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
                    <i class='bx bxs-group'></i>
                    <span class="text">View Orders</span>
                </a>
            </li>
            <li>
                <a href=Max>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">Maximum Fuel</span>
                </a>
            </li>
            <li>
                <a href="Product">
                    <i class='bx bxs-group'></i>
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
                <a href="" class="logout">
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
                    <h1>Add Daily Report</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Add Daily Report</a>
                        </li>
                        <!--li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a href="#"></a>
                        </li-->
                    </ul>
                </div>

            </div>



            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>Add Data</h3>
                    </div>
                    <div class="form-inner">
                        <div class="error">
                            <?php if (!empty($_SESSION['error_message'])) : ?>
                                <i class='bx bx-error-alt'></i>
                                <span class="text"><?php echo $_SESSION['error_message']; ?></span>
                            <?php endif; ?>
                            <!-- Clear the error message from the session variable -->
                            <?php unset($_SESSION['error_message']); ?>
                        </div>
                        <form action="<?php echo ROOT ?>/Manager/Add_report/Add_report" method="POST">
                            <div class="field">
                                <input type="date" name="date" placeholder="Date">
                            </div>
                            <div class="field">
                                <input type="number" placeholder="Reduced Octane 92 Amount" name="reduced92" required>
                            </div>
                            <div class="field">
                                <input type="number" placeholder="Reduced Octane 95 Amount" name="reduced95" required>
                            </div>
                            <div class="field">
                                <input type="number" placeholder="Reduced Super Diesel Amount" name="reducedsdl" required>
                            </div>
                            <div class="field">
                                <input type="number" placeholder="Reduced Auto Diesel Amount" name="reducedadl" required>
                            </div>
                            <br>
                            <div class="btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="Submit">
                            </div>
                    </div>
                    </form>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Instructions To Create Report</h3>
                    </div>
                    <div class="todo-list">
                        <li>
                            1. At the Begining of the day again count the amount of fuels in the tanks.
                        </li>
                        <li>
                            2. At the end of the day again count the amount of fuels in the tanks.
                        </li>
                        <li>
                            3.Then get the difference between these two measurements and fill The form and submit it.
                        </li>
                        <li>
                            4. Then the report will be generated. If there are difference between physically reduced amount and reduced amount according to the
                            system details it will be shown in the report.
                        </li>
                    </div>



                </div>
            </div>

            <script src="<?php echo ROOT ?>/JS/Manager/script.js"></script>

</body>

</html>