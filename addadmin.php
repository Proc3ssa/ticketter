
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signin.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>Add Admin |ticketter</title>
    <style>
        #error{
            display:none;
        }
    </style>
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
       
        <div class="image simage">
            <img src="./images/logo.png" alt="e-invte logo">
            <p>Add -<span style="color:#259969">Admin</span> </p>
        </div>

        <div class="input">
            
            <form action="#" method="post">
            <p style="color:red;" id="error">Admin Already exist</p>

            <label for="title">Title</label><p></p>
            <select name="title" required>
                <option value="">--select--</option>
                <option value="supervisor">Supervisor</option>
                <option value="accountant">Accountant</option>
                <option value="security">Security</option>
            </select>
                
            <input type="email" name="email" placeholder="Enter email" required>
            <input type="password" name="password" placeholder="password" required limit="6">
            <div id="button">
            <button type="submit" name='add'>Add</button>
            </div>
        </form>
        

        <!-- php -->

        <?php

            if(isset($_POST['add'])){
                include 'connection.php';
                $email = $_POST['email'];
                $title = $_POST['title'];
                $password = $_POST['password'];
                $id = rand(0,9);

                $SELECT = "SELECT count(*) as adin from admin where email='$email' and password='$password'";

                $query = mysqli_query($connection, $SELECT);
                $res = mysqli_fetch_assoc($query);

                if($res['adin'] == 1){

                    echo '
                      <style>
                        #error{
                            display:block;
                        }
                      </style>
                    ';
                    
                }

                else{
                   $INSERT = "INSERT INTO admin values($id, '$title', '$email', '$password')";

                   if(mysqli_query($connection, $INSERT)){
                      echo "<script>alert('New Admin added')</script>";
                   }
                   else{
                    echo "<script>alert('Error adding new admin, try again after some time')</script>";
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