<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User Page </title>
      <link rel="stylesheet" href="design.css">
   </head>
   <body>
   <div class="wrapper">
<?php
	session_set_cookie_params(15*60,"/","bopparsr.waph.io",TRUE,TRUE);
	session_start();
	if(isset($_POST["username"]) and isset($_POST['password']))
	{
		if(checklogin_mysql($_POST["username"],$_POST["password"]))
		{
			$_SESSION["authenticated"] = TRUE;
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["browser"] = $_SERVER["HTTPS_USER_AGENT"];
			?>
			<div class="title">
        	Welcome <?php echo htmlentities($_SESSION["username"]);?>!
         	</div>
			<h3><u> User Profile Page </u></h3>
			<?php
			$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
			if($mysqli->connect_errno)
			{
				printf("Database connection failed: %s\n", $mysqli->connect_error);
				exit();
			}

			$sql = "SELECT * FROM users WHERE username=?;";
			$stmt=$mysqli->prepare($sql);
			$stmt->bind_param("s",$_POST["username"]);
			$stmt->execute();
			$result=$stmt->get_result();
			if($result -> num_rows==1)
				while ($row = mysqli_fetch_array($result)) 
				{
					?>
					<div>
						<p> Name: <?php echo $row['name'];?></p>
						<p> Email: <?php echo $row['email'];?></p>
						<p> Username: <?php echo $row['username'];?></p>
					</div>

            <div class="signup-link">
               <a href="changepasswordform.php">Change Password</a> | <a href="changenameform.php">Change Name</a> | <a href="changeemailform.php">Change Email</a> | <a href="logout.php">Logout</a>
            </div>
	
					<?php
				}
			else
				echo "<script>alert('Couldnt load user data');</script>";
			
		}
		else
		{
			session_destroy();
			echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
			die();
		}
	}
	if(!$_SESSION["authenticated"] or $_SESSION["authenticated"]!= TRUE)
	{
		session_destroy();
		echo "<script>alert('You have not login. Please login first');</script>";
		header("Refresh:0;url=form.php");
		die();
	}

	if($_SESSION["browser"]!=$_SERVER["HTTPS_USER_AGENT"])
	{
		session_destroy();
		echo "<script>alert('Session hijacking is detected!');</script>";
		header("Refresh:0; url=form.php");
		die();
	}
	
	function checklogin_mysql($username,$password)
	{
		$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
		if($mysqli->connect_errno)
		{
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$sql = "SELECT * FROM users WHERE username=? AND password=md5(?)";
		//$sql = $sql . " AND password = md5('". $password."')";
		//echo "DEBUG > sql= $sql";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("ss",$username,$password);
		$stmt->execute();
		$result=$stmt->get_result();
		if($result -> num_rows==1)
			return TRUE;
		return FALSE;
	}

	
?>

    </div>
   </body>
</html>