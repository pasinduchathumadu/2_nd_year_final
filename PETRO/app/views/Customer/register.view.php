<?php
if(empty($data['message'])){
    $data['message']=NULL;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Change Automatic - Sagar Developer</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/reg.css" text="text/css">

</head>

<body>
    <div class="Section_top">
        <header>
            <a href="#"><img src="<?php echo ROOT ?>/image/Common/log.png" alt="" class="image"></a>
        </header>
        <div class="wrapper">
            <div class="title">
                Register Now
            </div>




            <form action="<?php echo ROOT ?>/Customer/Register/register" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
     
      <?php
      
      echo $data['message'];
?>
<br><br>
      <input type="text" name="fname" placeholder="first name" class="box" required  maxlength="10">
      <input type="text" name="lname" placeholder="last name" class="box" required  maxlength="10"><br><br>
	  
      <input type="email" name="email" placeholder="enter email" class="box" required>
	        <input type="tel" name="phone" placeholder="enter phone number (070xxxxxxx)" class="box" required pattern="[0-9]{10}"><br><br>
            <input type="text" name="NIC" placeholder="enter NIC (990234123V)" pattern="[0-9]{9}[A-Z]{1}" class="box" >
	   <label for="vehicle"><h2 class="head"> Vehicle Details</h2> </label> <br>
	   <input type="text" name="vno" id="vno" placeholder=" Vehicle Number"  class="box1" >
								   <select name="vtype" class="box1" id="vno1"  >
                                    <option value=""disabled selected hidden >--Vehicle Type--</option>
                                    <option value="car">Car</option>
                                    <option value="van">Van</option>
                                    <option value="threewheel">Three - Wheel</option>
                                    <option value="mcycle">Motor-Cycle</option>
                                    <option value="bus">Bus</option>
                                    <option value="heavy">Heavy Vehicles</option>
                                </select>
								  <select name="ftype" class="box1" id="vno2"  >
                                    <option value="" disabled selected hidden >--Fuel Type--</option>
                                    <option value="petrol">Petrol</option>
                                    <option value="diesel">Diesel</option>
								
                                </select>
								<br><br>
	 
                     

								
                           				
      <input type="password" name="password" placeholder="enter password" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="box" min="8" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" min="8" required>
      <p>Must contain at least 1 number,1 uppercase and lowercase letter, at least 8 or more characters</p>	
    
      <input type="hidden" name="points" value="0" class="box"  required>
<br><br>
		<input type="checkbox" id="checkme"/> I agree  to <a href="" class="login"> Terms & Conditions </a> <br><br>	
      <input type="submit" name="submit" value="register now" class="btn" id="submit" disabled ><br><br>
      <p>already have an account? <a href="<?php echo ROOT ?>/Home/Login" class="login">login now</a></p>
      <br><br>
   </form>




        </div>
    </div>


    



<script>
var checker = document.getElementById('checkme');
var sendbtn = document.getElementById('submit');
checker.onchange = function() {
  sendbtn.disabled = !this.checked;
};


function validateForm() {
    var vno=document.getElementById("vno").value;

	  var vno1=document.getElementById("vno1").value;
    
	  var vno2=document.getElementById("vno2").value;
   

    if((vno===null || vno==="")){
        alert("You have to enter a vehicle");
        return false;
    }
	
	   if((vno1===null || vno1==="")){
        alert("Please fill the relevant fields of vehicle details");
        return false;
    }
	
	   if((vno2===null || vno2==="")){
        alert("Please fill the relevant fields of vehicle details");
        return false;
    }

  
}

 
 




 </script>


</body>
</html>










