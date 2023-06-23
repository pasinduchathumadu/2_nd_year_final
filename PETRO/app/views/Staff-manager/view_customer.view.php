
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PETRO</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/view_customer.css" />
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/style.css" text="text/css" />
    
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    

    <!-- SIDE BAR -->

    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-gas-pump'></i>
            <span class="text">PETRO</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Assign_pumpper">
                    <i class='bx bxs-pointer'></i>
                    <span class="text">Assign Pumper</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Complain">
                    <i class='bx bxs-comment-dots' ></i>
                    <span class="text">View & Responds to complaint</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/view_pumper">
                    <i class='bx bx-male'></i>
                    <span class="text">View Pumpers</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Pumper_registration">
                <i class='bx bxs-book-bookmark' ></i>
                    <span class="text">Pumper Registration</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo ROOT ?>/Staff-manager/view_customer">
                    <i class='bx bxs-group'></i>
                    <span class="text">View Customer</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Salary_Rate">
                    <i class='bx bx-line-chart'></i>
                    <span class="text">Salary Percentage </span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Feedback">
                    <i class='bx bxs-message-rounded-check'></i>
                    <span class="text">User Feedback</span>
                </a>
            </li>
            <li>
                <a href="">
                    <!-- <i class='bx bxs-group'></i>
                    <span class="text">Salary Percentage </span> -->
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Home">
                    <i class='bx bxs-left-arrow-circle'></i>
                    <span class="text">Back</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Staff-manager/Logout" class="logout">
                    <i class='bx bxs-log-out' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <!-- SIDE BAR -->



    <!-- CONTENT -->
    <section id="content">
       <!-- Top NAV BAR -->
       <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link"></a>
            <form action="#">
                <div class="form-input">
                    
                </div>
            </form>
            
            
            <!-- Display logged user's name  -->
            <h3><?php echo $_SESSION['manager_name']," ",$_SESSION['manager_name_Last']?></h3>
            
            <!-- profile pic -->
            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/proIcon.png" onclick="toggleMenu()">
            </a>

            <!-- profile Drop down menu -->
            <div class="sub-menu-wrap" id="submenu">
                <div class= "sub-menu">
                    <a href="<?php echo ROOT ?>/Staff-manager/Profile" class="sub-menu-link">
                        <img src="<?php echo ROOT ?>/image/profile_dropdown/profile.png">
                        <p>Profile</p>
                        <span>></span>
                    </a>
                    <a href="<?php echo ROOT ?>/Staff-manager/Logout" class="sub-menu-link">
                        <img src="<?php echo ROOT ?>/image/profile_dropdown/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Top NAV BAR -->

        <!-- MAIN -->
        <main>
            
            <div class="head-title">
                <div class="left">
                    <h1>View Customer</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/view_customer">View Customer</a>
                        </li>
                    </ul>
                </div>
            
            </div>

            <div class="table-data">
                <div class="order">
                        <h3>Filter :</h3>
                    <div class= "filter">
                        <Select name= "filter" id="filter">
                            <option vlaue="All Customers">All Customers</option>
                            <option vlaue="Active">Active Customers</option>
                            <option vlaue="Remove">Suspend Customers</option>

                        </Select>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- print error massage -->
            <?php
                if(isset($data['error'])){  ?>
                    <span class="errorMsg">  <?php echo $data['error']?></span>
             <?php
             };
                if(isset($data['success'])){ ?>
                    <span class="successMsg"> <?php echo $data['success']?></span>
            <?php    
            };
            ?>

            <div class="table-data">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th> Customer ID </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Phone Number </th>
                            <th> NIC </th>
                            <th style="display : none;"> Status</th>
                            <th> View </th>
                            <th> Suspend/Active </th>
                        </tr>
                    </thead>
                    <tbody id="ans">
                        <tr>
                        <?php
                            
                            while($row = mysqli_fetch_assoc($data['result'])){
                                
                        ?>
                            <td> <?php echo $row['id'];?> </td>
                            <td> <?php echo $row['fname'];?> </td>
                            <td> <?php echo $row["lname"];?> </td>
                            <td> <?php echo $row["phone"];?> </td>
                            <td> <?php echo $row["NIC"];?> </td>
                            <td style="display : none;"><?php echo $row["status"]==1 ?'Active Customers' : 'Suspend Customers' ?>
                            <td> <button value="<?php echo $row['id'];?>" onclick="window.location.href= '<?php echo ROOT ?>/Staff-manager/View_customer_Profile?cus_id=<?php echo $row['id'];?>';">View</button> </td>
                            <?php
                                if($row["status"] == 0){
                            ?>
                                    <td> <div class = "add"><button value="<?php echo $row['email'];?>" onclick="window.location.href= '<?php echo ROOT ?>/Staff-manager/View_customer/add_customers?cus_email=<?php echo $row['email'];?>';">Activate</button></div></td>
                            <?php    
                                }else{
                            ?>
                                    <td> <div class = "delete"><button value="<?php echo $row['email'];?>" onclick="window.location.href= '<?php echo ROOT ?>/Staff-manager/View_customer/remove_customers?cus_email=<?php echo $row['email'];?>';">Suspend</button></div></td>
                            <?php    
                                }
                            ?>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="<?php echo ROOT ?>/CSS/Staff-manager/script.js"></script>
    
    <script>
        //get action of the filter drop down
        let selectMenu = document.querySelector("#filter");
        //take recode of the output table
        let table = document.querySelector("#table");

        //do this when changes happen on filter drop down
        selectMenu.addEventListener('change',()=>{
        const searchTerm = selectMenu.value.toLowerCase();

        console.log(searchTerm);
        
        //when select All Customer show all records
        if(searchTerm == "all customers"){
            
            for (let i = 1; i < table.rows.length; i++) {
                const row = table.rows[i];
                row.style.display = '';
            }
        }else{
            //travel row by row
            for (let i = 1; i < table.rows.length; i++) {
                const row = table.rows[i];
                const cells = row.cells;
                let matchesSearch = false;
                
                //travel sell by sell in a row
                for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];
                    
                    //find the selected option is in the cells
                    if (cell.textContent.toLowerCase().includes(searchTerm)) {
                        matchesSearch = true;
                        break;
                    }
                }
                //founded rows print and other rows doesnt show
                if (matchesSearch) {
                row.style.display = '';
                } else {
                row.style.display = 'none';
                }
            }
        }
    
        
        });

        // JS for profile icon drop down
        let submenu = document.getElementById("submenu");

        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }

    </script>
</body>
</html>