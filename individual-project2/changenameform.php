<?php
	require "session_auth.php";
   $rand = bin2hex(openssl_random_pseudo_bytes(16));
   $_SESSION["nocsrftoken"]=$rand;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>WAPH - Change Name  </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Change Name Form, WAPH
         </div>
         <p>Sruthi Sridhar Bopparthi</p>
         <p>
            <?php
		         echo "Visited time: ".date("Y-m-d h:i:sa")
	         ?></p>
         <form action="changename.php" method="POST" class="form login">
            <p>
               Username : </p> <?php echo htmlentities($_SESSION['username']);?>
               <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
               <p><?php echo $rand?></p>
               <p><?php echo $_SESSION["nocsrftoken"]?></p>
            </div>
            <br>
            <div class="field">
                <input type="text" name="newname" required>
                <label>New Name</label>
             </div>
             <div class="field">
                <input type="submit" value="Change Name">
             </div>
         </form>
        </div>
    </body>
</html>
<?php
	$rand = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION["nocsrftoken"]=$rand;
?>
