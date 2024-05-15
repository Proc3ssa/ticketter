<?php
if(isset($_POST['submit'])){
    include '../connection.php';
    $name = $_POST['name'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $contact = $_POST['contact'];

    $INSERT = "INSERT INTO booking VALUES('$department', '$name', '$date', '$time', 'Not visited', '$contact')";

    if(mysqli_query($connection, $INSERT)){
        setcookie("user", "$contact", time() + (10 * 365 * 24 * 60 * 60), "/");

        echo '
          <script>alert("You have successfully booked an appointment")</script>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="../css/ticket.css" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>Appointment</title>
</head>
<body>
    <main class="main">
    <nav>
      <a href="#home" id="logo"><img src="../images/logo.png"></a>
      
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul><li>
          <a href="./" >Home</a>
        </li>

        

        <li>
          <a href="myappointments.php" class="">My Appointments</a>
        </li>

        


        
        
      </ul>
    </nav>

        <div class="top">

            <div class="wrapper">
                <div><h1>Appointment</h1></div>
                
            </div>

        <div class="input">
            <form action="#" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Your name" required>
            
            <select required name="department">
                <option value="">--Department--</option>
                <option value="Resturant">Resturant</option>
                <option value="Dome">Dome</option>
                <option value="Marriage Registry">Marriage Registry</option>
                <option value="Space Rental">Space Rental</option>
                
            </select>
    
            <button type="menu">Date</button>
            <input type="date" name="date"  required>
            <button type="menu">Time</button>
            <input type="time" name="time" placeholder="Time" required>

            <input type="text" name="contact" placeholder="Contact" required>
           
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