<?php
	session_start();
	if(checklogin_mysql($_POST["username"],$_POST["password"]))
	{
		?>
		<h2> Welcome <?php echo $_POST['username']; ?> ! </h2>
		<?php
	}
	else
	{
		echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
		die();
	}
	function  checklogin($username, $password)
	{
		$account = array("admin","1234");
		if(($username == $account[0]) and ($password == $account[1]))
			return TRUE;
		else
			return FALSE;
	}

	function checklogin_mysql($username,$password)
	{
		$mysqli = new mysqli('localhost','bopparsr','Shruti@123','waph');
		if($mysqli->connect_errno)
		{
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}
		return FALSE;
	}
?>
