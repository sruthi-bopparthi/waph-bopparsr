<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User Page -Change Name </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
   <div class="wrapper">
<?php
	require "session_auth.php";
	$username = $_SESSION['username'];
	$email = $_REQUEST["newemail"];
	$token=$_POST["nocsrftoken"];
	if(!isset($token) or ($token!==$_SESSION["nocsrftoken"]))
	{
		echo "CSRF Attack is detected";
		die();
	}
	if(isset($username) and isset($email))
	{
		?>
            <div class="title">
            <?php echo "Debug> changeemail.php got username=$username;newemail=$email";?>!
             </div>
            <?php
		
		if(changename($username,$email))
		{
            ?>
            <div class="title">
            Email has been changed!!! for <?php echo htmlentities($username);?>!
             </div>
            <?php
		}
		else
		{
			?>
            <div class="title">
            Change email failed!!!! for <?php echo htmlentities($username);?>!
             </div>
            <?php
		}
	}
	else
	{
		?>
            <div class="title">
            <?php echo "No username/email provided!";?>!
             </div>
            <?php
		
	}
	

	function changeemail($username,$email)
	{
		$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
		if($mysqli->connect_errno)
		{
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$sql = "UPDATE users SET email=? WHERE username=?;";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("ss",$email,$username);
		if($stmt->execute())
			return TRUE;
		return FALSE;
	}
	?>
	</div>
</body>
</html>