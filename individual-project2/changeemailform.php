<?php
	require "session_auth.php";
   $rand = bin2hex(openssl_random_pseudo_bytes(16));
   $_SESSION["nocsrftoken"]=$rand;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>WAPH - Change password  </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Change Email Form, WAPH
         </div>
         <p>Sruthi Sridhar Bopparthi</p>
         <p>
            <?php
		         echo "Visited time: ".date("Y-m-d h:i:sa")
	         ?></p>
         <form action="changeemail.php" method="POST" class="form login">
            <div class="field">
               <label>Username : </label> <?php echo htmlentities($_SESSION['username']);?>
               <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
            </div>
            <div class="field">
                <input type="text" name="newemail" required>
                <label>New Email</label>
             </div>
             <div class="field">
                <input type="submit" value="Change Email">
             </div>
         </form>
        </div>
    </body>
</html>
<?php
	$rand = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION["nocsrftoken"]=$rand;
?>
