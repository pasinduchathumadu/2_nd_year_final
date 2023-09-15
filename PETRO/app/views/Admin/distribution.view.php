<?php
if (empty($data['error'])) {
    $data['error'] = null;
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
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Admin/report.css" text="text/css">



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
                <h2>Distribution Manager - Registration</h2>
            </div>
            <div class="table-data">
                <div class="order">

                    <div class="wrapper">
                        <div class="form-container">
<!-- fuel manager registration form -->
                            <div class="form-inner">
                                <img src="<?php echo ROOT ?>/image/Manager/businessman.png" alt="" style="width:150px;height:300px;">
                                <form action="<?php echo ROOT ?>/Admin/Distribution/register" method="POST">
                                    <div class="field">
                                        <input type="email" class="box" name="distribution_manager_email" placeholder="Email" required>
                                    </div>
                                    <div class="field">
                                        <input type="text" class="box1" name="First_name" placeholder="First Name" required>
                                    </div>
                                    <div class="field">
                                        <input type="text" class="box1" name="Last_name" placeholder="Last Name" required>
                                    </div>
                                    <div class="field">
                                        <input type="text" class="box" name="distribution_manager_NIC" placeholder="NIC" required>
                                    </div>
                                    <div class="field">
                                        <input type="text" class="box" name="phone" placeholder="Phone-Number" required>
                                    </div>

                                    <div class="field">
                                        <input type="password" class="box" id="t1" name="password" placeholder="Password" required>
                                    </div>
                                    <br>
                                    <button type="submit" name="OK" id="ok" class="btn">Create Account</button><br><br>
                                </form>
                                <!-- if there is error -->
                                <label class="error"><?php echo $data['error'] ?></label>
                            </div>
                        </div>
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