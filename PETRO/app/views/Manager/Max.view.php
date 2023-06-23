<?php
$flag = '';
if (empty($data['error'])) {
    $flag = true;
} else {
    $flag = false;
}
?>

<?Php
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
            <li class="active">
                <a href="<?php echo ROOT ?>/Manager/Max">
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
                    <h1>Change Maximum</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Change Maximum</a>
                        </li>
                        <!--li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a href="#">Price Details</a>
                        </-->
                    </ul>
                </div>

            </div>

            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>Change Maximum Fuel Amount</h3>
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
                        <form action="<?php echo ROOT ?>/Manager/View_pumper/add" method="POST">
                            <p></p>
                            <div class="">
                                <br>
                                <select name="vehicle" required>
                                    <option value="" disabled selected hidden>Select Vehicle</option>
                                    <option value="car">Car</option>
                                    <option value="van">Van</option>
                                    <option value="mcycle">Motor Cycle</option>
                                    <option value="threewheel">Three Wheel</option>
                                    <option value="bus">Bus</option>
                                    <option value="machine">Machine</option>
                                </select>
                            </div>

                            <div class="field">
                                <input type="number" placeholder="Maximum Amount" name="max">
                            </div>

                            <br>
                            <div class="btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="order">
                    <div class="head">
                        <h3>Vehicle List</h3>
                    </div>
                    <div class="attendance-list">
                        <div class="bar">

                            <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Fuel Type</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($flag == true) {
                                        if (mysqli_num_rows($data['result']) > 0) {
                                            while ($row = mysqli_fetch_assoc($data['result'])) {
                                                echo "<tr data-href = more.html><td>" . $row["id"] . "</td><td>" . $row["vehicle"] . "</td><td>" . $row["max"] . "</td></ data-href>";
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


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
                td = tr[i].getElementsByTagName("td")[2];
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

        function sortTable(columnIndex) {
            var table = document.querySelector('#myTable');
            var rows = Array.from(table.tBodies[0].rows);

            rows.sort(function(row1, row2) {
                var value1 = row1.cells[columnIndex].textContent;
                var value2 = row2.cells[columnIndex].textContent;
                return value1.localeCompare(value2);
            });

            table.tBodies[0].innerHTML = '';

            rows.forEach(function(row) {
                table.tBodies[0].appendChild(row);
            });
        }
    </script>

</body>

</html>