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


    <title>Report</title>
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
            <li class="active">
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
                <a href="#">
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
                    <h1>Generate PDF</h1>
                    <ul class="breadcrumb">
                        <li><span>
                                <a href="#">Add Daily Report / </a><a href="<?php echo ROOT ?>/Manager/Report_history">Report History</a></span>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a href="#">Generate PDF</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="table-data">
                <div class="order">
                    <div class="attendance-list">
                        <h2>Daily Report</h2><br>
                        <h3>Date :
                            <?php echo ($data['date']); ?>
                        </h3>
                        <br>
                        <h3>Octane 92</h3>
                        <br>
                        <p>Reduced amount according to the physical count :
                            <?php echo ($data['reduced92']) ?? NULL; ?> L
                        </p>
                        <p>Reduced amount according to the system count :
                            <?php echo ($data['complete92']) ?? NULL; ?> L
                        </p>
                        <p>Difference of physical count & system count :
                            <?php echo ($data['diff92']) ?? NULL; ?> L
                        </p>
                        <br>
                        <h3>Octane 95</h3>
                        <br>
                        <p>Reduced amount according to the physical count :
                            <?php echo ($data['reduced95']) ?? NULL; ?> L
                        </p>
                        <p>Reduced amount according to the system count :
                            <?php echo ($data['complete95']) ?? NULL; ?> L
                        </p>
                        <p>Difference of physical count & system count :
                            <?php echo ($data['diff95']) ?? NULL; ?> L
                        </p>
                        <br>
                        <h3>Super Diesel</h3>
                        <br>
                        <p>Reduced amount according to the physical count :
                            <?php echo ($data['reducedSdl']) ?? NULL; ?> L
                        </p>
                        <p>Reduced amount according to the system count :
                            <?php echo ($data['completeSdl']) ?? NULL; ?> L
                        </p>
                        <p>Difference of physical count & system count :
                            <?php echo ($data['diffSdl']) ?? NULL; ?> L
                        </p>
                        <br>
                        <h3>Auto Diesel</h3>
                        <br>
                        <p>Reduced amount according to the physical count :
                            <?php echo ($data['reducedAdl']) ?? NULL; ?> L
                        </p>
                        <p>Reduced amount according to the system count :
                            <?php echo ($data['completeAdl']) ?? NULL; ?> L
                        </p>
                        <p>Difference of physical count & system count :
                            <?php echo ($data['diffAdl']) ?? NULL; ?> L
                        </p>
                        <br>
                        <br>
                        <p>Check and created by ...........................</p>
                        <p>Signature .......................</p>
                    </div><br>
                    <a href="<?php echo ROOT ?>/Manager/Report/download" class="btn-download">
                        <i class='bx bxs-cloud-download'></i>
                        <span class="text">Download PDF</span>
                    </a>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="calender.js"></script>
    <script src="<?php echo ROOT ?>/JS/Manager/script.js"></script>


</body>

</html>