<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Pumper/order.css" text="text/css">
    
   

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
                        <h3>Order Details - Non Orderd Customer</h3>
                     
                    </div>
                    <table>
                        <tbody>
                        <div class="container2">

                    <ul class="responsive-table">

                    <form action="<?php echo ROOT?>/Pumper/User/Non_complete" method="post">

                    <li class="table-row">
                        <div class="col col-1">Registerd Phone Number:</div>
                    
                        <div class="col col-4" ><label name="no" class="col col-4" ><?php echo $data['no'] ?></label></div>
                        <input type="hidden" name="no" value="<?php echo $data['no']?>">
                    </li>
                    <li class="table-row">
                        <div class="col col-1" >Customer Name:</div>
                    
                        <div class="col col-4" ><label name="full" class="col col-4" ><?php echo $data['full'] ?></label></div>
                        <input type="hidden" name="full" value="<?php echo $data['full']?>">
                    </li>
                    <li class="table-row">
                        <div class="col col-1">Email:</div>

                        <div class="col col-4" ><label name="email" class="col col-4" ><?php echo $data['email'] ?></label></div>
                        <input type="hidden" name="email" value="<?php echo $data['email']?>">
                    </li>
                    
                    <li class="table-row">
                        <div class="col col-1">Select Vehicle</div>
                        <div class="col col-4">
                    
                         <select name="vehicle"class="left-right">
                            <option value="<?php echo $data['v']?>"><?php echo $data['v']?></option>
                            <option value="<?php echo $data['v1']?>"><?php echo $data['v1']?></option>
                            <option value="<?php echo $data['v2']?>"><?php echo $data['v2']?></option>
                           </select>
                        </div>
                    </li>
                    <li class="table-row">
                        <div class="col col-1">Select Fuel Type</div>
                        <div class="col col-4">
                    
                         <select id="Fuel_Type" name="Fuel_Type"class="left-right">
                            <option value="octane 92">octane 92</option>
                            <option value="octane 95">octane 95</option>
                            <option value="auto diesel">auto diesel</option>
                            <option value="super diesel">super diesel</option>
                           </select>
                        </div>
                    </li>
                    <?php 
                        if($data['remark']==0){?>
                    <li class="table-row">
                       
                        <div class="col col-1">Enter Pump Liters:</div>
                        <div class="col col-4">
                            <input type="text" class="left-right" name="liters" required>
                            <?php 
                            if($data['remark']==0){?>
                                <button type="submit" class="btn1">Proceed</button><?php
                            }?>
                        </div>
                          </li><?php
                        }?>
                                
                    
                  
                    </form>
                    <?php 
                        if($data['remark']==1){?>
                    <li class="table-row">
                       
                        <div class="col col-1">Price:</div>
                        <div class="col col-4"><label name="email" class="col col-4" ><?php echo $data['price'] ?></label>
                           
                            <?php 
                            if($data['remark']==1){?>
                                <button type="submit" onclick = "openForm()" class="btn1">Complete</button><?php
                            }?>
                                
                        </div>
                          </li><?php
                        }?>
                    
                  
                   
                    
                    </ul>
                    </div>
                            
                                    
  



                        </tbody>
                    </table>
                </div>
                
            </div>

<br><br>

<div class="form-popup" id="myForm">
    <form action="<?php echo ROOT?>/Pumper/User">
        <h2>Your Order has been Successfully Completed!!!</h2>
        
        <br>
    <button type="submit">Next Order</button>
    </form>
</div>
<div class="overlay"></div>


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
const overlay = document.querySelector(".overlay");
    
function openForm() {
  document.getElementById("myForm").style.display = "block";
  overlay.classList.add("overlayStyle");
}

// Close the popup form
function closeForm() {

  document.getElementById("myForm").style.display = "none";
  overlay.classList.remove("overlayStyle");
}


// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})


function validateForm() {
        var x = document.forms["myForm"]["pumped"].value;
            if (x == "" || x == null) {
                alert("Amount of the pumped liters must be filled out");
                return false;
            }
            else{
                return true;
            }
        }




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