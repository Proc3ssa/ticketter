<?php
 include '../connection.php';

 $SELECT = "SELECT *FROM departments limit 7";
 $query = $connection -> query($SELECT);
 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Department</title>
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
    <link rel="stylesheet" href="../css/ticket.css" />

  
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
      <ul><li>
          
        </li>

        <li>
          <a href="" class="active">Buy Tickets</a>
        </li>

        <li>
          <a href="mytickets.php" class="">My Tickets</a>
        </li>

        


        
        
      </ul>
    </nav>
    <button class="back" onclick="goBack()"><- Back</button>

    <h2>Buy Your Tickets</h2>
    
    <div class="departments">

    <?php
   

       while($res = mysqli_fetch_assoc($query)){

        echo '
        <div class="department" style="background-image: url(../images/'.$res['image'].'); background-repeat:round">

        <div class="empty">
        </div>

        <div class="eventdetails">
          <p>'.$res['name'].'</p>
          <p style="color:yellow">GHc'.$res['price'].'</p>
          <a href="purchase.php?id='.$res['id'].'&name='.$res['name'].'"><button>Buy Ticket</button></a>
        </div>

        </div>

        ';
       }

     

    ?>
   
      

      
      
      
     

      </div>







    <!-- graphs -->
 
    <footer>
      <p>Copyright 2024</p>
  </footer>
  </body>
</html>
