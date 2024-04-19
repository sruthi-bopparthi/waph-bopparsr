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
            <h3>Passsword Status</h3>
        </div>
	<form>
<?php
	require "session_auth.php";
	$username = $_SESSION['username'];
	$name = $_REQUEST["newname"];
   $email = $_REQUEST["newemail"];
	$token=$_POST["nocsrftoken"];
	if(!isset($token) or ($token!==$_SESSION["nocsrftoken"]))
	{
		?>
            <div class="mainContainer">
            <h2>CSRF Attack is detected!!! for <?php echo htmlentities($username);?>!</h2>
             </div>
            <?php
		die();
	}
	if(isset($username) and isset($name) and isset($email))
	{
		
		if(changeprofile($username,$name,$email))
		{
            ?>
            <div class="mainContainer">
            Profile has been updated!!! for <?php echo htmlentities($username);?>!
             </div>
             <p class="register"> <a href="logout.php">Logout</a></p>
            <?php
		}
		else
		{
			?>
            <div class="mainContainer">
            Profile Update failed!!!! for <?php echo htmlentities($username);?>!
             </div>
             <p class="register"> <a href="logout.php">Logout</a></p>
            <?php
		}
	}
	else
	{
		?>
            <div class="mainContainer">
            <?php echo "No name/email provided!";?>!
             </div>
             <p class="register"> <a href="logout.php">Logout</a></p>
            <?php
		
	}
	

	function changeprofile($username,$name, $email)
	{
		$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
		if($mysqli->connect_errno)
		{
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$sql = "UPDATE users SET name=str(?), email=? WHERE username=?;";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("sss",$name,$email,$username);
		if($stmt->execute())
			return TRUE;
		return FALSE;
	}

	$token.die();
	?>
	
	</form>
    </div>
   </body>
</html>