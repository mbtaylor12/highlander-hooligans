<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("master.php") ?>
		<?php require_once("organizationStructures.php") ?>
        <?php require_once("adminfunctions.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Request Assistance</title>
	</head>

            <div id="header">
            	<div id='colorbar'><img class='queueSignInImageHeader' src='./images/radfordlogo2.gif' alt='logo' ><div class='queueSignInHeader'>
            </div>

	<body id="accountsbody">
        
       
        <div id="centerContentQueueSignIn">
         
            
            <center>
            
            	<div class="queueSignIn">
            	    <h1 id="moduleTitle"><b>Request Assistance</b></h1>
           			<form action='confirmationPage.php' method='post' name='insert'>
						Name:<br> <input type='text' name='name'>
						<br />
						Email: <br><input type='text' name='email'>         
						<br />
            			RU ID: <br><input type='text' name='ru_id'>
            			<br>
						Operating System:<br> <input type='text' name='os'>
						<br />
						Problem Description:<br> <input type='text' name='description'>
						<br />
						<br />
						<input type='submit' name='Insert' value='submit' class="queueSignInSubmit" />
					</form>
            	</div>
            </center> 
                
        </div>

    
	</body>
</html>