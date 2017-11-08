<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>User Management System</title>
	</head>
	<body>
        
        <?php
            
            $jsonString = exec('python hardwareLoaner.py -s Users -all');
		      $cards = jsonTo2DArray($jsonString);
            
            foreach ($cards as $card)
		          {
            
                echo $card[0];
            
                }
            
            
            
                    
        
        
        
        ?>
		<div id="main">
			
          
	           

				<h1>Register</h1> 
				<p>Please enter your details below to register.</p>

				<form method="post" action="register.php" name="registerForm" id="registerform">
					<fieldset>
						<label for="username">Username:</label><input type="text" name="username" id="username" /><br />
						<label for="password">Password:</label><input type="password" name="password" id="password" /><br />
						<label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
						<input type="submit" name="register" id="register" value="Register" />
					</fieldset>
				</form>

				
			
		</div>
	</body>
</html>