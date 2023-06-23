<?php
if (!empty($data)) {
    $v1 = $data['O92'];
    $v2 = $data['O95'];
    $v3 = $data['SDL'];
    $v4 = $data['ADL'];
} else {
    $v1 = NULL;
    $v9 = NULL;
    $v2 = NULL;
    $v3 = NULL;
    $v4 = NULL;
    $v5 = NULL;
    $v6 = NULL;
    $v7 = NULL;
    $v8 = NULL;
    $V10 = NULL;
    $V11 = NULL;
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


    <title>Analize</title>
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
            <li class="active">
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
                <a href="View_history">
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
                    <h1>View Fuel Stock History</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">View Stock History</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a href="#">Analize</a>
                        </li>
                    </ul>
                </div>

            </div>



            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>Time Period</h3>
                    </div>
                    <div class="form-inner">

                        <form action="<?php echo ROOT ?>/Manager/Analize/Analize" method="POST">
                            <div class="field">
                                <input type="date" name="startDate" placeholder="">
                            </div>
                            <div class="field">
                                <input type="date" name="finishDate" placeholder="">
                            </div>
                            <br>
                            <div class="btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="Submit">
                            </div>

                    </div>
                </div>
                <div class="order">
                    <div class="head">
                        <h3>Chart</h3>
                    </div>
                    <canvas id="myChart" class="chartBox"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        window.onload = function() {
                            var x1 = " <?php echo "$v1"; ?>";
                            var x2 = " <?php echo "$v2"; ?>";
                            var x3 = " <?php echo "$v3"; ?>";
                            var x4 = " <?php echo "$v4"; ?>";

                            var xValues = ['Octane 92', 'Octane 95', 'Super Diesel', 'Auto Diesel'];
                            var yValues = [x1, x2, x3, x4, 0];
                            var barColors = ["#0EBBEE", "#B0B9BB", "0588AF", "0D5CF0", "#091d2a"];

                            var chart2 = new Chart("myChart", {
                                type: "bar",
                                data: {
                                    label: "No of Liters Arrived",
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: true
                                    },
                                    title: {
                                        display: true,
                                        text: "No of Liters Arrived"
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        }
                        chart2.render();
                    </script>

                </div>
            </div>




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="<?php echo ROOT ?>/JS/Manager/script.js"></script>

</body>

</html>