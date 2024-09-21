
<?php
include 'connection.php';
session_start();
    $admin = $_SESSION['admin'];
    if($admin == ""){
      header("location: signin.php");
   }

   $email = $_GET['email'];
   $username = $_GET['name'];
   //fetch
   $tickets = "SELECT * FROM tickets where contact = '$email'";
   $QUERY = mysqli_query($connection, $tickets);

   $booking = "SELECT * FROM booking where contact = '$email'";
   $bQUERY = mysqli_query($connection, $booking);

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
       
        <div class="imag image">
            
            <h2><?php echo $username?></h2>
        </div>

        <div class="userdata">
<h2>Tickets</h2>
            

       <?php 
       if($QUERY -> num_rows == 0){
        echo "no records";
       }

       else{

        echo '
        
            <table>
            <tr>
                <th>Date </th>
                <th>Department</th>
                <th>Number of tickets</th>
                <th>Status </th>
                <th>Ticket</th>
            </tr>
        ';

        while($res = mysqli_fetch_assoc($QUERY)){
            
                
               echo '
               <tr> 
               <td>'.$res['date'].'</td>
                <td>'.$res['department'].'</td>
                 <td>'.$res['numberoftickets'].'</td>
                  <td>'.$res['status'].'</td>

                   <td><a href="ticket/index.php?customer='.$res['name'].'&department='.$res['department'].'&numberoftickets='.$res['numberoftickets'].'&date='.$res['date'].'&ticketid='.$res['ticket_id'].'">view</a></td>
                   </tr>
               ';


           
        }
       }
       ?>

            
</table>

<h2>Bookings</h2>
            
                
            
       

        <!-- php -->

        <?php
 if($bQUERY -> num_rows == 0){
    echo "no records";
   }

   else{

    echo '
    <table>
            <tr>
                <th>Date </th>
                <th>Department</th>
                <th>Time</th>
                <th>Status </th>
                
            </tr>
    ';

    while($res = mysqli_fetch_assoc($bQUERY)){
        
            
           echo '
           <tr> 
           <td>'.$res['Date'].'</td>
            <td>'.$res['department'].'</td>
             <td>'.$res['Time'].'</td>
              <td>'.$res['status'].'</td>

               
               </tr>
           ';


       
    }
   }
           
        ?>
            </table>
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