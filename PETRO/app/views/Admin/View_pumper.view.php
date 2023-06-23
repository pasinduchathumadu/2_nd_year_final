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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PETRO</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Manager/view.css" />
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
    <div class="main">

    <div class="main-top">
                <h1>View Pumper</h1>
            </div>
    <table class="table">
        <thead>
        <tr>
            <th>Pumper ID</th>
            <th>First Name</th>
            <th>NIC</th>
            <th>Email</th>
            <th>Contact No</th>
            
        </tr>
        </thead>
    <tbody>
        <?php
            if($flag==true){
                if(mysqli_num_rows($data['result']) > 0){
                    while($row = mysqli_fetch_assoc($data['result'])){
                        echo "<tr data-href = more.html><td>". $row["id"]. "</td><td>". $row["first_name"]."</td><td>". $row["nic"]."</td><td>". $row["email"]."</td><td>". $row["phone_no"]."</td></ data-href>";
                    }
                }
            }
        ?>
    </tbody>
    </table>
    </div>
    
</body>

</html>