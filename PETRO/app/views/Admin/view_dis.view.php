
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
    <meta charset="UTF-8" />
    <title>Add Distribution Manager</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Manager/price.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav>
            <ul>
            <li><a href="<?php echo ROOT ?>/Admin/Home" class="logo">
                        <img src="<?php echo ROOT ?>/image/Manager/home-button.png">
                        <span class="nav-item"></span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">Add D_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">Add C_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View D_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View C_Manager</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View Customer</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-star"></i>
                        <span class="nav-item">View Complain</span>
                    </a></li>

            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>View Distribution Manager</h1>
            </div><br><br>

            <table class="table">
        <thead>
        <tr>
                <th>Manager ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NIC</th>
                <th>Email</th>
            
        </tr>
        </thead>
    <tbody>
        <?php
            if($flag==true){
                if (mysqli_num_rows($data['result']) > 0) {
                    while($row = mysqli_fetch_assoc($data['result'])) {
                        echo "<tr>
                        <td>".$row['distribution_manager_id']."</td>
                        <td>".$row['First_name']."</td>
                        <td>".$row['Last_name']."</td>
                        <td>".$row['NIC']."</td>
                        <td>".$row['email']."</td>
                        </tr>";
                    }
                }
            }
        ?>
    </tbody>
    </table>
    
    <div class="wrapper">
                <div class="form-container">

                    <div class="form-inner">
                    
                    <form action="<?php echo ROOT?>/Admin/Delete_dis" method="post">
                        <div class="field">
                        <input type="text" name="delete"  placeholder="Enter Manager ID" class="box"required></div><br>
                        </div>
                        <button type="submit" class="back">Remove</button></div>
                    </form>
                    </div>
                </div>
            </div>
    </div>
    

</body>

</html>