<?php
if(!isset($_GET['ticketid']) or $_GET['ticketid'] == ""){
   echo "error: bad gateway";
}
else{
    include './connection.php';
$ticketid = $_GET['ticketid'];

// verify id

$SELECT = "SELECT *FROM tickets where ticket_id = $ticketid";
$QUERY = mysqli_query($connection, $SELECT);
$RES = mysqli_fetch_assoc($QUERY);

if($QUERY -> num_rows != 0){
    if($RES['status'] == "Notvisited"){//if not visited
      
        $UPDATE = "UPDATE tickets set status = 'Visited' where ticket_id = $ticketid";

         if(mysqli_query($connection, $UPDATE)){// update status

            $message = "<b style='color:green'>Success, Ticket is valid</b>";

         }
         else{//could not update status
            $message = "<b style='color:red'>Something happend, scan ticket again.</b>";

         }

    }
    else{//if visited
        $message = "<b style='color:red'>Ticket has already been used</b>";
    }
}
else{ // id error
   $message = "<b style='color:red'>Invalid ticket</b>";
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
            
           <p>Message: <?php echo $message ?></p>
       

        
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