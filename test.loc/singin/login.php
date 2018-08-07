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
	<title>Test form of sing in</title>
</head>
<body>
	<p></p>
	<?php if (!isset($_SESSION['login'])){
		echo '<form action="check.php" method="post">
		<input type="text" name="login" placeholder="Login">
		<input type="text" name="password" placeholder="Password">
		<button type="submit" name="send">Send</button>
	</form>';
	}else{
		echo "Hello ".$_SESSION['login'].'<br>';
		echo '<a href="/">Main page</a>';
	}?>	
</body>
</html>