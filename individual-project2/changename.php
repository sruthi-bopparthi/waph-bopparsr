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
	$name= $_REQUEST["newname"];
	$token=$_POST["nocsrftoken"];
	if(!isset($token) or ($token!==$_SESSION["nocsrftoken"]))
	{
		echo "CSRF Attack is detected";
		die();
	}
	if(isset($username) and isset($name))
	{
		
		if(changename($username,$name))
		{
            ?>
            <div class="title">
            Name has been changed!!! for <?php echo htmlentities($username);?>!
             </div>
            <?php
		}
		else
		{
			?>
            <div class="title">
            Name change failed!!!! for <?php echo htmlentities($username);?>!
             </div>
            <?php
		}
	}
	else
	{
		?>
            <div class="title">
            <?php echo "No username/name provided!";?>!
             </div>
            <?php
		
	}
	

	function changename($username,$name)
	{
		$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
		if($mysqli->connect_errno)
		{
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$sql = "UPDATE users SET name=? WHERE username=?;";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("ss",$name,$username);
		if($stmt->execute())
			return TRUE;
		return FALSE;
	}

	$token.die();
	?>
	</div>
</body>
</html>