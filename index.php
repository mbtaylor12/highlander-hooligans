<!DOCTYPE html>

<html>
	<head>
		<?php require_once("master.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<title>TAC Webapp Login</title>
	</head>

	<body  id="loginbody" style="background-repeat: no-repeat;" link="#ffffff" vlink="#ffffff" alink="#003a99">

				<form action="loginManager.php" method="POST" id="signInForm" class="signInForm">
				<div class="loginField">
                    <div id="loginHeader">
					<img class="responsive center-img" src="/images/login-header.png" />
			         </div>
					<input type="text" name="user" placeholder="Username" class="classForm" id="userInput" />
					<br />
					<input type="password" name="pass" placeholder="Password" class="classForm" id="passInput" />
					<br />
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="_eventId_proceed" id="_eventId_proceed">Login</button>
                    
                    <center>
                    	<p>Welcome to the Radford University Technology Assistance Center Utility Hub. Please login to continue.</p>
                    	
                    </center>
                    <a href='queueSignIn.php'>- Request Computing Assistance</a>
                    <br />
                    <a href='https://va.moatusers.com'>- IT Security Training</a>
                    <br />
                    <br />
                    <div class="leftSideDiv"><a href="https://www.radford.edu/content/radfordcore/home.html">Main Page</a></div>
                    <center><a class="centerRight" href="http://sso.radford.edu">MyRU</a></center>
				</div>
				</form>
		
	</body>
  
</html>
