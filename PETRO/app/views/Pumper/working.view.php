<?php
    $flag='';
    if(empty($data['error'])){
        $flag=true;

    }
    else{
        $flag=false;
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
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Pumper/working.css" text="text/css">
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Common/common.css" text="text/css">
    
   

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
            <li class="">
                <a href="<?php echo ROOT ?>/Pumper/User">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo ROOT ?>/Pumper/Working">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Working Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working_hours">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Working Hours</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Pumper/Analysis">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Working_salary">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Salary Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Pumper/Change_password">
                    <i class='bx bxs-group'></i>
                    <span class="text">Change Password</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Pumper/Complain">
                    <i class='bx bxs-group'></i>
                    <span class="text">Complain Box</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?php echo ROOT?>/Pumper/Logout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
    
        <nav>
            <i class='bx bx-menu'></i>
           
            <form action="#">
                <div class="form-input">


                    <button type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <?php echo $_SESSION['first_name']?>
      
            <a href="#" class="profile">
                <img src="<?php echo ROOT ?>/image/th.jpg">
            </a>
        </nav>

        <!-- MAIN -->
    <main>
           

    <div class="table-data" id="table-data" >
        <div class="order">
            <div class="head">
                <h3>Fuel Pump History - <?php echo $data['date']?></h3><h3><span class="txt">
                Pumper ID - <?php echo $data['ID']?></span></h3>
            </div>
            <div class="attendance-list">
                <div class="bar"> 
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search" class="search"><span class="txt1">
                    <button  class="btn" onclick="openForm()">Filter</button></span>
            
        
                    <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                        <thead>
                            <tr>
                                <th> <button onclick="sortTable(0)">Order ID</button></th>
                                <th><button onclick="sortTable(1)">Date & Time</button></th>
                                <th>Vehicle_No</th>
                                <th>Fuel Type</th>
                                <th>Pump Machine</th>
                                <th>No of Liters</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($flag==true){
                                    
                                    if (mysqli_num_rows($data['result']) > 0) {
                                    while($row = mysqli_fetch_assoc($data['result'])) {
                                    echo 
                                    "<tr>
                                        <td>".$row['order_id']."</td>
                                        <td>".$row['time']."</td>
                                        <td>".$row['vehicle_no']."</td>
                                        <td>".$row['Fuel_Type']."</td>
                                        <td>Machine ".$row['MachineID']."</td>
                                        <td>".$row['pumped_liters']."</td>
                                        <td>".$row['pay']."</td>
                        
                                    </tr>";
                                    }
                                }
                            }
                            else{
                                echo $data['error'];
                            }
                            ?>
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
                
                   
                   
    <div class= "form-inner">
        <div id="myForm" class="form-popup">
        
            <form action="<?php echo ROOT?>/Pumper/Working/previous" method="post">
                <a href="<?php echo ROOT?>/Pumper/Working" id="close-popup"><i class='bx bx-x'></i><a>
                    <label class="FROM">From :</label>  
                    <div class= "field">
                        <input type="date" name="from" required/>
                    </div><br>
                    <label class="TO">To :</label>  
                    <div class="field">
                         <input type="date" name="to" required/> 
                    </div><br><br>
                    <button type="submit" name="submit" class="btn">Click Here</button>
            </form> 
        </div>
    </div>
    <div class="overlay"></div>
    


    </main>
        
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


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
                
                if (td||td1||td2||td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;


                    if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else if (txtValue .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue2 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }else if (txtValue3 .toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
  
        
        const overlay = document.querySelector(".overlay");
    
        function openForm() {

        document.getElementById("myForm").style.display = "block";
        overlay.classList.add("overlayStyle");
        }
    
        function closeForm() {
       
        document.getElementById("myForm").style.display = "none";
        overlay.classList.remove("overlayStyle");
        }
       
       


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







        const searchButton = document.querySelector('#content nav form .form-input button');
        const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
        const searchForm = document.querySelector('#content nav form');

        searchButton.addEventListener('click', function (e) {
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


        window.addEventListener('resize', function () {
            if (this.innerWidth > 576) {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        })



        const switchMode = document.getElementById('switch-mode');

        switchMode.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        })
    </script>
</body>

</html>