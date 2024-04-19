<?php
	require "session_auth.php";
	$rand = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION["nocsrftoken"]=$rand;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Change Password Form</title>
</head>
<body>
    <h1>Change Password Form, WAPH</h1>
         <form action="changepassword.php" method="POST">
            <div class="mainContainer">
               <label for="username">Username : </label> <?php echo htmlentities($_SESSION['username']);?>
               <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
               <br><br>

               <label for="password">Password : </label>
                <input type="password" name="newpassword" required>
             
                
                <button type="submit">Change Password</button>
               </div>
         </form>
        </div>
    </body>
</html>