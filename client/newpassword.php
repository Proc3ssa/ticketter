
<?php 
session_start();
if(!isset($_SESSION['number'])){
    header('location:login.php');
}

$number = $_SESSION['number'];

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>singin |forgotten password</title>
    <style>
        #error{
            display:none;
        }
    </style>
</head>
<body>
    <main class="main">
        <div class="top">

       
        <div class="image simage">
            <img src="../images/logo.png" alt="e-invte logo">
            <p>Password -<span style="color:#259969">Reset</span> </p>
        </div>

        <div class="input">
            
            
            <form action="#" method="post">
                <p style="color:red;" id="error">Error setting new password.</p>
                
            <input type="password" name="password" placeholder="Enter new password" required>

            <div id="button">
            <button type="submit" name='finish'>Finish</button><p></p>
           
            
            </div>
            </form>
       

        <!-- php -->
        <?php

if(isset($_POST['finish'])){
    include '../connection.php';
    $password = $_POST['password'];

    // check number 

    $UPDATE = "UPDATE users set password = '$password' where number = '$number'";
    $QUERY = mysqli_query($connection, $UPDATE);
    

    echo $UPADTE;
    if($QUERY){

       echo '
       <script>
       alert("new password has been set");

       window.location.href="login.php";

       </script>
       ';

       echo $UPADTE;
    }

    else{

        echo '
        <style>
          #error{
             display:block;
          }
          
        </style>
        ';

        echo $UPADTE;

    }


}

?>

        
        
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