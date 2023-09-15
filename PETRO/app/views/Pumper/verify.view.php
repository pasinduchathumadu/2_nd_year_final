<?php
if (empty($data['error'])) {
    $data['error'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Common/login.css" />
    <!-- Font Awesome Cdn Link -->

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
                    <input type="text" name="code" maxlength="4" size="10" placeholder="Enter Verification Code" required>

                </div>
                <br><br>
                <div class="field">
                    <input type="submit" value="Verify" name="submit" class="">
                </div>
                <label class="error"><?php echo $data['error'] ?></label>
            </form>
    </div>
</body>

</html>