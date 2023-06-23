<?php
$flag = '';
if (empty($data['error'])) {
    $flag = true;
} else {
    $flag = false;
}
?>

<?php
if (!empty($data)) {
    $v1 = $data['O92'];
    $v2 = $data['O95'];
    $v3 = $data['SDL'];
    $v4 = $data['ADL'];
    $v5 = $data['income92'];
    $v6 = $data['income95'];
    $v7 = $data['incomesdl'];
    $v8 = $data['incomeadl'];
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


    <title>PETRO</title>
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
                <a href="#">
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

                <?php echo ($data['First_name']); ?><?php echo " "; ?><?php echo ($data['Last_name']); ?>
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>

            </div>

            <ul class="box-info">

                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Octane 92</h3>
                        <p>Available for Customers :
                            <?php echo ($data["eligible_amount"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Minimum Fuel Capacity :
                            <?php echo ($data["remain_amount"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty Space : <?php echo ($data["percentage"]); ?> %</p>
                        <p> Price : Rs. <?php echo ($data["price"]); ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Octane 95</h3>
                        <p>Available for Customers :
                            <?php echo ($data["eligible_amount2"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Minimum Fuel Capacity :
                            <?php echo ($data["remain_amount2"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty Space : <?php echo ($data["percentage2"]); ?> %</p>
                        <p> Price : Rs. <?php echo ($data["price2"]); ?></p>
                    </span>
                </li>
            </ul>
            <ul class="box-info">


                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Super Diesel</h3>
                        <p>Available for Customers :
                            <?php echo ($data["eligible_amount3"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Minimum Fuel Capacity :
                            <?php echo ($data["remain_amount3"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty Space : <?php echo ($data["percentage3"]); ?> %</p>
                        <p> Price : Rs. <?php echo ($data["price3"]); ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h3>Auto Diesel</h3>
                        <p>Available for Customers :
                            <?php echo ($data["eligible_amount4"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Minimum Fuel Capacity :
                            <?php echo ($data["remain_amount4"]); ?>
                            <?php echo " L" ?>
                        </p>
                        <p> Empty Space : <?php echo ($data["percentage4"]); ?> %</p>
                        <p> Price : Rs. <?php echo ($data["price4"]); ?></p>
                    </span>
                </li>

            </ul>


            <div class="table-data">
                <div class="todo">
                    <header>
                        <p class="current-date"></p>
                        <div class="icons">
                            <span id="prev" class="material-symbols-rounded">chevron_left</span>
                            <span id="next" class="material-symbols-rounded">chevron_right</span>
                        </div>
                    </header>
                    <div class="calendar">
                        <ul class="weeks">
                            <li>Sun</li>
                            <li>Mon</li>
                            <li>Tue</li>
                            <li>Wed</li>
                            <li>Thu</li>
                            <li>Fri</li>
                            <li>Sat</li>
                        </ul>
                        <ul class="days"></ul>
                    </div>

                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Today Sales of Fuel</h3>
                    </div>
                    <div class="box-info">
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
                                var barColors = ["#0EBBEE", "#B0B9BB", "0588AF", "BLUE", "#091d2a"];

                                var chart2 = new Chart("myChart", {
                                    type: "pie",
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
                                            text: "Today Selling"
                                        },
                                        scales: {

                                        }
                                    }
                                });
                            }
                            chart2.render();
                        </script>
                    </div>
                    <br>
                    <h4>Income from octane 92 : Rs. <?php echo $v5 ?? NULL ?></h4>
                    <h4>Income from octane 95 : Rs.<?php echo $v6 ?? NULL ?></h4>
                    <h4>Income from super diesel : Rs.<?php echo $v7 ?? NULL ?></h4>
                    <h4>Income from auto diesel : Rs.<?php echo $v8 ?? NULL ?></h4>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Out Of Stock Products</h3>
                    </div>
                    <div class="attendance-list">
                        <div class="bar">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($flag == true) {
                                        if (mysqli_num_rows($data['products']) > 0) {
                                            while ($row = mysqli_fetch_assoc($data['products'])) {
                                                echo "<tr data-href = more.html><td>" . $row["p_id"] . "</td><td>" . $row["name"] . "</td></ data-href></tr>";
                                            }
                                        }
                                    }
                                    ?></tbody>
                            </table>
                        </div>
                    </div>

                </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="<?php echo ROOT ?>/JS/Manager/calender.js""></script>
    <script src=" <?php echo ROOT ?>/JS/Manager/script.js""></script>
    <script src="todo.js"></script>
</body>

</html>