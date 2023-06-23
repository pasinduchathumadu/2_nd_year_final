<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Update Fuel Availability</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Manager/update_fuel.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav>
            <ul>
            <li><a href="<?php echo ROOT ?>/Manager/Home" class="logo">
                        <img src="<?php echo ROOT ?>/image/Manager/home-button.png">
                        <span class="nav-item"></span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/Update">
                        <i class="fas fa-gas-pump"></i>
                        <span class="nav-item">Update Fuel</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/View_history">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-item">Analize</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/Add_report">
                        <i class="fas fa-notes-medical"></i>
                        <span class="nav-item">Daily Report</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/Report_history">
                        <i class="fas fa-history"></i>
                        <span class="nav-item">Report History</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/View_order">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="nav-item">View Orders</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/View_pumper">
                        <i class="fas fa-male"></i>
                        <span class="nav-item">View Pumper</span>
                    </a></li>


                <li><a href="#" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Update Fuel Availability</h1>
            </div>
            <div class="users">
                <div class="card">
                    <h2>Octane 92</h2>
                    <br>
                    <div class="per">
                        <table>
                            <tr>
                                <td><span><?php echo($data["eligible_amount"]); ?><?php echo " L"?></span></td>
                                <td><span><?php echo($data["remain_amount"]??null);?></span></td>
                            </tr>
                            <tr>
                                <td>Available</td>
                                <td>Not Allowed</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    
                </div>
                <div class="card">
                <h2>Octane 95</h2><br>
                    <div class="per">
                        <table>
                            <tr>
                            <td><span><?php echo($data["eligible_amount2"]); ?></span></td>
                                <td><span><?php echo($data["remain_amount2"]??null);?></span></td>
                            </tr>
                            <tr>
                                <td>Available</td>
                                <td>Not Allowed</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    
                </div>
                <div class="card">
                <h2>Super Diesel</h2><br>
                    <div class="per">
                        <table>
                            <tr>
                            <td><span><?php echo($data["eligible_amount3"]); ?></span></td>
                                <td><span><?php echo($data["remain_amount3"]??null);?></span></td>
                            </tr>
                            <tr>
                                <td>Available</td>
                                <td>Not Allowed</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    
                </div>
                <div class="card">
                <h2>Auto Diesel</h2><br>
                    <div class="per">
                        <table>
                            <tr>
                            <td><span><?php echo($data["eligible_amount4"]); ?></span></td>
                                <td><span><?php echo($data["remain_amount4"]??null);?></span></td>
                            </tr>
                            <tr>
                                <td>Available</td>
                                <td>Not Allowed</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                   
                </div>
            </div>
            <div class="users1">
                <div class="card">
                    <div class="per1">
                        <div class="form-container">
                            <h3>Update</h3>
                            <br>
                            <div class="form-inner">
                                <form action="<?php echo ROOT?>/Manager/Update/add" method="POST">
                                <div class="">
                                    <br>
                                        <select name="fuel_type" >
                                            <option value="octane 92">Octane 92</option>
                                            <option value="octane 95">Octane 95</option>
                                            <option value="super diesel">Super Diesel</option>
                                            <option value="auto diesel">Auto Diesel</option>
                                        </select>
                                </div>
                                
                                <div class="field">
                                    <input type="number" placeholder="Arrived Amount" name="arrive_amount" required>
                                </div>
                                <div class="field">
                                    <input type="number" placeholder="Eligible Amount"  name="eligible_amount" required>
                                </div>
                                <br>
                                <div class="btn">
                                    <div class="btn-layer"></div>
                                        <input type="submit" value="Add">
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="per1">
                        <div class="form-container">
                            <h3>Price List</h3>
                            <br>
                            <div class="form-inner">
                                <h4>Octane 92    : Rs. <?php echo($data["price"])?></h4><br>
                            </div>
                            <br>
                            <div class="form-inner">                                
                                <h4>Octane 95    : Rs. <?php echo($data["price2"])?></h4><br>
                            </div>
                            <br>
                            <div class="form-inner">
                                <h4>Super Diesel : Rs. <?php echo($data["price3"])?></h4><br>

                            </div>
                            <br>
                            <div class="form-inner">
                                <h4>Auto Diesel  : Rs. <?php echo($data["price4"])?></h4><br>
                            </div>
                            <br>
                        </div>
                        <a href="<?php echo ROOT ?>/Manager/Change_price" class="button">Click here to change price</a>
                    </div>
                </div>
            </div>
        </div>
    </div>






</body>

</html>

