<?php
   

       
       ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashboard</title>
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/tickets.css" />

   

  </head>
  <body>
    <nav>
      <a href="#home" id="logo"><img src="../images/logo.png"></a>
      <input type="checkbox" id="hamburger" />
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul>
        <li>
          <a href="index.html" class="active">Home</a>
        </li>
        

        <li>
            <a href="login.php" >Log out</a>
          </li>
        
      </ul>
    </nav>
    <h2 id="h11">Dashboard</h2>

   <!-- query -->
   <div class="quer">
         <a href="mytickets.php"><div class="tiks">
            <h2>My Tickets</h2>
         </div></a>
        <a href="myappointments.php"><div class="boks"> <h2>My Bookings</h2></div></a>

        <a href="ticket.php"><div class="tiks">
            <h2>Buy Tickets</h2>
         </div></a>
        <a href="booking.php"><div class="boks"> <h2>Make Bookings</h2></div></a>
    </div>
    <!-- table -->
    
        
    
    <?php

       
          ?>
    <div class="tablediv">
      
    </div>
    
  

  
    <footer>
        <p>Copyright 2024</p>
    </footer>
  </body>
</html>
