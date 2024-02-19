<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WAPH - LOGIN Page </title>
	<script type="text/javascript">
		function displayTime()
		{
			document.getElementById('digit-clock').innerHTML="Current time:" + new Date();
		}
		setInterval(displayTime(),500);
	</script>
</head>
<body>
	<h1>A Simple Login form, WAPH </h1>
	<h2>Sruthi Sridhar Bopparthi</h2>
	<div id="digit-clock"></div>
	<?php
		echo "Visited time: ".date("Y-m-d h:i:sa")
	?>

	<form action="index.php" method="POST" class="form login">
		Username : <input type="text" name="username" class="text_field"/><br>
		Password : <input type="password" name="password" class="text_field"/><br>
		<button class="button" type="submit"> LOGIN </button>
	</form>
</body>
</html>