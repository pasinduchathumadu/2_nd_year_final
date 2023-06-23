<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Admin/home.css" text="text/css">
    <title>Admin</title>
</head>
<body>
    <div class="main3">
        <p class="header">MANAGER PROFILE</p>
        <div class="main2">
            <form action="" method="post">
                <button type="submit" name="customer"><a href="<?php echo ROOT?>/Admin/View_cus" class="same">Customer Manger</a></button><br><br>
                <button type="submit" name="distribution"><a href="<?php echo ROOT?>/Admin/View_dis" class="same">Fuel distribution Manager</a></button><br><br>
            </form>
        </div>
    </div>
</body>
</html>