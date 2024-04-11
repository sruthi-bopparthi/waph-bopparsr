<?php
	session_set_cookie_params(16*60,"/","bopparsr.waph.io",TRUE,TRUE);
	session_start();
	
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
?>