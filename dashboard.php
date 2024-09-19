<?php
 include 'connection.php';
 session_start();
     $admin = $_SESSION['admin'];
     if($admin == ""){
       // echo '<script>alert("'.$admin.'")</script>';
     header("location: signin.php");
    }

    $SELECT = "SELECT *FROM departments LIMIT 7";
    $query = mysqli_query($connection, $SELECT);

    // graphs 
    // visits
    $visits = ' SELECT
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-01-%" THEN 1 END) AS january,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-02-%" THEN 1 END) AS february,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-03-%" THEN 1 END) AS march,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-04-%" THEN 1 END) AS april,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-05-%" THEN 1 END) AS may,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-06-%" THEN 1 END) AS june,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-07-%" THEN 1 END) AS july,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-08-%" THEN 1 END) AS august,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-09-%" THEN 1 END) AS september,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-10-%" THEN 1 END) AS october,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-11-%" THEN 1 END) AS november,
        COUNT(CASE WHEN status = "Visited" AND date LIKE "%-12-%" THEN 1 END) AS december

        FROM tickets ';
      
        $result = $connection->query($visits);
        $row = $result->fetch_assoc();


      //  sales

      $sales = "SELECT
      MONTH(date) AS month,
      SUM(amount) AS total_amount
          FROM
      tickets
          GROUP BY
      MONTH(date)";

      $sresult = $connection -> query($sales);

      
      
  

        
        


    
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
    <link rel="stylesheet" href="./css/style.css" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          
          
          ['Month', 'Sales' ],

          <?php

              while($values = $sresult->fetch_assoc()){
                      echo '["'.$values["month"].'",  '.$values["total_amount"].',],';
              }
             
          ?>

          
          // ['Feb.',  1170,],
          // ['Mar.',  660,],
          // ['Apr.',  1030,],
          // ['May.',  0,],
          // ['Jue.',  0,],
          // ['Jul.',  0,],
          // ['Aug.',  0,],
          // ['Sep.',  0,],
          // ['Oct.',  0,],
          // ['Nov.',  0,],
          // ['Dec.',  0,]
          
        ]);

        var options = {
          title: 'Sales (GHc)',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('sales'));

        chart.draw(data, options);
      }


      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawBasic);

      function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Visits');

      data.addRows([

        

        [{v: [8, 0, 0], f: 'Jan'}, <?php echo $row['january']?>],
        [{v: [9, 0, 0], f: 'Feb'}, <?php echo $row['february']?>],
        [{v: [10, 0, 0], f:'Mar'}, <?php echo $row['march']?>],
        [{v: [11, 0, 0], f: 'Apr'}, <?php echo $row['april']?>],
        [{v: [12, 0, 0], f: 'May'}, <?php echo $row['may']?>],
        [{v: [13, 0, 0], f: 'Jun'}, <?php echo $row['june']?>],
        [{v: [14, 0, 0], f: 'Jul'}, <?php echo $row['july']?>],
        [{v: [15, 0, 0], f: 'Aug'}, <?php echo $row['august']?>],
        [{v: [16, 0, 0], f: 'Sep'}, <?php echo $row['september']?>],
        [{v: [17, 0, 0], f: 'Oct'}, <?php echo $row['october']?>],
        [{v: [17, 0, 0], f: 'Nov'}, <?php echo $row['november']?>],
        [{v: [16, 0, 0], f: 'Dec'}, <?php echo $row['december']?>]
      ]);

      var options = {
        title: 'Visits',
        hAxis: {
          title: '',
          format: '',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('visits'));

      chart.draw(data, options);
    }
    </script>

  </head>
  <body>
    <nav>
      <a href="#home" id="logo"><img src="./images/logo.png"></a>
      <input type="checkbox" id="hamburger" />
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul>
        <li>
          <a href="#home" class="active">Dashboard</a>
        </li>


        <li>
          <a href="bookings.php">Bookings</a>
        </li>

        <?php
        if($admin == "admin@tickets.com"){
           echo '<li id="conditional">
          <a href="addadmin.php">Add Admin</a>
        </li> ';
        } 
        ?> 

<li>
          <a href="users.php">Users</a>
        </li>
        
      </ul>
    </nav>
    <h2>Departments</h2>
    
    <div class="departments">

    <?php
   

       while($res = mysqli_fetch_assoc($query)){

        echo '
        <div class="department" style="background-image: url(./images/'.$res['image'].'); background-repeat:round">

        <div class="empty">
        </div>

        <div class="eventdetails">
          <p>'.$res['name'].'</p>
          <a href="department.php?id='.$res['id'].'&name='.$res['name'].'"><button>View</button></a>
        </div>

        </div>

        ';
       }

     

    ?>
   
      

      
      
      
     

      </div>







    <!-- graphs -->
 <h1 id="h1">Metrics - 2024</h1>
    <div class="graphs">
     
      <div class="visits" id="visits">
        <h2>Visits</h2>

      </div>


      <div class="sales" id="sales">
        <h2>Sales</h2>

      </div>
    </div>
    <footer>
      <p>Copyright 2024</p>
  </footer>
  </body>
</html>
