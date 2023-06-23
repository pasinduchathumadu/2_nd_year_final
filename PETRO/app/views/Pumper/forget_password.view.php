







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
    <title>Background Change Automatic - Sagar Developer</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Common/forget.css" text="text/css">
</head>

<body>
    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT ?>/image/Common/log.png" alt="" class="image"></a>
        </header>
        <div class="wrapper">
            <div class="title">
                Email Verification
            </div>
           
            
                <div class="field">
                <form action="<?php echo ROOT ?>/Pumper/Forget_password/details" method="post">
            <div class="form">
                <label>Enter your email:</label><br><br><br>
                <input type="email"class="textarea" name="email" placeholder="E-Mail Address" required><br><br><br>
                <input type="submit" value="SEND" name="submit" class="button1"><br>
            </div><br>
            <label class="error"><?php echo $data['error'] ?></label>
           
        </form>
                   
                </div>
                <div class="field">
                    
                </div>
                <div class="content">
                 
					<div class="pass-link">
				
                    
                	</div>
                   
                </div>
                <div class="field">
                   
                </div>
                <div class="signup-link">
                 
                </div>
				
				
            </form>
        </div>
    </div>

</body>
</html>










