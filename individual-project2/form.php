 <!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Login Form, WAPH
         </div>
         <?php
		         echo "Visited time: ".date("Y-m-d h:i:sa")
	         ?>
         <p>Sruthi Sridhar Bopparthi</p>
         <form action="index.php" method="POST" class="form login">
            <div class="field">
               <input type="text" name="username" required>
               <label>Username</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <label>Password</label>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="registrationform.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>