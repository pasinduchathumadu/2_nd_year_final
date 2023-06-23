

<?php
if(empty($data['message'])){
    $data['message']=NULL;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- My CSS -->
  
     <!-- My CSS -->
     <link rel="stylesheet" href="<?php echo ROOT?>/CSS/Customer/orderticket.css" text="text/css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
   
   <title>petro</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-gas-pump'></i>
            <span class="text">PETRO</span>
        </a>
        <ul class="side-menu top">
            <li class="">
                <a href="<?php echo ROOT ?>/Customer/Home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo ROOT ?>/Customer/Store">
                <i class='bx bx-store'></i>
                    <span class="text">Store</span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo ROOT ?>/Customer/Pendingstore">
                <i class='bx bxs-stopwatch'></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Pumphistory">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Pumping History</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Analyze">
                <i class='bx bxs-bar-chart-alt-2' ></i>
                    <span class="text">Fuel Analyze</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Storehistory">
                <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Store History</span>
                </a>
            </li>
            <li>
                <a href="<?php echo ROOT ?>/Customer/Complaint">
                <i class='bx bxs-envelope'></i>
                    <span class="text">Complaints</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Feedback">
                <i class='bx bxs-message-dots'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>

            <li>
                <a href="<?php echo ROOT ?>/Customer/Aboutus">
                <i class='bx bxs-business' ></i>
                    <span class="text">About Us</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
        <i class='bx bx-menu'></i>
          
          <form action="#">
              <div class="form-input">
                  
                  <button type="submit" class="search-btn"></button>
              </div>
          </form>

          <p> <?php echo  $data['fname'] ?></p>
    
          <a href="<?php echo ROOT ?>/Customer/Profile" class="profile">
       
          <img src="<?php echo ROOT ?>/image/bp.jpg"  style="width:35px;height:35px;"></a>
        
          </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            
<br>


<div class="table-data">
    <div class="order">
        <div class="head">
            <h2 class="ot">Order Ticket</h2>
         
        </div>
    
<br>
                
            
        <form action="<?php echo ROOT ?>/Customer/Orderticketvehicle/add " method="POST">

        <?php

$tomorrow = date("Y/m/d", time() + 172800);

if($data['ftype']=='octane 95')
$price=$data['amount']* $data['price_95'];
else if($data['ftype']=='octane 92')
$price=$data['amount']* $data['price_92'];
else if($data['ftype']=='super diesel')
$price=$data['amount']*$data['price_super'];
else
$price=$data['amount']*$data['price_auto'];

$points=$data['points'];


if($data['points']>=300){
    $price2=$price-$data['points'];
    if($price2<=0){ 
        $price2=0;
        $data['petropoints']=$points-$price;
        $points=$price;
       

}
else{
    $data['points']=0;
    $data['petropoints']=0;
    
}


}
else{
    $price2=$price;
}
?>




   
      <div class="columns">
         <div class="column">
<br>


          <input type="hidden" name="id" value="<?php echo $data['id']; ?>" class="box1" readonly>
          
          <input type="hidden" name="email" value="<?php echo $data['email']; ?>" class="box1" readonly>
          <label for="orderID"><b> Order ID:</b> </label>
          <input type="text" name="Oid" value="<?php echo $data['Oid']; ?>" class="box" readonly><br><br>
<br>
          <label for="vno"> Vehicle No: </label>
          <input type="text" name="vno" value="<?php echo $data['VMno']; ?>" class="box" readonly><br><br><br>

         <label for="vtype"> Vehicle Type: </label>
         <input type="text" name="vtype" value="<?php echo $data['vtype']; ?>" class="box" readonly ><br><br><br>
         <label for="ftype"> Fuel Type :</label>  
         <input type="text" name="ftype" value="<?php echo $data['ftype']; ?>" class="box" readonly><br>

         </div>
         <div class="column">
<br>
     

        <label for="cusid"> Fuel Amount: </label>
        <input type="text" name="amount" value="<?php echo $data['amount']; ?>" class="box" readonly><br><br><br>
        <label for="cusid"> Price: </label>
        <input type="number" name="price" value="<?php echo "$price2" ?>" class="box" readonly><br><br><br>
       <input type="hidden" name="points" value="<?php echo $data['points']; ?>" class="box" readonly>
       <input type="hidden" name="usedpoints" value="<?php echo "$points" ?>" class="box" readonly>
       <input type="hidden" name="petropoints" value="<?php echo $data['petropoints']; ?>" class="box" readonly>


       <label for="cusid"> Ordered Date: </label>
       <input type="text" name="cdate" value="<?php echo date("Y/m/d") ?>" class="box" readonly ><br><br><br>
       <label for="cusid"> Order Expire Date: </label>
       <input type="text" name="ndate" value="<?php echo "$tomorrow" ?>" class="box" readonly><br><br><br>
       <input type="hidden" name="status" value="0"  class="box" readonly>



   
          
         


   </div>
   </div>
 
<br><br><br><br>
 <input type="submit" value="Place Order" name="Payment" class="btn4"><br><br>


  


</form>

</div>

    
    <div class="side2">
<br><br>
        
           
       


        
      
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
      </header>
      
        <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days"></ul>
      </div>
   
  <br><br>
    
<h3 class="dis">You should complete your order within 2 days.Otherwise Order will Cancel</h3>
        




</div></div>























             













        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>



const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})




if (window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
    if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
})











</script>
<script>



const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});


    </script>
</body>

</html>