<?php
	error_reporting(E_PARSE);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PinkRhino</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
	<div class="navbar">
		<h1>PinkRhino / LOGIN PAGE</h1>
	</div>
	<div class="login-form">
		<form method="POST" action="login.inc.php">
			<h1>Login</h1>
			<input class="text" type="text" name="name" placeholder="Username"><br><br>
			<input class="text" type="text" name="pass"	placeholder="Password"><br><br>
			<input class="button" type="submit" value="Login"><br>
			<?php
				if(isset($_GET['info']) && $_GET['info'] == 'gresit')
					echo '<p>Asigurate ca ai completat toate campurile</p>';
				if(isset($_GET['info']) && $_GET['info'] == 'correct')
					echo '<p>Go to </p>'.'<a href="index.php">Login Page</a>';
				if(isset($_GET['info']) && $_GET['info'] == 'par')
					echo '<p>Password incorrect</p>';
			?>
			<p>If you don't have an account ,</p><a href="signup.php">make one</a>
			<br><br><br>
			</form>
		</div>
</body>
</html>