<?php
    include '../connection.php';

    if(isset($_COOKIE["user"])) {
        
        $user = $_COOKIE["user"];
        
        $select = "SELECT ticket_id, date, department, numberoftickets, status, customer FROM tickets where contact = '$user'";

        $query = mysqli_query($connection, $select);
    } 
    
    
       
       ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticktes</title>
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
          <a href="index.html" >Home</a>
        </li>
        <li>
          <a href="ticket.php" >Buy Tickets</a>
        </li>

        <li>
            <a href="#" class="active">My Tickets</a>
          </li>
        
      </ul>
    </nav>
    <h2 id="h11">My Tickets</h2>

   <!-- query -->
   <div class="query">
       
    </div>
    <!-- table -->
    
        
    
    <?php

       
          ?>
    <div class="tablediv">
        <table>
        <tr>
            <th>Date </th>
            <th>Department</th>
            <th>Number of tickets</th>
            <th>Status </th>
            <th></th>

        </tr>

        <?php
        if(isset($_COOKIE["user"])) {

          
          
          
          while($res = mysqli_fetch_assoc($query)){

            echo '
                <tr>
                      <td>'.$res['date'].'</td>
                      <td>'.$res['department'].'</td>
                      
                      <td>'.$res['numberoftickets'].'</td>
                      <td>'.$res['status'].'</td>
                      <td><a href="../ticket/index.php?customer='.$res['customer'].'&department='.$res['department'].'&numberoftickets='.$res['numberoftickets'].'&date='.$res['date'].'&ticketid='.$res['ticket_id'].'">View</a></td>

                      
                  </tr>
                ';
          }
        
        }

        ?>

       

        
    </table>
    </div>
    
  

  
    <footer>
        <p>Copyright 2024</p>
    </footer>
  </body>
</html>
