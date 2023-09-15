<?php
$pending = $data['pending'];
$replied = $data['replied'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Pumper/main5.css" text="text/css">
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
                <a href="<?php echo ROOT ?>/Admin/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo ROOT ?>/Admin/Distribution">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Add Distribution Manager</span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo ROOT ?>/Admin/Customer_manager">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Add staff Manager</span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo ROOT ?>/Admin/Complain">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Complaints</span>
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
            <ul class="box">
<!-- all users showing as count  -->
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h4>Customers</h4>
                        <p><?php echo $data['count1'] ?> USERS</p>
                    </span>

                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h4>Pumpers</h4>
                        <p><?php echo $data['count2'] ?> USERS</p>
                    </span>

                </li>

                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h4>Customer Managers</h4>
                        <p><?php echo $data['count3'] ?> USERS</p>
                    </span>

                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h4>Distribution Managers</h4>
                        <p><?php echo $data['count4'] ?> USERS</p>
                    </span>

                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>View Managers</h3>
                    </div>

                    <div class="box">
                        <div class="column">
                            <div class="card">
                                <img class="imgg" src="<?php echo ROOT ?>/image/m113.jpeg" alt="" width="300px" ; height="200px" ;>
                                <br><br>
                                <h3><a href="<?php echo ROOT ?>/Admin/View_dis">Fuel Distribution Manager</a></h3>


                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <img class="imgg" src="<?php echo ROOT ?>/image/m112.jpeg" alt="" width="200px" ; height="200px" ;> <br><br>
                                <h3><a href="<?php echo ROOT ?>/Admin/View_cus">Customer & Staff Manager</a></h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="todo">
                    <!-- view the pending & replied complaints as count wise -->
                    <div class="head">
                        <h3>Complaints Summary</h3>

                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                    <canvas id="myChart1" style="width:100%;max-width:500px"></canvas>

                    <script>
                        // convet php to js
                        var x1 = "<?php echo "$replied"; ?>";
                        var x2 = "<?php echo "$pending"; ?>";
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
                        initCharts();
                    </script>

                </div>
            </div>
            <ul class="box">
                <li>
                    <!-- show details of the fuel shed -->
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h4>Octane 92</h4>
                        <p><?php echo $data['eligible_amount'] ?>L</p>
                        <p>RS.<?php echo $data['price'] ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h4>Octane 95</h4>
                        <p><?php echo $data['eligible_amount2'] ?>L</p>
                        <p>RS.<?php echo $data['price2'] ?></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h4>Auto Diesel</h4>
                        <p><?php echo $data['eligible_amount3'] ?>L</p>
                        <p>RS.<?php echo $data['price3'] ?></p>
                    </span>
                </li>

                <li>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">
                        <h4>Super Diesel</h4>
                        <p><?php echo $data['eligible_amount4'] ?>L</p>
                        <p>RS.<?php echo $data['price4'] ?></p>
                    </span>
                </li>
            </ul><br><br>
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