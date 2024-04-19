<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>User Details</title>
</head>
<body>
<div class="headingsContainer">
            <h3>User Status</h3>
        </div>
	<form>
<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$name = $_POST["name"];
	if(isset($username) and isset($password))
	{
		//echo "Debug> got username=$username;password=$password";
		$username=sanitize_input($_POST['username']);
		$password=sanitize_input($_POST['password']);
		$email=sanitize_input($_POST['email']);
		$name = sanitize_input($_POST['name']);

		#input length check
		if(strlen($username) < 1 || strlen($password) < 8 || strlen($email)< 3 || strlen($name)<1)
		{
			?>
            <div class="title">
            Invalid Length for username : <?php echo htmlentities($username);?>!
             </div>
            <?php
		}

		//Reg exp check
		else if (!preg_match("/\w+/", $username))  
		{
			?>
            <div class="title">
            Invalid pattern matching for username input <?php echo htmlentities($username);?>
             </div>
            <?php
		}

		else if (!preg_match("/\w+/", $name)) 
		{
			?>
            <div class="title">
            Invalid pattern matching for name input <?php echo htmlentities($username);?>!
             </div>
            <?php
		}

		else if(!preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/',$password))
		{
			
			?>
            <div class="title">
            Invalid pattern matching for password input <?php echo htmlentities($username);?>!
             </div>
            <?php

		}

		else if(!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email ))
		{
			?>
            <div class="title">
            Invalid pattern matching for email input <?php echo htmlentities($username);?>!
             </div>
            <?php
		}

		else if(addnewuser($name, $email,$username,$password))
		{
            ?>
            <div class="title">
            Registration successfull!! <?php echo htmlentities($username);?>!
            <p class="register"> <a href="form.php">Sign in</a></p>
             </div>
            <?php
		}
		else
		{
            ?>
            <div class="title">
            Registration FAILED!! <?php echo htmlentities($username);?>!
             </div>
            <?php
			
		}
	}
	else
	{
        ?>
            <div class="title">
            No username/password provided!
             </div>
        <?php
	}
	
	function sanitize_input($input)
	{
		$input=trim($input);
		$input=stripslashes($input);
		$input=htmlspecialchars($input);
		return $input;
	}

	function addnewuser($name, $email,$username,$password)
	{
		$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
		if($mysqli->connect_errno)
		{
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$sql = "INSERT INTO users(name, email,username,password) VALUES (?,?,?, md5(?));";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("ssss",$name, $email,$username,$password);
		if($stmt->execute())
			return TRUE;
		return FALSE;
	}
?>
</form>
</div>
   </body>
</html>