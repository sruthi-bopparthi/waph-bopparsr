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
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile Page</h1>
         <form action="editprofile.php" method="POST">
         <div class="mainContainer">
         <label for="username">Username : </label> <?php echo htmlentities($_SESSION['username']);?>
               <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
               <br><br>
               <label for="newname">New Name : </label>
                <input type="text" name="newname" required>
             
               <label for="newemail">New Email : </label>
                <input type="email" name="newemail" required>
             <br><br>
             <button type="submit">Update Profile</button>
             </div>
         </form>
        </div>
    </body>
</html>