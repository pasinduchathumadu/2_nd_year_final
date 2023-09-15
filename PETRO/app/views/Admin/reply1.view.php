
<!-- this is the showing file of the complain  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Pumper/complain.css" text="text/css">
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
        <!-- MAIN -->
        <main>
            <div class="head-title">

            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Response Area Of Complain</h3>

                    </div>
                    <div class="container3">

                        <form action="<?php echo ROOT ?>/Admin/Complain" method="">

                            <label for="fname">Complain ID</label>
                            <input type="text" id="fname" name="complain_ID" value="<?php echo $data['id'] ?>" placeholder="<?php echo $data['id'] ?>" readonly>


                            <label for="lname">User ID:</label>
                            <input type="text" id="lname" name="email" placeholder="<?php echo $data['user'] ?>" readonly>

                            <label for="lname">Complain:</label>
                            <input type="text" id="lname" name="email" placeholder="<?php echo $data['complain'] ?>" readonly>

                            <label for="lname">Response:</label>
                            <textarea id="subject" name="subject" placeholder="<?php echo $data['response'] ?>" style="height:200px" readonly></textarea>

                            <button type="submit" name="submit" class="btn">Back</button>

                        </form>
                    </div>


                </div>

            </div>
</body>

</html>