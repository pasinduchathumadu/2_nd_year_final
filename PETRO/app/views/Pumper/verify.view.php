<?php
  if(empty($data['error'])){
    $data['error']=null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Common/login.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT ?>/image/Common/log.png" alt="" class="image"></a>
        </header>

        <section class="wrapper">
            <div class="title">
                Verification Code
            </div>
        
        <form action="<?php echo ROOT ?>/Pumper/Verify/check" method="post">
            <div class="field">
                <input type="text" name="code" maxlength="4" size="10" placeholder="Enter Verification Code">
                
            </div>
            <br><br>
            <div class="field">
                <input type="submit" value="Verify" name="submit" class="" >
            </div>
            <label class="error"><?php echo $data['error'] ?></label>
        </form>
</div>



  </div>
</div>






</body>

</html>