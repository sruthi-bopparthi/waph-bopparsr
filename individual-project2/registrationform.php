<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    
    <title>Registration Form</title>
</head>
<body>
    <h1>Registration Form, WAPH</h1>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
         <form action="addnewuser.php" method="POST" onsubmit="return validateForm();">
            <label for="name">Your Name</label>
            <input type="text" placeholder="Enter Name" name="name" pattern="\w+" required>
            <div class="error" id="name_error">Name is required</div>
            

            <label for="email">Your Email</label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <div class="error" id="email_error">Valid email is required</div>
            

            <label for="username">Your username</label>
            <input type="text" placeholder="Enter Username" name="username" pattern="\w+"  required>
            <div class="error" id="username_error">Username is required</div>
            

            <!-- Password -->
            <label for="password">Your password</label>
            <input type="password" placeholder="Enter Password" pattern="^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$"  title="Password much have at least 8 characters with 1 special symbol !@#$%^& 1 number, 1 lowercase and 1 UPPERCASE" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:''); form.confirmpassword.pattern = this.value;"  name="password" required>
            <div class="error" id="password_error">Password requirements not met</div>
            

            <label for="confirmpassword">Re-enter Password</label>
            <input type="password" placeholder="Re-enter Password"  title="Password does not match" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"  name="confirmpassword" required>
            <div class="error" id="confirmpassword_error">Passwords do not match</div>

            <button type="submit" formnovalidate>Submit</button>
            <div class="signup-link">
               Already a member? <a href="form.php">Login now</a>
            </div>
         </form>
      </div>
      <script>
         function validateForm() {

             var name = document.getElementsByName("name")[0].value.trim();
             var email = document.getElementsByName("email")[0].value.trim();
             var username = document.getElementsByName("username")[0].value.trim();
             var password = document.getElementsByName("password")[0].value.trim();
             var confirmPassword = document.getElementsByName("confirmpassword")[0].value.trim();
             var isValid = true;

             // Reset error messages
             document.getElementById("name_error").style.display = "none";
             document.getElementById("email_error").style.display = "none";
             document.getElementById("username_error").style.display = "none";
             document.getElementById("password_error").style.display = "none";
             document.getElementById("confirmpassword_error").style.display = "none";
         
             // Validate name
             if (name === "") {
                 document.getElementById("name_error").style.display="block";
                 console.log("Inside name error");
                 isValid = false;
             }
         
             // Validate email
             if (email === "" || !isValidEmail(email)) {
               console.log("Inside email error");
                 document.getElementById("email_error").style.display = "block";
                 isValid = false;
             }
         
             // Validate username
             if (username === "") {
                 document.getElementById("username_error").style.display = "block";
                 isValid = false;
             }
         
             // Validate password
             if (password === "" || !isValidPassword(password)) {
                 document.getElementById("password_error").style.display = "block";
                 isValid = false;
             }
         
             // Validate confirm password
             if (confirmPassword === "" || confirmPassword !== password) {
                 document.getElementById("confirmpassword_error").style.display = "block";
                 isValid = false;
             }
         
             return isValid;
         }
         
         function isValidEmail(email) {
             // var emailRegex = new RegExp(/^\S+@\S+\.\S+$/);
         	var emailRegex = new RegExp(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
             console.log(emailRegex);
             // console.log(emailRegex);s
             console.log(emailRegex.test(email));
             return emailRegex.test(email);
         }
         
         function isValidPassword(password) {
             // Password must have at least 8 characters with at least one uppercase letter, one lowercase letter, one number, and one special character
             var passwordRegex = new RegExp(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/);
             // console.log(password);
             // console.log(passwordRegex);
             // console.log(passwordRegex.test(password));
             return passwordRegex.test(password);
         }

         </script>
         
   </body>
</html>