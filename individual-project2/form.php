<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Login Form</title>
</head>
<body>
    <h1>Login Form, WAPH</h1>
    <form action="index.php" method="POST">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Sign in</h3>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="username">Your username</label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <br><br>

            <!-- Password -->
            <label for="password">Your password</label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <!-- Submit button -->
            <button type="submit">Login</button>

            <!-- Sign up link -->
            <p class="register">Not a member?  <a href="registrationform.php">Register here!</a></p>

        </div>

    </form>
</body>
</html>