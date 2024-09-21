<?php
session_start();
if(!isset($_SESSION['client'])){
  header('location:login.php');
}
else{
  
  $client = $_SESSION['client'];
  include '../connection.php';
  $SELECT = "SELECT name, email FROM users WHERE email = '$client'";
  $query = mysqli_query($connection, $SELECT);
  $res = mysqli_fetch_assoc($query);
}
if(isset($_POST['submit'])){
   include '../connection.php';
   $id = rand(1000,9999);
    $name = $res['name'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $contact = $res['email'];

    $INSERT = "INSERT INTO booking VALUES('$department', '$name', '$date', '$time', 'Pending Approval', '$contact', $id)";

    if(mysqli_query($connection, $INSERT)){
       

        echo '
          <script>alert("You have successfully booked an appointment. waiting for approval")</script>
        ';
    }
    else{
        echo '
        <script>alert("Something went wrong, try again after some time")</script>
      ';
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
    
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }

</script>
<script>
// Function to go to the previous page
function goBack() {
    window.history.back();
}
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="../css/ticket.css" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>Bookings</title>
</head>
<body>
    <main class="main">
    
    <nav>
      <a href="#home" id="logo"><img src="../images/logo.png"></a>
      
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul><li>
          <a href="dashboard.php" >Home</a>
        </li>

        

        <li>
          <a href="myappointments.php" class="">My Bookings</a>
        </li>

        


        
        
      </ul>
    </nav>
    <button class="back" onclick="goBack()"><- Back</button>

        <div class="top">

            <div class="wrapper">
                <div><h1>Booking</h1></div>
                
            </div>

        <div class="input">
            <form action="#" method="post" enctype="multipart/form-data">
            
            
            <select required name="department">
                <option value="<?php echo $res['name'];?>">--Department--</option>
                <option value="Resturant">Resturant</option>
                <option value="Dome">Dome</option>
                <option value="Marriage Registry">Marriage Registry</option>
                <option value="Space Rental">Space Rental</option>
                
            </select>
    
            <button type="menu">Date</button>
            <input type="date" name="date"  required>
            <button type="menu">Time</button>
            <input type="time" name="time" placeholder="Time" required>

           
           
            <div id="button">
            <button type="submit" name="submit">Book appointment</button>
            </div>
        </form>
        </div>
     </div>

     

    

      <footer>
        <div class="text">
            <p>Copyrights ©, 2024</p>
        </div>

       
     </footer>  
     </main> 
    
    
</body>
</html>