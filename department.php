<?php
 include 'connection.php';
 session_start();
     $admin = $_SESSION['admin'];
     if($admin == ""){
       // echo '<script>alert("'.$admin.'")</script>';
     header("location: signin.php");
    }
      $id = $_GET['id'];
      $date = date('Y-m-d');
      $name = $_GET['name'];

      // visits 

      $VISITS = "SELECT count(*) as visits FROM tickets where id=$id and Month(date) = Month('$date') and status = 'Visited'";

      // echo $VISITS;

      $query = $connection -> query($VISITS);
      $res = $query -> fetch_assoc();

      // echo $VISITS;

      // sales 

      $SALES = "SELECT sum(amount) as amount from tickets where id=$id and Month(date) = Month('$date')";

      $queryS = $connection -> query($SALES);
      $resS = $queryS -> fetch_assoc();
      $amount = $resS['amount'];

      // price 

      $PRICE = "SELECT price from departments where id = $id";
      $queryP = $connection -> query($PRICE);
      $resP = $queryP -> fetch_assoc();
      $price = $resP['price'];

      $actualPrice = $price * $amount;

      //get month function
      function getMonthFromDate($dateString) {
        // Convert the date string to a UNIX timestamp
        $timestamp = strtotime($dateString);
        
        // Get the month from the UNIX timestamp
        $month = date('F', $timestamp);
        
        return $month;
    }

    //get yearly vists

    $yVisits = "SELECT count(*) as visits, date  from tickets where id = $id and status = 'Visited' GROUP BY date;";

    $yQuery = mysqli_query($connection, $yVisits);

    // get yearly sales

    $ySales = "SELECT SUM(amount) AS amount , date as date  FROM tickets WHERE id = $id group by date ";
    $ysQuery = mysqli_query($connection, $ySales);
    


      


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
    <link rel="stylesheet" href="./css/department.css" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales' ],

          <?php
         
         while($ysRe = mysqli_fetch_assoc($ysQuery)){
          $dat2 = $ysRe['date'];
          $value2 = $ysRe['amount'];
          (int)$realAmount = (int)$value2 * (int)$price;

          echo "
              ['".getMonthFromDate($dat2)."', ".$ysRe['amount'].", ],
          ";

         }

         ?>




          // ['Jan.',  1000,],
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
          title: 'Sales (GHc) This year',
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
      data.addColumn('number', 'number of visits');

      data.addRows([

        <?php 

        while($yRes = mysqli_fetch_assoc($yQuery)){
          $month = $yRes['date'];
          $value = $yRes['visits'];
        echo '
          [{v: [9, 0, 0], f: "'.getMonthFromDate($month).'"}, '.$value.'],
          ';
        }
         
          ?>
        
        // [{v: [9, 0, 0], f: 'Jan'}, 2],
        // [{v: [10, 0, 0], f:'Jan'}, 3],
        // [{v: [11, 0, 0], f: 'Jan'}, 4],
        // [{v: [12, 0, 0], f: '12 pm'}, 5],
        // [{v: [13, 0, 0], f: '1 pm'}, 6],
        // [{v: [14, 0, 0], f: '2 pm'}, 7],
        // [{v: [15, 0, 0], f: '3 pm'}, 8],
        // [{v: [16, 0, 0], f: '4 pm'}, 9],
        // [{v: [17, 0, 0], f: '5 pm'}, 10],
        // [{v: [16, 0, 0], f: '4 pm'}, 9],
        // [{v: [17, 0, 0], f: '5 pm'}, 12],
      ]);

      var options = {
        title: 'Visits This year',
        hAxis: {
          title: '',
          format: '',
          viewWindow: {
            min: [5, 30, 0],
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
    <script>
// Function to go to the previous page
function goBack() {
    window.history.back();
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
          <a href="department.php" class="active">Department</a>
        </li>
        <li>
          <a href="dashboard.php">Dashboard</a>
        </li>

      

        <li>
            <a href=<?php echo '"tickets.php?id='.$id.'"'; ?> >Tickets</a>
          </li>
        
      </ul>
    </nav>
    <button class="back" onclick="goBack()"><- Back</button>
    <h2 id="h11"><?php echo $name?></h2>

    <div class="sinfo">
        <table>
            <tr>
                <td>Visits this month</td>
                <td>Sales this month</td>
            </tr>
            <tr>
                <td id="figs" style="color: red;"><?php echo $res['visits'] ?></td>
                <td id="figs" style="color: green;">GHc<?php echo  $amount ?></td>
            </tr>
        </table>
    </div>

    <!-- graphs -->
    <div class="graphs">
        <div class="visits" id="visits"></div>
        <div class="sales" id="sales"></div>
    </div>

  
    <footer>
        <p>Copyright 2024</p>
    </footer>
  </body>
</html>
