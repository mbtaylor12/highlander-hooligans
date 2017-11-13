<?php //include "base.php"; ?>
<!DOCTYPE html>
<html id="backgroundImage">
	<head>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>User Management System</title>
	</head>
	<body id="loginbody" style="background-repeat: no-repeat;" link="#ffffff" vlink="#ffffff" alink="#003a99">
		<div class="loginField">
			Registration
			<form method="post" action="register.php" id="signInForm" class="signInForm">
				<input type="text" name="username" placeholder="RU Username" class="classForm" id="userInput" />
				<input type="password" name="password" placeholder="Password" class="classForm" id="passInput" />
				<input type="password" name="password" placeholder="Password Confirmation" class="classForm" id="passInput" />
				<input type="text" name="email" placeholder="Email Address" class="classForm" id="userInput" /><br /><br />
				<input type="submit" class="btn btn-lg btn-primary btn-block" type="submit" name="_eventId_proceed" id="_eventId_proceed"></input>
			</form>	
		</div>
	</body>
</html>