<?php
    include 'connection.php';
    session_start();
        $admin = $_SESSION['admin'];
        if($admin == ""){
          // echo '<script>alert("'.$admin.'")</script>';
        header("location: signin.php");
        
        
       }

       if($_GET['id'] != ""){

        $id = $_GET['id'];
        $DEPARTMENT = "SELECT name from departments where id = $id limit 1";

        $Dquery = mysqli_query($connection, $DEPARTMENT);
        $resD = mysqli_fetch_assoc($Dquery);
       }

       $title = $_SESSION['title'];

        

        // echo $DEPARTMENT;

       if(isset($_GET['date'])){
        $date = $_GET['date'];
        $id = $_GET['id'];

        
          $SELECT = "SELECT status, customer, numberoftickets, contact, date, department  FROM tickets where date = '$date' and id = $id"; 

          if($title == "accountant"){
            $SELECT = "SELECT status, customer, numberoftickets, contact, date, department  FROM tickets where date = '$date'"; 
          }
        
         
       }
       elseif(isset($_GET['name'])){
        $name = $_GET['name'];
        $id = $_GET['id'];
        $SELECT = "SELECT status, customer, numberoftickets, contact, date, department  FROM tickets where customer LIKE '%$name%' or contact LIKE '%$name%' or department LIKE '%$name%' and id = $id";
       }
       elseif(isset($_GET['id'])){
          $id = $_GET['id'];
          $SELECT = "SELECT status, ticket_id, customer, numberoftickets, contact, date, department FROM tickets where id = $id";
         }

         else{
          $SELECT = "SELECT status, ticket_id, customer, numberoftickets, contact, date, department FROM tickets";
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

    <script>
// Function to go to the previous page
function goBack() {
    window.history.back();
}
</script>

  </head>
  <body>
    <nav>
      <a href="#home" id="logo"><img src="./images/logo.png"></a> <b style="color:white"><?php  echo $_SESSION['title']?></b>
      <input type="checkbox" id="hamburger" />
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul>
        <li>
          <a href="bookings.php" >Bookings</a>
        </li>
        <li>
            <a href="dashboard.php" class="">Departments</a>
          </li>

        <li>
            <a href="" class="active">Tickets</a>
          </li>
        
      </ul>
    </nav>
    <button class="back" onclick="goBack()"><- Back</button>
    <h2 id="h11">Tickets Info. <?php if(isset($_GET['id'])){ echo $resD['name'];}?></h2>

   <!-- query -->
   <div class="query">
        <form action="#" method="get">
            <a for="date">Specify by date</a>
            <input type="date" name="date" id="date" required>
            <input type="hidden" name="id" value=<?php echo "$id"?>>
            <button name="view" type="submit">View</button>
        </form>

        <form action="#" method="get">
            <a for="date">Search by customer's name, contact or event </a>
            <input type="text" name="name" id="date" required>
            <input type="hidden" name="id" value=<?php echo "$id"?>>
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
            <th>Status</th>
            <th>Person</th>
            <th>No. of tickets</th>
            <th>Date</th>
            <th>Contact</th>
            <?php 
             if($title == "accountant"){
              echo '
              <th>Price (GHc)</th>
              ';
             }
             else{
              echo ' <th></th>';
             }
            ?>
            
        </tr>

        <?php
          
          while($res = mysqli_fetch_assoc($query)){
            $ctype;
            
            if($title == "accountant"){
             $ctype = 25*$res['numberoftickets'];

             $total = $ctype + $total;

            }
            else{
               $ctype = '<a href="ticket/index.php?customer='.$res['name'].'&department='.$res['department'].'&numberoftickets='.$res['numberoftickets'].'&date='.$res['date'].'&ticketid='.$res['ticket_id'].'">View</a>';
            }

            echo '
                <tr>
                      <td>'.$res['status'].'</td>
                      <td>'.$res['customer'].'</td>
                      
                      <td>'.$res['numberoftickets'].'</td>
                      <td>'.$res['date'].'</td>
                      <td>'.$res['contact'].'</td>
                      <td>'.$ctype.'</td>
                  </tr>
                ';
          }

          if($title == "accountant"){
            echo '<tr>
            <td><b>Total: GHc'.$total.'</b></td></tr>
            ';
          }

        ?>

       

        
    </table>
    <center id="hide3" style="margin-top: 10px;"><button  style="width:90px; height:30px; border:none; color:white; background-color:blue; border-radius:5px" onclick="printDiv()">Print</button></center>
    
    </div>
    
  

  
    <footer>
        <p>Copyright 2024</p>
    </footer>
  </body>
</html>
