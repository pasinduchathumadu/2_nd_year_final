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
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Customer/home2.css" text="text/css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Customer/pumphistory.css" text="text/css">



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
            <li>
                <a href=Max>
                    <i class='bx bxs-gas-pump'></i>
                    <span class="text">Maximum Fuel</span>
                </a>
            </li>
            <li class="">
                <a href="Product">
                    <i class='bx bxs-group'></i>
                    <span class="text">Add Products</span>
                </a>
            </li>

            <li class="active">
                <a href="Product">
                    <i class='bx bxs-group'></i>
                    <span class="text">Complete Orders</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <ul class="side-menu">
                <li>
                    <a href="Product">
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
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">

                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>

            <a href="#" class="profile">
                
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>








            <div class="container">

                <div class="shopping-cart">



                    <table>
                        <thead>
                            <th>Customer ID</th>
                            <th>PIDS</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th></th>


                        </thead>
                        <tbody>

                            <?php
                            if (mysqli_num_rows($data['result1']) > 0) {
                                while ($row = mysqli_fetch_assoc($data['result1'])) {
                            ?>
                                    <form action="<?php echo ROOT ?>/Manager/Mainorder/add" method="post">
                                        <tr>


                                            <td><input class="box6" type="text" value="<?php echo $row['user_id']; ?>" name="user_id"></td>

                                            <td><input type="text" value="<?php echo $row['pids']; ?>" name="pids" class="box6"></td>
                                            <td><p><?php echo $row['address']; ?></p></td>
                                            <input type="hidden" value="<?php echo $row['address']; ?>" name="address" class="box6">
                                            <td><input type="text" value="<?php echo $row['phone']; ?>" name="phone" class="box6"></td>
                                            <td><input type="text" value="Rs.<?php echo $row['total']; ?>" name="total" class="box6"></td>
                                            <td><input type="text" value="<?php echo $row['pmethod']; ?>" name="pmethod" class="box6"></td>



                                            <td>


                                                <input class="box6" type="hidden" value="<?php echo $row['Oid']; ?>" name="oid">


                                                <input type="hidden" value="<?php echo  $row['Oid'] ?>" name="delete" readonly>
                                                <button type="submit" class="cbtn">Complete</a>
                                            </td>

                                    </form>

                            
                                    
                                    </tr>
                            <?php

                                }
                            } else {
                                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>









            <br><br><br>









            <div class="container">

                <div class="shopping-cart">



                    <table>
                        <thead>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Product No</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Ordered Date</th>


                        </thead>
                        <tbody>

                            <?php
                            if (mysqli_num_rows($data['result2']) > 0) {
                                while ($row = mysqli_fetch_assoc($data['result2'])) {
                            ?>
                                    <form action="<?php echo ROOT ?>/Admin/Mainorder/add2" method="post">
                                        <tr>


                                            <td><input class="box6" type="text" value="<?php echo $row['Oid']; ?>" name="oid"></td>

                                            <td><input type="text" value="<?php echo $row['user_id']; ?>" name="user_id" class="box6"></td>
                                            <td><input type="text" value="<?php echo $row['p_id']; ?>" name="price" class="box6"></td>
                                            <td><input type="text" value="<?php echo $row['name']; ?>" name="price" class="box6"></td>
                                            <td><input type="text" value="Rs.<?php echo $row['price']; ?>" name="price" class="box6"></td>
                                            <td><input type="text" value="<?php echo $row['quantity']; ?>" name="price" class="box6"></td>
                                            <td><input type="text" value="<?php echo $row['odt']; ?>" name="price" class="box6"></td>




                                    </form>
                                    </tr>
                            <?php

                                }
                            } else {
                                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>






















            <br><br><br>









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