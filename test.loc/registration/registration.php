<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<noscript>
	 <meta http-equiv="refresh" content="0;URL=../noscripts.html" />
	</noscript>
	<link rel="stylesheet" href="../style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="../main.js"></script>
	<title>Test form of registration</title>
</head>
<body>
	<h1>Registration</h1>
	<form action="check.php" method="post">
		<p></p>
		<input type="text" name="login" placeholder="Login">
		<input type="text" name="password" placeholder="Password">
		<input type="text" name="confirm_password" placeholder="Confirm password">
		<input type="text" name="email" placeholder="E-mail">
		<input type="text" name="name" placeholder="Name">
		<button type="submit" name="send">Send</button>
	</form>
</body>
</html>