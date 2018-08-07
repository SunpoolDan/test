<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main page</title>
</head>
<body>	
	<?php
		if (!isset($_SESSION['login'])) {
			echo "<a href='/registration/registration.php'>Registration</a><br>
	          <a href='/singin/login.php'>Sing in</a><br>";
		}
		if (isset($_SESSION['login'])) {
			echo "<a href='logout.php'>Exit</a>";
	  }
	?>
</body>
</html>