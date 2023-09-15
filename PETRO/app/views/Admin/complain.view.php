<?php
// check there is no records or not
if ($data['empty'] == 1) {
    $flag = true;
    // set the count to the chart
    $count1 = $data['count1'];
    $count2 = $data['count2'];
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
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Pumper/working.css" text="text/css">
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
            <li>
                <a href="<?php echo ROOT ?>/Admin/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo ROOT ?>/Admin/Complain">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Response Complaint</span>
                </a>
            </li>



        </ul>
        <ul class="side-menu">

            <li>
                <a href="<?php echo ROOT ?>/Home/Login" class="logout">
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


            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/th.jpg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <h2>View & Response Complain</h2>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                    </div>
                    <div class="attendance-list">
                        <div class="bar">
                            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search by Date" class="search">

                            <!-- view the previous complain and responses -->
                            <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                                <thead>
                                    <tr>
                                        <th>Complain ID</th>
                                        <th>User ID</th>
                                        <th>Date & Time</th>
                                        <th>Complain</th>
                                        <th>Status</th>
                                        <th>Response</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($flag == true) {

                                        if (mysqli_num_rows($data['result']) > 0) {
                                            while ($row = mysqli_fetch_assoc($data['result'])) {
                                                $id = $row['com_id'];
                                                echo "<tr>
                                    <td><br>COM " . $row['com_id'] . "</td>
                                    <td>" . $row['user_id'] . "</td>
                                    <td>" . $row['date_time'] . "</td>" ?>
                                                <?php
                                                // set the data to php varriable
                                                $complain = $row['complain'];
                                                $status = $row['status'];
                                                ?>
                                                <!-- that data show in a the textarea -->
                                                <td><textarea id="subject1" name="subject" placeholder="<?php echo $complain ?>" style="height:60px" readonly></textarea></td>
                                                <td><?php echo $status ?></td>
                                                <!-- pass the complain id to the controller -->
                                                <form action="<?php echo ROOT ?>/Admin/Complain/load" method="POST">
                                                    <input type="hidden" class="box" name="id" value="<?php echo $id ?>">
                                                    <td><button type="submit" name="submit" class="btn1">Reply</button></td>
                                                </form><?php


                                                        "</tr>";
                                                    }
                                                }
                                            } else {
                                                echo $data['error'];
                                            }
                                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-data">
                <div class="order">

                    <div class="head">
                        <h3>Already Responsed Complains</h3>
                    </div>
                    <div class="row1">
                        <div class="CENTER1"><br>
                            <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                                <thead>
                                    <tr>
                                        <th>Complain ID</th>
                                        <th>User ID</th>
                                        <th>Response</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if ($flag == true) {

                                        if (mysqli_num_rows($data['result1']) > 0) {
                                            while ($row = mysqli_fetch_assoc($data['result1'])) {
                                                $id = $row['com_id'];
                                                echo "<tr>
                                                <td>COM " . $row['com_id'] . "</td>
                                                <td>" . $row['user_id'] . "</td>" ?>

                                                <form action="<?php echo ROOT ?>/Admin/Complain/reply" method="POST">
                                                    <input type="hidden" class="box" name="id" value="<?php echo $id ?>">
                                                    <td><button type="submit" name="submit" class="btn1">View</button></td>
                                                </form>

                                    <?php
                                                "</tr>";
                                            }
                                        }
                                    } else {
                                        echo $data['error'];
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br><br><br>
                        </div>
                    </div>




                </div>
                <div class="todo">
                    <h2>Total Count Of Pending & Replied Complain</h2><br><br>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                    <canvas id="myChart1" style="width:100%;max-width:500px"></canvas>

                    <script>
                        // convert the data into js
                        var x1 = "<?php echo "$count1"; ?>";
                        var x2 = "<?php echo "$count2"; ?>";




                        var xValues = ["Replied", "Pending"];
                        var yValues = [x1, x2];
                        var barColors = ["#001a80", "#b3c2ff"];



                        var chart1 = new Chart("myChart1", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: ""
                                }
                            }
                        });
                    </script>
                    <script>
                        // execute the chart
                        initCharts();
                    </script>

                </div>

            </div>
            <div class="form-inner">
                <div id="myForm" class="form-popup">
                    <form action="" method="post">
                        <label class="FROM">From :</label>
                        <div class="field">
                            <input type="date" name="from" required>
                        </div>
                        <label class="TO">To :</label>
                        <div class="field"><input type="date" name="to" required /></div><br><br>
                        <button type="submit" name="submit" class="btn">Click Here</button>
                    </form>
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


        function openForm() {
            document.getElementById("myForm").classList.add("animate");
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").classList.remove("animate");
            document.getElementById("myForm").style.display = "none";
        }

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