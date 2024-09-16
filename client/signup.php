
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
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
            <img src="../images/logo.png" alt="e-invte logo">
            <p>User -<span style="color:#259969">Signup</span> </p>
        </div>

        <div class="input">
            
            <form action="#" method="post">
                <p style="color:red;" id="error">Account already exist</p>
            <input type="text" name="name" placeholder="Name" required>   
            <input type="email" name="email" placeholder="email" required>
            <input type="number" name="number" placeholder="Tel. number" required>
            <input type="password" name="password" placeholder="password" required limit="6">
            <div id="button">
            <button type="submit" name='register'>Register</button>
            </div>
            Already have an account? <a href="login.php">login</a>
        </form>
       

        <!-- php -->

        <?php

            if(isset($_POST['register'])){
                include '../connection.php';
                $id = rand(9999,10000);
                $name = $_POST['name'];
                $email = $_POST['email'];
                $number = $_POST['number'];
                $password = $_POST['password'];

                $SELECT = "SELECT count(*) as adin from users where email='$email' and password='$password'";

                $query = mysqli_query($connection, $SELECT);
                $res = mysqli_fetch_assoc($query);

                if($res['adin'] > 0){

                    echo '
                      <style>
                        #error{
                            display:block;
                        }
                      </style>
                    ';
                    
                }

                else{

                    $INSERT = "INSERT INTO users values($id,'$name', '$email', '$number', '$password', 'notverified' )";

                    if(mysqli_query($connection, $INSERT)){
                        
                        session_start();

                        $_SESSION['userid'] = $id;
                        $_SESSION['number'] = $number;
                        header('location:smsverify.php');
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