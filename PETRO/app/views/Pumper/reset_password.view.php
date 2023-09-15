<?php
if (empty($data['error'])) {
    $data['error'] = NULL;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Change Automatic - Sagar Developer</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Common/login.css" text="text/css">
</head>

<body>
    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT ?>/image/Common/log.png" alt="" class="image"></a>
        </header>
        <div class="wrapper">
            <div class="title">
                Change Password
            </div>
            <form action="<?php echo ROOT ?>/Pumper/Reset/details" method="post" class="login">
                <?php echo $data['error'] ?>
                <div class="field">
                    <input type="text" name="new_password" required>
                    <label>New password</label>
                </div>
                <div class="field">
                    <input type="password" name="confirm_password" required>
                    <label>Confirm password</label>
                </div>
                <div class="list">
                    <ul type="Square">
                        <li>At least 1 uppercase character.</li>
                        <li>At least 1 lowercase character.</li>
                        <li>At least 1 digit.</li>
                        <li>At least 1 special character.</li>
                        <li>Minimum 8 characters.</li>

                    </ul>
                </div>

                <div class="field">
                    <input type="submit" value="Save Password" onclick="test_str()">
                </div>
            </form>
        </div>
    </div>

</body>

</html>