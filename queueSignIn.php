<?php
          session_start();

   if (!isset($_SESSION['userlogin'])) 

        header('Location: index.php');


    require_once("organizationStructures.php");

?>
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
            	<div id='colorbar'><img class='img1' src='./images/radfordlogo2.gif' alt='logo' >
            </div>

	<body id="accountsbody">
        
       
        <div id="centerContent">
         
            
            <center>
            
            	<div class="moduleCreate">
            	    <h1 id="moduleTitle"><b>Enter Help Queue</b></h1>
           			<form action='queueSignIn.php' method='post' name='insert'>
						Name:<br> <input style='width: 35%;' type='text' name='name'>
						<br />
						Email: <br><input style='width: 35%;' type='text' name='email'>         
						<br />
            			RU ID: <br><input style='width: 35%;' type='text' name='ruid'>
            			<br>
						Operating System:<br> <input style='width: 35%;'type='text' name='os'>
						<br />
						Problem Description:<br> <input style='width: 35%;' type='text' name='description'>
						<br />
						<br />
						<input type='submit' name='Insert' value='submit' class="queueSignInSubmit" />
					</form>
            	</div>
            </center> 
                
        </div>
        <?php
            
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			 
				$name = $_POST['name'];                     
				$email = $_POST['email'];
                $ruid = $_POST['ruid'];
				$os = $_POST['os'];
				$description = $_POST['description'];
                
                $name = str_replace(" ", "&nbsp;", $name);
				
				$execStatement = "python queue_handler.py -i '$name' '$email' '$ruid' '$os' '$description'";

                exec($execStatement);
                
                echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

			}
		?>

    
	</body>
