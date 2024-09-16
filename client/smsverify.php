<?php

session_start();
$userId = $_SESSION['userid'];
$number = $_SESSION['number'];
$SMS = "$userId is your verification code.";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>account verification |ticketter</title>
    <script>
    // Check if the form has been submitted
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
   </script>

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
            <img src="../images/logo.png" alt="e-invte logo">
            <p>User -<span style="color:#259969">Verify number</span> </p>
        </div>

        <div class="input">
            
            <form action="#" method="post">
                <p style="color:red;" id="error">Incorrect code</p>
                A code has been sent to your phone, enter the code
            <input type="number" name="code" placeholder="Enter code" required>   
           <p></p>
            <button type="submit" name='verify'>Verify</button>
            
            <center style="margin-top:30px">Did not receive code? <a href="smsverify.php">Resend code</a></center>
        </div>
    </form>
       

        <!-- php -->

        <?php

           


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
              




            if(isset($_POST['verify'])){
                include '../connection.php';
                
                $code = $_POST['code'];
               

                if($code !=  $userId){

                    echo '
                      <style>
                        #error{
                            display:block;
                        }
                      </style>
                    ';
                    
                }

                else{

                    $UPDATE = "UPDATE users SET status = 'verified' WHERE number = '$number'";
                    if(mysqli_query($connection, $UPDATE)){
                        echo '<script>

                        alert("Account has been verified.");

                        
                        window.location.href = "login.php";
                        
                        </script>';
                    }
                    else{
                        echo '<script>

                        alert("something went wrong, try again after some time")
                        </script>';
                    }
                    
                    
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