<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User Page </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
   <div class="wrapper">
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
		else if ((!preg_match("/\w+/", $username)) || (!preg_match("/\w+/", $name))||
		(!preg_match("/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&])[\w!@#$%^&]{8,}$/",$password)) || 
		(!preg_match("/^[\w.-]+@[\w-]+(\.[\w-]+)*$/", $email ))) 
		{
			?>
            <div class="title">
            Invalid pattern matching for username : <?php echo htmlentities($username);?>!
             </div>
            <?php
		}

		else if(addnewuser($name, $email,$username,$password))
		{
            ?>
            <div class="title">
            Registration successfull!! <?php echo htmlentities($username);?>!
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
		//$sql = $sql . " AND password = md5('". $password."')";
		//echo "DEBUG > sql= $sql";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("ssss",$name, $email,$username,$password);
		if($stmt->execute())
			return TRUE;
		return FALSE;
	}
?>
</div>
   </body>
</html>s