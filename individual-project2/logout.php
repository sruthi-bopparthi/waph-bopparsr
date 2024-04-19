<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Change Password Form</title>
</head>
<body>
	<form>
    <h1>LOGOUT</h1>
    <div class="mainContainer">
<p> You are logged Out!</p>
<a href="form.php"> Login again </a>
</div>
</form>
</body>
</html>