
<?php 
session_start();
if(!isset($_SESSION['number'])){
    header('location:login.php');
}

$number = $_SESSION['number'];
$code = 7865;
$SMS = "$code is your verification code.";

function replaceSpaces($text) {
    return str_replace(' ', '%20', $text);
  }
  
  function new_sms($SMS, $number){
   $url = 'https://sms.arkesel.com/sms/api?action=send-sms&api_key=dWd6Vk9xSXNkVUpTUElpR2JweUQ&to='.$number.'&from=E-ticket&sms='.$SMS.'';
  
   $formatedUrl = replaceSpaces($url);
  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $formatedUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
  
    if($response === false) {
          echo 'Error: ' . curl_error($ch);
          // echo '<p></p>'.$formatedUrl;
      }

      else{
        // echo $formatedUrl;
      }

    curl_close($ch);
  
  }

  new_sms($SMS, $number);

?>
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
        #error{
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
                <p style="color:red;" id="error">Incorrect code</p>
                <p>Verification code has been sent to your phone.</p>
            <input type="number" name="code" placeholder="Enter code" required>

            <div id="button">
            <button type="submit" name='verify'>Verify</button><p></p>
           
            
            </div>
            </form> 
       

        <!-- php -->

        <?php

if(isset($_POST['verify'])){
    include '../connection.php';
    $code1 = $_POST['code'];


    if($code1 == $code){
        header("location:newpassword.php");
    }

    else{

        echo '
        <style>
          #error{
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