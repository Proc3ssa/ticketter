

<!DOCTYPE html>
<html lang="en">
<head>
<script>
// Function to go to the previous page
function goBack() {
    window.history.back();
}
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>singin |forgotten password</title>
    <style>
        #errornumber{
            display:none;
        }
    </style>
</head>
<body>
    <main class="main">
        <div class="top">
        <button class="back" onclick="goBack()"><- Back</button>
       
        <div class="image simage">
            <img src="../images/logo.png" alt="e-invte logo">
            <p>Password -<span style="color:#259969">Reset</span> </p>
        </div>

        <div class="input">
            
            <form action="#" method="post" >
                <p style="color:red;" id="errornumber">Number is unknown</p>
                
            <input type="number" name="number" placeholder="Enter number" required>

            <div id="button">
            <button type="submit" name='tel'>Next</button><p></p>
           
            
            </div>
            </form>


        <!-- php -->


        <?php

if(isset($_POST['tel'])){
    include '../connection.php';
    $number = $_POST['number'];

    // check number 

    $SELECT = "SELECT count(*) FROM users where number = '$number'";
    $QUERY = mysqli_query($connection, $SELECT);
    $RES = mysqli_fetch_assoc($QUERY);

    echo $RES['count'];
    if($RES['count(*)'] > 0){
        session_start();
        $_SESSION['number'] = $number;
        header("location:code.php");
    }

    else{

        echo '
        <style>
          #errornumber{
             display:block;
          }
          
        </style>
        ';

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