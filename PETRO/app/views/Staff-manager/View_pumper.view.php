<?php
//shows only if there are record
    $flag='';
    if(empty($data['no record'])){
        $flag=true;

    }
    else{
        $flag=false;
    }
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PETRO</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Staff-manager/view_pumper.css"/>
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
            <li class="active">
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
            <li>
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
                    <h1>View Pumpers</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/Home">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="<?php echo ROOT ?>/Staff-manager/view_pumper">View Pumpers</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">

                <!-- filtering -->
                <div class="order">
        
                    <h3> Filter  :</h3>
                    <div class= "filter">
                        <Select name= "filter" id="pumpfilter">
                            <option vlaue="All Pumper">All Pumper</option>
                            <option vlaue="Active">Active Pumper</option>
                            <option vlaue="Remove">Suspend Pumper</option>
                        </Select>
                    </div>
                </div>

                <!-- <div class="todo">
                    <div class="head">
                        <h3>Todos</h3>
                    </div>
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search" class="search"><span class="txt1">

                </div> -->
            </div>


            <!-- <h3>Filter :</h3>
            <div class= "filter">
                <Select name= "filter" id="pumpfilter">
                    <option vlaue="All Pumper">All Pumper</option>
                    <option vlaue="Active">Active Pumper</option>
                    <option vlaue="Remove">Suspend Pumper</option>
                </Select>
            </div> -->

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


            <!-- All pumper details -->
            <div class="table-data">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th> Pumper ID </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Phone Number </th>
                            <th> Email </th>
                            <th> Shift Time </th>
                            <th style="display : none;"> Status</th>
                            <th> View </th>
                            <th> Suspend/Active </th>
                        </tr>
                    </thead>
                        <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($data['result'])){
                                
                        ?>
                            <td> <?php echo $row['id'];?> </td>
                            <td> <?php echo $row['fname'];?> </td>
                            <td> <?php echo $row["lname"];?> </td>
                            <td> <?php echo $row["phone"];?> </td>
                            <td> <?php echo $row["email"];?> </td>
                            <td> <?php echo $row["shift"];?> </td>

                            <td style="display : none;"><?php echo $row["status"]==0 ?'Suspend Pumper' : 'Active Pumper' ?>
                            <td> <button value="<?php echo $row['id'];?>" onclick="window.location.href= '<?php echo ROOT ?>/Staff-manager/View_pumper_Profile?pump_id=<?php echo $row['id'];?>';">View</button> </td>
                            
                            <?php
                                if($row["status"] == 0){
                            ?>
                                    <td> <div class = "add"><button value="<?php echo $row['email'];?>" onclick="window.location.href= '<?php echo ROOT ?>/Staff-manager/View_pumper/add_pumper?pump_email=<?php echo $row['email'];?>';">Activate</button></div></td>
                            <?php    
                                }else{
                            ?>
                                    <td>  <div class = "delete"><button value="<?php echo $row['email'];?>" onclick="window.location.href= '<?php echo ROOT ?>/Staff-manager/View_pumper/remove_pumper?pump_email=<?php echo $row['email'];?>';">Suspend</button></div></td>
                            <?php    
                                }
                            ?>
                        </tr>
                        <?php
                            }
                        ?>
                </table>
            </div>
            
            <br><br>

            <!-- Completed order by pumper -->
            <div class="head-title">
                <div class="left">
                    <h1>Pumping History</h1>
                </div>
            </div>

            <!-- Searching -->
            <div class="table-data">
                <div class="order">
                    <h3>Search : </h3>
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search" class="search"><span class="txt1"> 
                </div>
            </div>
            
            <div class="table-data">
            <div class="attendance-list">
                <div class="bar"> 
                <table class="table" id="pumpingtable" data-filter-control="true" data-show-search-clear-button="true">
                    <thead>
                        <tr>
                            <th> Order ID </th>
                            <th> Pumper ID </th>
                            <th> Fuel Machine ID </th>
                            <th> Fuel Type </th>
                            <th> Vehical Number </th>
                            <th> Pumped Liter </th>
                        </tr>
                    </thead>
                        <tr class="pumpingtr">
                        <?php
                            while($row = mysqli_fetch_assoc($data['pumperResult'])){
                                
                        ?>
                            <td class="pumpingtd"> <?php echo $row['order_id'];?> </td>
                            <td class="pumpingtd"> <?php echo $row['pumper_id'];?> </td>
                            <td class="pumpingtd" > <?php echo $row["MachineID"];?> </td>
                            <td class="pumpingtd"> <?php echo $row["Fuel_Type"];?> </td>
                            <td class="pumpingtd"> <?php echo $row["vehicle_no"];?> </td>
                            <td class="pumpingtd"> <?php echo $row["pumped_liters"];?> </td>
                            
                        </tr>
                        <?php
                            }
                        ?>
                </table>
                </div>
            </div>
            </div>

            


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="<?php echo ROOT ?>/JS/Staff-manager/script.js"></script>

    <script>
        //get action of the filter drop down
        let selectMenu = document.getElementById("pumpfilter");
        //take recode of the output table
        let table = document.getElementById("table");

        //do this when changes happen on filter drop down
        selectMenu.addEventListener('change',()=>{
            const searchTerm = selectMenu.value.toLowerCase();
            console.log(searchTerm);
            console.log("hi");
            //when select All Pumper show all records
            if(searchTerm == "all pumper"){
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



        function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();     //Searching string in uppercase
            table = document.getElementById("pumpingtable");
            tr = table.getElementsByTagName("tr"); // get element in tr tag

            for (let i = 0; i < tr.length; i++) {
                //get all td sql line first 2 column row by row
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                td4 = tr[i].getElementsByTagName("td")[4];
                
                if (td||td1||td2||td3||td4) {
                    //get all td sql data
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;

                    //compare serching text and table data of first 5 column
                    //indexOf(filter) > searches the string and returns the index of the first occurrence
                    //if found string then display the row in table
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }else if (txtValue1 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue2 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }else if (txtValue3 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }else if (txtValue4 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }

        

    </script>

    <script>
        // JS for profile icon drop down
        let submenu = document.getElementById("submenu");

        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>