<?php
$flag = '';
if (empty($data['error'])) {
    $flag = true;
} else {
    $flag = false;
}
?>


<?php
$flag2 = '';
if (empty($data['error'])) {
    $flag2 = true;
} else {
    $flag2 = false;
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
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Customer/pumphistory.css" text="text/css">

    <title>petro</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-gas-pump'></i>
            <span class="text">PETRO</span>
        </a>
        <ul class="side-menu top">
            <li class="">
                <a href="<?php echo ROOT ?>/Customer/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo ROOT ?>/Customer/Store">
                    <i class='bx bx-store'></i>
                    <span class="text">Store</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Pendingstore">
                    <i class='bx bxs-stopwatch'></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Pumphistory">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Pumping History</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Analyze">
                    <i class='bx bxs-bar-chart-alt-2'></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo ROOT ?>/Customer/Storehistory">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Store History</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Complaint">
                    <i class='bx bxs-envelope'></i>
                    <span class="text">Complaints</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Feedback">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Aboutus">
                    <i class='bx bxs-business'></i>
                    <span class="text">About Us</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Customer/Profile">
                    <i class='bx bxs-user'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
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

                    <button type="submit" class="search-btn"></button>
                </div>
            </form>

            <p>
                <?php echo $data['fname'] ?>
            </p>

            <a href="<?php echo ROOT ?>/Customer/Profile" class="profile">

                <img src="<?php echo ROOT ?>/image/bp.jpg" style="width:35px;height:35px; border-radius: 50%"></a>

            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">

            </div>


            <h1> Store History </h1><br>

            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search"><br><br>


            <div class="table">
                <table class="table1" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>

                            <th scope="col">Ordered Date</th>



                        </tr>
                    </thead>
                    <tbody>



                        <?php








                        if ($flag == true) {
                            if (mysqli_num_rows($data['result']) > 0) {
                                while ($row = mysqli_fetch_assoc($data['result'])) {


                                    echo "<tr>
			<td>" . $row['Oid'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['quantity'] . "</td>
            <td>" . $row['price'] . "</td>
            <td>" . $row['odt'] . "</td>
      
			</tr>";



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









            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search"><br><br>



            <div class="table">
                <table class="table1" id="myTable2">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact No</th>
                            <th scope="col">Total Price</th>

                            <th scope="col">Payment Method</th>



                        </tr>
                    </thead>
                    <tbody>



                        <?php








                        if ($flag2 == true) {
                            if (mysqli_num_rows($data['result2']) > 0) {
                                while ($row = mysqli_fetch_assoc($data['result2'])) {


                                    echo "<tr>
			<td>" . $row['pids'] . "</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['total'] . "</td>
            <td>" . $row['pmethod'] . "</td>
      
			</tr>";



                                }
                            }
                        } else {
                            echo $data['error'];
                        }


                        ?>












                    </tbody>
                </table>
                <br><br><br><br><br><br><br><br><br>
            </div>






        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>



        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

        allSideMenu.forEach(item => {
            const li = item.parentElement;

            item.addEventListener('click', function () {
                allSideMenu.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });




        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function () {
            sidebar.classList.toggle('hide');
        })










    </script>



    <script>

        function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];

                if (td || td1 || td2 || td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;


                    if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue3.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    </script>




    <script>

        function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];

                if (td || td1 || td2 || td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;


                    if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue3.toUpperCase().indexOf(filter) > -1) {
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