<!DOCTYPE html>
<html>
	<head>
		<?php require_once("master.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<title>TAC Webapp Login</title>
	</head>
	<body>
		<?php echo makeHeader(-1); ?>
		<form action="login.php" method="POST">
			<p>Username</p><input type="text" name="user" id="user" />
			<p>Password</p><input type="text" name="pass" id="pass" />
			<br />
			<input type="submit" name="login"/>
		</form>
	</body>
</html>