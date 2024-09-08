<?php
session_start();
if(!isset($_SESSION)){
  header('location:login.php');
}

$client = $_SESSION['client'];
 include '../connection.php';

 $userSelect = "SELECT *FROM users where email = '$client'";
 $userQuery = mysqli_query($connection, $userSelect);
 $user = mysqli_fetch_assoc($userQuery);
 
 $id = $_GET['id'];

 $SELECT = "SELECT *FROM departments where id = $id";
 $query = $connection -> query($SELECT);
 $res = mysqli_fetch_assoc($query);
 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy ticket</title>
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
    <link rel="stylesheet" href="../css/buy.css" />


    <script>
        function incrementValue() {
            // Get the input element
            var textBox = document.getElementById('number');
            var base = document.getElementById('base');
            var price = document.getElementById('price');

            // Get the current value and convert it to a number
            var currentValue = parseFloat(textBox.value);
            var currentBase = parseFloat(base.value);

            // Check if the value is a valid number
            if (!isNaN(currentValue) && !isNaN(currentBase)) {
                // Increment the value by 1
                textBox.value = currentValue + 1;
                price.value = currentBase*textBox.value;
            } else {
                // If the value is not a number, set it to 1
                textBox.value = 1;
            }
        }

        function decrementValue() {
            // Get the input element
            var textBox = document.getElementById('number');
            var base = document.getElementById('base');
            var price = document.getElementById('price');

            // Get the current value and convert it to a number
            var currentValue = parseFloat(textBox.value);
            var currentBase = parseFloat(base.value);

            // Check if the value is a valid number
            if (!isNaN(currentValue) && !isNaN(currentBase)) {
                // Increment the value by 1
                textBox.value = currentValue - 1;
                price.value = currentBase*textBox.value;
            } else {
                // If the value is not a number, set it to 1
                textBox.value = 1;
            }
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
          <a href="" class="active">Tickets</a>
        </li>

        <li>
          <a href="index.html" >Home</a>
        </li>


        
        
      </ul>
    </nav>
    <h2 align="center">Purchase</h2>
    
    <div class="departments">

    <?php
   

       

        echo '
        <div class="department" style="background-image: url(../images/'.$res['image'].'); background-repeat:round">

        <div class="empty">
        </div>

        <div class="eventdetails">
          <h1>'.$res['name'].'</h1>
          
         
        </div>

        </div>
         
        

        ';
       

     

    ?>
    
   
      </div>
      <div class="amt">
        <form action="pay.php" method="GET" >
          <input type="text" name="name" required placeholder="Name" value="<?php echo $user['name']?>"><br/>
          <input type="text" name="address" required placeholder="Address" ><br/>
          <input type="email" name="email" required placeholder="Email" value="<?php echo $user['email']?>">
        <?php echo ' <h1>GHc<input name="price" type="text" id="price" value="'.$res['price'].'"></h1>
        
        <input type="hidden" id="base" value="'.$res['price'].'">
        <input type="hidden"  name= "id" value="'.$id.'">
        
        <input type="hidden"  name="department" value="'.$res['name'].'">
        '; ?>
            <b>No. of tickets</b>
            <button type="button" onClick="incrementValue()">+</button>
            <input type="number" value="1" id="number" name="numberoftickets">
            <button type="button" onClick="decrementValue()">-</button>
  
      </div>
      <div class="lasbtn" type="submit"><button>Check Out</button></div>
      </form>







    <!-- graphs -->
 
    <footer>
      <p>Copyright 2024</p>
  </footer>
  </body>
</html>
