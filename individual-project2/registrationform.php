<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Registration Form </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Registration Form, WAPH
            
         </div>

            <?php
		         echo "Visited time: ".date("Y-m-d h:i:sa")
	         ?>

         <p>Sruthi Sridhar Bopparthi</p>
         <form action="addnewuser.php" method="POST" class="form login">
         	<div class="field">
               <input type="text" name="name" pattern="\w+" required>
               <label>Name</label>
            </div>
         	<div class="field">
               <input type="text" name="email" pattern="^[\w.-]+@[\w-]+(\.[\w-]+)*$" title="Please enter valid email" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');" required>
               <label>Email</label>
            </div>
            <div class="field">
               <input type="text" name="username" pattern="\w+" required>
               <label>Username</label>
            </div>
            <div class="field">
               <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$"  title="Password much have at least 8 characters with 1 special symbol !@#$%^& 1 number, 1 lowercase and 1 UPPERCASE" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:''); form.confirmpassword.pattern = this.value;" required />
               
               <label>Password</label>
            </div>

            <div class="field">
               <input type="password" name="confirmpassword" required title="Password does not match" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/>
               <label>Confirm Password</label>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Already a member? <a href="form.php">Login now</a>
            </div>
         </form>
      </div>
   </body>
</html>