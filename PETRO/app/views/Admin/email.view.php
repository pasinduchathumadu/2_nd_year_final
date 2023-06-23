<?php
    if(empty($data['error'])){
        $data['error']=null;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Admin/email.css" text="text/css">
    <title>Admin</title>
</head>
<body>
    <br><br><br>
<div class="wrapper">
        <form method="POST" action="<?php echo ROOT?>/Admin/Send">
            <h2>Gmail Sender App</h2><br>
            Email To :<br>
            <input type="email" name="email" value="<?php echo $data['email'] ?>" readonly="readonly" class="box"><br><br>
            Subject :<br>
            <input type="text" name="subject" placeholder="Account Details" readonly="readonly"  class="box"><br><br><br>
            Body :<br>
            <textarea name="message">Hi <?php echo $data['first'] ?><?php echo " ",$data['last'] ?>&#013;
            Your Manger ID:<?php echo $_SESSION['customer_manager_id'] ?>&#013;
            Password:<?php echo $_SESSION['password'] ?>&#013;&#010;
            This is your username and password.First you have to login to the system using above credentials.after password can be changed as your wish.&#013;&#010;&#013;&#010;Best Regards;&#013;Petro Filling Station.</textarea><br>
            <input type="submit" value="SEND" name="submit"><a href="<?php echo ROOT?>/Admin/Send"<br>
        </form><br>
        <label class="error"><?php echo $data['error']?></label>&nbsp;<br><br>
        <button type="submit"><a href="<?php echo ROOT?>/Admin/Home" class="same">Back</a></button>

</div>
</body>
</html>