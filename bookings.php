<?php
    include 'connection.php';
    session_start();
        $admin = $_SESSION['admin'];
        if($admin == ""){
          // echo '<script>alert("'.$admin.'")</script>';
        header("location: signin.php");
        
        
       }

       
        

        // echo $DEPARTMENT;

       if(isset($_GET['date'])){
        $date = $_GET['date'];
        
          $SELECT = "SELECT *FROM booking where date = '$date'";
        
         
       }
       else if(isset($_GET['name'])){
        $name = $_GET['name'];
        $SELECT = "SELECT *FROM booking where department  LIKE '%$name%' or Customer LIKE '%$name%'";
       }
       else{
          
          $SELECT = "SELECT *FROM booking";
         }

       $query = mysqli_query($connection, $SELECT);
       
       if($query -> num_rows == 0){
        echo '
        <style>
            .tablediv{
              display:none;
            }
        </style>
        ';
       }
      

       
       ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookings</title>
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
    <link rel="stylesheet" href="./css/tickets.css" />

    <script>
// Function to go to the previous page
function goBack() {
    window.history.back();
}

function printDiv(){
  document.getElementById('hide').style.display = "none";
  document.getElementById('hide2').style.display = "none";
  document.getElementById('hide3').style.display = "none";
  print();
}

</script>


  </head>
  <body>
    <nav id="hide">
      <a href="#home" id="logo"><img src="./images/logo.png"></a>
      <input type="checkbox" id="hamburger" />
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul>
        <li>
          <a href="dashboard.php" >Events</a>
        </li>

        <li>
            <a href="tickets.html" class="active">Bookings</a>
          </li>
        
      </ul>
    </nav>
    <button class="back" onclick="goBack()"><- Back</button>
    <h2 id="h11">Bookings</h2>

   <!-- query -->
   <div class="query" id="hide2">
        <form action="#" method="get" id="notprint">
            <a for="date">Search by date</a>
            <input type="date" name="date" id="date" required>
            
            <button name="view" type="submit">Search</button>
        </form>

        <form action="#" method="get" id="notprint">
            <a for="date">Search by Events</a>
            <input type="text" name="name" id="date" required>
            
            <button name="view2" type="submit">Search</button>
        </form>

        
    </div>
    <!-- table -->
    
        
    
    <?php
          if($query -> num_rows == 0){
            echo "<p style='text-align:center; margin-bottom:200px'>No records found for ".$_GET['name']."</p>";
          }

          ?>
    <div class="tablediv" id="content-to-print">
        <table >
        <tr>
            <th>Event</th>
            <th>Customer</th>
            <th>Date </th>
            <th>Time</th>
            
            <th>Contact</th>
            <th>Status</th>
        </tr>

        <?php

function compareDates($providedDate) {
  
  $currentDate = new DateTime();
  
 
  $providedDate = new DateTime($providedDate);
  
  
  if ($providedDate < $currentDate) {
      return "Date passed";
  } else {
      return "date not passed";
  }
}


          
          while($res = mysqli_fetch_assoc($query)){

            $datStatus = compareDates($res['Date']);

            if($datStatus == 'Date passed'){
              $STATUS = $datStatus;
            }
            else{
              $STATUS = '<a href="setstatus.php?bookingid='.$res['id'].'">'.$res['status'].'</a>';
            }

            echo '
                <tr>
                      <td>'.$res['department'].'</td>
                      <td>'.$res['Customer'].'</td>
                      
                      <td>'.$res['Date'].'</td>
                      <td>'.$res['Time'].'</td>

                      
                      <td>'.$res['contact'].'</td>
                      <td>'.$STATUS.'</td>
                  </tr>
                ';
          }

        ?>

       

        
    </table>
    <center id="hide3" style="margin-top: 10px;"><button  style="width:90px; height:30px; border:none; color:white; background-color:blue; border-radius:5px" onclick="printDiv()">Print</button></center>
    </div>
    
  

  
    <footer>
        <p>Copyright 2024</p>
    </footer>
  </body>
</html>
