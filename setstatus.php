<?php  
$bookingid = $_GET['bookingid'];

// select details

$SELECT = "SELECT department, Customer, Date, Time from booking where id=$bookingid";
include './connection.php';
$QUERY = mysqli_query($connection, $SELECT);
$RES = mysqli_fetch_assoc($QUERY);


if(isset($_GET['decision'])){

    $decision = $_GET['decision'];
    $update;

    if($decision == 'accept'){
      $update = "UPDATE booking SET status = 'Approved' WHERE id = $bookingid";
    }
    else{
    $update = "UPDATE booking SET status = 'Declined' WHERE id = $bookingid";
    }

    if(mysqli_query($connection, $update)){
    echo '
      <script>alert("Status has been changed")</script>
    ';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signin.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>Set status|ticketter</title>
    <style>
       
    </style>

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
            <img src="./images/logo.png" alt="e-invte logo">
            <p>Set -<span style="color:#259969">Status</span> </p>
        </div>

      <center>  <table>
            
              <tr><td><b>Department:</b> <?php echo $RES['department']?></td></tr>
              <tr><td><b>User:</b> <?php echo $RES['Customer']?></td></tr>
              <tr><td><b>Date:</b> <?php echo $RES['Date']?></td></tr>
              <tr><td><b>Time:</b> <?php echo $RES['Time']?></td></tr>
                
            
           </table>
     </center>
        <div class="input">
           

            <form action="#" method="get">
                <input name="bookingid" type="hidden" value="<?php echo $bookingid ?>"/>
                <button name="decision" value="accept">Accept</button>
                <button name="decision" value="decline" style="background-color: red;">Decline</button>
            </form>
           
        </div>
        
        
        

        <!-- php -->

        <?php

            if(isset($_GET['set'])){
                include 'connection.php';
                $id = $_POST['id'];
                
                
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