
<?php
ini_set('display_errors', 0);

$ticketid = $_GET['ticketid'];

// var_dump($_SERVER);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signin.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>singin |ticketter</title>
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
            <img src="./images/logo.png" alt="e-invte logo">
            <p>Admin -<span style="color:#259969">Ticket verification</span> </p>
        </div>

        <div class="input">
            
            <form action="#" method="post">
               
            <input type="password" name="code" placeholder="Enter admin code" required limit="6">
            <div id="button">
            <button type="submit" name='login'>Next</button>
            </div>
        </form>
       
        <!-- php -->
        <?php
          if(isset($_POST['login'])){
            
            if($_POST['code'] == 7000){
                header("location:verify.php?ticketid=$ticketid");
            }
            else{
                echo '<script>alert("Wrong code")</script>';

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