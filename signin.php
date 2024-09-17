
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
            <p>Admin -<span style="color:#259969">login</span> </p>
        </div>

        <div class="input">
            
            <form action="#" method="post">
                <p style="color:red;" id="error">password or password error</p>
                
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="password" required limit="6">
            <div id="button">
            <button type="submit" name='login'>Login</button><p></p>
            
            
            </div>
        </form>
       

        <!-- php -->

        <?php

            if(isset($_POST['login'])){
                include 'connection.php';
                $email = $_POST['email'];
                $password = $_POST['password'];

                $SELECT = "SELECT count(*) as adin from admin where email='$email' and password='$password'";

                $query = mysqli_query($connection, $SELECT);
                $res = mysqli_fetch_assoc($query);

                if($res['adin'] != 1){

                    echo '
                      <style>
                        #error{
                            display:block;
                        }
                      </style>
                    ';
                    
                }

                else{
                    session_start();
                    $_SESSION['admin'] = $email;
                    header("location: dashboard.php");
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