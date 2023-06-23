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
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Pumper/complain.css" text="text/css">
    
   

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
                <a href="<?php echo ROOT ?>/Pumper/User">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
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

            <li class="active">
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
        <!-- NAVBAR -->
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
            <div class="head-title">
  
            </div>

            

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Add Complaint</h3>
                     
                    </div>
                    <div class="container3">
                        
                    <form action="<?php echo ROOT ?>/Pumper/Complain/load" method="post">

                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                       
                        
                        <label for="lname">Required Email:</label>
                        <input type="text" id="lname" name="email" placeholder="Your email address.."required>

                       




                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>
                        <button type="submit" name="submit" class="btn">Submit</button>

                    </form>
                    </div>
                    
                    
                </div>
               
            </div>
                



                








<div class="table-data">
               
                <div class="order">
                    <h3>Previous Complain</h3>
                   
                    <div class="attendance-list">
                    <div class="bar"> 
                        <input type="text1" id="myInput" onkeyup='tableSearch()' placeholder="Search" class="search">
                    
               
                <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                        <thead>
                            <tr>
                               
                <th scope>Complain ID</th>
                <th scope>Complained Date</th>
                <th scope>Status</th>
                <th scope>Response Date</th>
                <th scope>Complain</th>
                <th scope>Response</th>
                <th scope></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($flag==true){
                            if (mysqli_num_rows($data['result'])> 0) {
                                while($row = mysqli_fetch_assoc($data['result'])) {
                            
                            echo"<tr>
                              
                                <td><br><br>com ".$row['com_id']."</td>
                                <td>".$row['date_time']."</td>
                                <td>".$row['status']."</td>
                                <td>".$row['response_date']."</td>"?>
                                <?php
                                $response=$row['response'];
                                $subject=$row['complain'];
                                ?>
                                
                                <td><textarea id="subject" name="subject" placeholder="<?php echo $subject?>" style="height:80px" readonly ></textarea></td>
                                <td><textarea class="subject1" name="subject" placeholder="<?php echo $response?>" style="height:80px" readonly ></textarea></td>
                            <?php
                                "</tr>";
                                }
                            }
                        }
                        else{
                            echo "No Records";
                        }
                            
                        ?>
                            
                        </tbody>
                    </table>
                </div>
                    </div>
                </div>
</div>



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