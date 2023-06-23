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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Manager/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


    <title>Change Price</title>
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
                <a href="Update">
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
                    <h1>Update Fuel Details</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Update Fuel Details</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a href="#">Price Details</a>
                        </li>
                    </ul>
                </div>

            </div>



            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>Change Prices</h3>
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
                        <form action="<?php echo ROOT ?>/Manager/Change_Price/change_price" method="POST">
                            <div class="">
                                <br>
                                <select name="fuel_type">
                                    <option value="" disabled selected hidden>Select Fuel Type</option>
                                    <option value="octane 92">Octane 92</option>
                                    <option value="octane 95">Octane 95</option>
                                    <option value="super diesel">Super Diesel</option>
                                    <option value="auto diesel">Auto Diesel</option>
                                </select>
                            </div>
                            <div class="field">
                                <input type="number" name="price" placeholder="Price">
                            </div>
                            <br>

                            <input type="checkbox" required class="checkbox1">
                            <span class="span">Confirm details</span>
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
                    <div class="box-info">
                        <canvas id="myChart" class="chartBox"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            window.onload = function() {

                                var xValues = ['Octane 92', 'Octane 95', 'Super Diesel', 'Auto Diesel'];
                                var yValues = [20, 15, 10, 8, 0];
                                var barColors = ["#0EBBEE", "#B0B9BB", "0588AF", "0D5CF0", "#091d2a"];

                                var chart2 = new Chart("myChart", {
                                    type: "line",
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
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Price History</h3>
                    </div>
                    <div class="attendance-list">
                        <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search by Date" class="search">
                        <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Fuel Type</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($flag == true) {
                                    if (mysqli_num_rows($data['result']) > 0) {
                                        while ($row = mysqli_fetch_assoc($data['result'])) {
                                            echo "<tr data-href = more.html><td>" . $row["id"] . "</td><td>" . $row["date"] . "</td><td>" . $row["fuel_type"] . "</td><td>" . $row["price"] . "</td></ data-href>";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="calender.js"></script>
    <script src="<?php echo ROOT ?>/JS/Manager/script.js"></script>

    <script src="todo.js"></script>
    <script type="application/javascript">
        function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    </script>
</body>

</html>