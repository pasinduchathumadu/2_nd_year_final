<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRO</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Common/home.css">
</head>

<body>

    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT?>/image/Common/log.png" alt="" class="image"></a>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo ROOT ?>/Home/Home">Home</a></li>
                    <li><a href="<?php echo ROOT ?>/Home/Available">Availability</a>
                      
                    </li>
                    <li><a href="<?php echo ROOT ?>/Home/Aboutus">About Us</a></li>
                    <li><a href="<?php echo ROOT ?>/Home/Login">LogIn</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <div class="home-text">
			
                <p class="animate-text">
                    <span>Advance Fuel For Advanced Vehicles</span>
                    <span>High Quality Lubricants</span>
                    <span>Online payments</span>
                </p>
            </div>
        </div>
    </div>
   
    <script>
        const txts = document.querySelector(".animate-text").children,
            txtsLen = txts.length;
        let index = 0;
        const textInTimer = 6000,
            textOutTimer = 5600;

        function animateText() {
            for (let i = 0; i < txtsLen; i++) {
                txts[i].classList.remove("text-in", "text-out");
            }
            txts[index].classList.add("text-in");

            setTimeout(function () {
                txts[index].classList.add("text-out");
            }, textOutTimer)

            setTimeout(function () {

                if (index == txtsLen - 1) {
                    index = 0;
                }
                else {
                    index++;
                }
                animateText();
            }, textInTimer);
        }

        window.onload = animateText;

    </script>

</body>



</html>