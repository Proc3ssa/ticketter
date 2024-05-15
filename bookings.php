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
    <link rel="stylesheet" href="./css/tickets.css" />

   

  </head>
  <body>
    <nav>
      <a href="#home" id="logo"><img src="./images/logo.png"></a>
      <input type="checkbox" id="hamburger" />
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul>
        <li>
          <a href="dashboard.php" >Dashboard</a>
        </li>

        <li>
            <a href="tickets.html" class="active">Tickets</a>
          </li>
        
      </ul>
    </nav>
    <h2 id="h11">Bookings</h2>

   <!-- query -->
   <div class="query">
        <form action="#" method="get">
            <a for="date">Specify by date</a>
            <input type="date" name="date" id="date" required>
            
            <button name="view" type="submit">View</button>
        </form>
    </div>
    <!-- table -->
    
        
    
    <?php
          if($query -> num_rows == 0){
            echo "<p style='text-align:center; margin-bottom:200px'>No records for said date</p>";
          }

          ?>
    <div class="tablediv">
        <table>
        <tr>
            <th>Department</th>
            <th>Customer</th>
            <th>Date </th>
            <th>Time</th>
            <th>Status </th>
            <th>Contact</th>
        </tr>

        <?php
          
          while($res = mysqli_fetch_assoc($query)){

            echo '
                <tr>
                      <td>'.$res['department'].'</td>
                      <td>'.$res['Customer'].'</td>
                      
                      <td>'.$res['Date'].'</td>
                      <td>'.$res['Time'].'</td>

                      <td>'.$res['status'].'</td>
                      <td>'.$res['contact'].'</td>
                  </tr>
                ';
          }

        ?>

       

        
    </table>
    </div>
    
  

  
    <footer>
        <p>Copyright 2024</p>
    </footer>
  </body>
</html>
