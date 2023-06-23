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
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Admin/product.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

    
<div class="container">
        <nav>
            <ul>
            <li><a href="#" class="logo">
                        <img src="<?php echo ROOT ?>/image/Manager/profile.jpg">
                        <span class="nav-item">Achala</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/Home">
                        <i class="fas fa-gas-pump"></i>
                        <span class="nav-item">Fuel</span>
                    </a></li>
                <li><a href="<?php echo ROOT ?>/Manager/Product">
                        <i class="fas fa-oil-can"></i>
                        <span class="nav-item">Lubricants</span>
                    </a></li>


                <li><a href="#" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>
    <div class="main">
    <div class="users">
    <?php
   if (mysqli_num_rows($data['result']) > 0) {
            while($row = mysqli_fetch_assoc($data['result'])) {
				?>
                <div class="card">
                    
                    <br>
                    <div class="per">
                            
                                <?php echo($row["name"]); ?><?php echo " L"?><br>
                                <img src="<?php echo ROOT ?>/image/Manager/<?php echo $row['image']; ?>" alt=""><br>
                                <?php echo "Rs. "?><?php echo($row["price"]??null);?>   
                    </div>
                    <br>
                    
                </div>
                <?php
      };
   };
   ?>
    </div>
    <section class="main">
            <div class="main-top">
                <h1>Add Products</h1>
            </div><br><br>
            <div class="wrapper">
                <div class="form-container">
                <div class="form-inner">
                <img src="<?php echo ROOT ?>/image/Manager/engine-oil.png" alt="">
                    <form action="<?php echo ROOT?>/Manager/Change_Price/change_price" method="POST"><br>
                    <div>
                    <select name="product" id="" class="input">
            <option value="Toyota Motor Oil SL/CF 10W-30">Toyota Motor Oil SL/CF 10W-30</option> 
            <option value="Toyota Motor Oil SN/CF 5W-30">Toyota Motor Oil SN/CF 5W-30</option> 
            <option value="Toyota Motor Oil 15W-40 CI-4">Toyota Motor Oil 15W-40 CI-4</option>
            <option value="PRESTONE ATF MV Stop Leak Fluid">PRESTONE ATF MV Stop Leak Fluid</option>
            <option value="CALTEX Havoline Super 4T 20W-40">CALTEX Havoline Super 4T 20W-40</option>
            <option value="CALTEX Havoline Formula [SN] 10W-30">CALTEX Havoline Formula [SN] 10W-30</option>
            <option value="CALTEX Lanka Super Plus 40">CALTEX Lanka Super Plus 40</option> 
            <option value="CALTEX Havoline Fully Synthetic CVT FLUID">CALTEX Havoline Fully Synthetic CVT FLUID</option>
            </select>
                    </div>
                <div class="field">
                    <input type="number" name="octane_92" placeholder="Quantity">
                </div>
                <div class="field">
                    <input type="number" name="octane_95" placeholder="Price">
                </div>
                <br>

                <input type="checkbox" required class="checkbox">
                <span class="span">Confirm details</span><br>
                <br>
                <div class="btn">
                    <div class="btn-layer"></div>
                        <input type="submit" value="Submit">
                    </div>

                </div>
                </div>
            </div>

            <section class="attendance">
        <div class="attendance-list">
          <h1>Price History</h1>
          <table class="table">
            <thead>
              <tr>

                <th>Date</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>03-24-22</td>
                <td>Toyota Motor Oil SL/CF 10W-30</td>
                <td>10</td>
                <td> Rs.3400.00</td>
              </tr>
              <tr class="">
                <td>03-24-22</td>
                <td>CALTEX Havoline Super 4T 20W-40</td>
                <td>15</td>
                <td> Rs.7985.00</td>
              </tr>
              <tr>
                <td>03-24-22</td>
                <td>CALTEX Havoline Fully Synthetic CVT FLUID</td>
                <td>10</td>
                <td> Rs.3600.00</td>
              </tr>
              <tr>
                <td>03-24-22</td>
                <td>PRESTONE ATF MV Stop Leak Fluid</td>
                <td>12</td>
                <td> Rs.7100.00</td>
              </tr>
              <!-- <tr >
                <td>05</td>
                <td>Salina</td>
                <td>Coding</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr>
              <tr >
                <td>06</td>
                <td>Tara Smith</td>
                <td>Testing</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>
    
</body>

</html>