<?php
$customer = $_GET['customer'];
$department = $_GET['department'];
$numberoftickets = $_GET['numberoftickets'];
$date = $_GET['date'];
$ticketid = $_GET['ticketid'];
$server = $_SERVER['SERVER_NAME'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket</title>
  <link rel="stylesheet" href="ticket.css">
  <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">

  <script>

function printDiv() {
  document.getElementById('button').style.display = 'none';
    print();
}


  </script>
</head>
<body>


<div class="ticket" id="ticket">
  <div class="head">
    <img src="../images/logo.png" alt="logo">

    <a><p>Department</p><span><?php echo $department ?></span></a>
  </div>
  <hr>

  <div class="middle">
  <h3><?php echo $ticketid ?></h3>
  <p>Electronic Ticket</p>
  <div class="qrcode">
  <img align="center" border="0" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo 'http://'.$server.'/auth.php?ticketid='.$ticketid ?>" alt="qrcode" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both; !important;border: none;height: auto;float: none;width: 100%;max-width: 480px;" width="280" />
  </div>

  
</div>
<p align="center" style="color:white"><?php echo $customer?></p>
<hr>

<div class="bottom">
  <a>Tickets:<b><?php echo $numberoftickets ?></b></a>
  <a>Date:<b><?php echo $date ?></b></a>

</div>
</div>

<div class="button" id="button">
  <button onclick="printDiv('ticketid')">Print</button>
</div>



  
</body>


</html>
