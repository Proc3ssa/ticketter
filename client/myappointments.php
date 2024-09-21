<?php
    include '../connection.php';
    
    session_start();
    if(!isset($_SESSION['client'])){
      header('location:login.php');
    }
    $client = $_SESSION['client'];
        
        $select = "SELECT * FROM booking where contact = '$client'";

        $query = mysqli_query($connection, $select);
    
    
    
       
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
    <link rel="stylesheet" href="../css/tickets.css" />

    <script>
// Function to go to the previous page
function goBack() {
    window.history.back();
}
</script>

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
          <a href="dashboard.php" >Dashboard</a>
        </li>
        

        <li>
            <a href="#" class="active">My Bookings</a>
          </li>
        
      </ul>
    </nav>
    <button class="back" onclick="goBack()"><- Back</button>
    <h2 id="h11">My Bookings</h2>

   <!-- query -->
   <div class="query">
       
    </div>
    <!-- table -->
    <div class="tablediv">
    <table>
    <tr>
    <th>Id </th>
            <th>Date </th>
            <th>Time</th>
            <th>Department</th>
            <th>Status </th>
            <th></th>

            </tr>
        <?php
        

        if($query -> num_rows == 0){

          echo "<p>You have no bookings<p>";
        }

        else{ // $currentDate = date('Y-m-d H:s:i');
          // $appointmentDate = $res['date']." ". $res[time];
         while($res = mysqli_fetch_assoc($query)){

          // $currentDate = date('Y-m-d H:s:i');
          // $appointmentDate = $res['date']." ". $res[time];
         

            echo '
             
             
                <tr>
                      <td>'.$res['id'].'</td>
                      <td>'.$res['Date'].'</td>
                      <td>'.$res['Time'].'</td>
                      <td>'.$res['department'].'</td>
                      
                      
                      <td>'.$res['status'].'</td>
                     
                      
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
