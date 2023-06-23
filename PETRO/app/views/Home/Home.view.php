<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PETRO</title>
	<link rel="stylesheet" href="<?php echo ROOT ?>/CSS/Common/home.css">
</head>

<body>
	<div class="hero">
		<div class="navigation_bar">
			<img src="<?php echo ROOT ?>/image/Common/petro.jpg" alt="petro logo" class="logo">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">Reviews</a></li>
				<li><a href="">About Us</a></li>
				<li><a href="">Contact Us</a></li>
			</ul>
		</div>
		<div class="banner">
			<div class="left-column">
				<div>
					<h3><span>Advanced</span> Fuel For <span>Advanced</span> Vehicle</h3>
					<h4><br>
						Welcome to the official website of PETRO filling station<br>
						Log into your account for better expirience</h4>
				</div>
				<div class="btn">
					<a href="<?php echo ROOT ?>/Home/Login"><button type="button" class="primary-btn">Login</button></a>
					<a href="view_availability.php"><button type="button">View fuel Availability</button></a>
				</div>
				<div class="social-icons">
					<img src="<?php echo ROOT ?>/image/common/instagram.png" alt="">
					<img src="<?php echo ROOT ?>/image/common/twitter.png" alt="">
					<img src="<?php echo ROOT ?>/image/common/facebook.png" alt="">
				</div>
			</div>
			<div class="right-column">
				<div class="img-slider">
					<div class="slide active">
						<img src="<?php echo ROOT ?>/image/Common/pumps.jpg" alt="">
					</div>
					<div class="slide">
						<img src="<?php echo ROOT ?>/image/Common/driver.jpg" alt="">
					</div>
					<div class="slide">
						<img src="<?php echo ROOT ?>/image/Common/pumping.jpg" alt="">
					</div>
					<div class="slide">
						<img src="<?php echo ROOT ?>/image/Common/engine_oil.jpg" alt="">
      				</div>
					<div class="slide">
						<img src="<?php echo ROOT ?>/image/Common/truck.jpg" alt="">
					</div>
					<div class="navigation">
						<div class="btn active"></div>
						<div class="btn"></div>
						<div class="btn"></div>
						<div class="btn"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 2;

    // Javascript for image slider manual navigation
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;

        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 5000);
      }
      repeater();
    }
    repeat();
    </script>
</body>

</html>