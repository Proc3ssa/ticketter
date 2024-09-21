
<?php
include 'connection.php';
session_start();
    $admin = $_SESSION['admin'];
    if($admin == ""){
      header("location: signin.php");
   }

   //fetch
   
   
   if(isset($_GET['username'])){
    $name = $_GET['username'];
    $STATEMENT = "SELECT name, email, id FROM users where name LIKE '%$name%'"; 

    
   }
   else{
    $STATEMENT = "SELECT name, email, id FROM users";
   }

   $QUERY = mysqli_query($connection, $STATEMENT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>users |ticketter</title>
    <script>
// Function to go to the previous page
function goBack() {
    window.history.back();
}
</script>
</head>
<body>
    <main class="main">
        <div class="top">
        <button class="back" onclick="goBack()"><- Back</button>
       
        <div class="image simage">
            <img src="../images/logo.png" alt="e-invte logo">
            <h2>Users</h2>

            <form action="#" method="get">
                <input type="text" name="username" placeholder="Enter user's name" required>
                <button>Search</button>
            </form>
        </div>

        <div class="users">

            

       <?php 
       if($QUERY -> num_rows == 0){
        echo "no records";
       }

       else{

        while($res = mysqli_fetch_assoc($QUERY)){

            echo '
            <a href="user.php?name='.$res['name'].'&email='.$res['email'].'"><div class="user">
            <b>'.$res['name'].'</b>
            </div></a>
            ';
        }
       }
       ?>

            
                
            
       

        <!-- php -->

        <?php

           
        ?>
        
        </div>
     </div>
      
     </main> 
    
    
</body>
</html>