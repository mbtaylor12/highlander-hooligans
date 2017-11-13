<!DOCTYPE html>
<?php
   session_start();
   if (!isset($_SESSION['userlogin'])) 
        header('Location: index.php');

    
?>
<html>
	<head>
		 <?php require_once("master.php") ?>
		<?php require_once("organizationStructures.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>About</title>
	</head>
	<body id="accountsbody">
        
        <div id="header"><?php echo makeHeader(5); ?></div>
       
        <div id="centerContent">
             <div class="aboutCenterContent">
            <p><b><center>This product is created by Fall 2017 Software Engineering team Highlander Hooligans. This product is considered to be created as an open source technology. Anyone, with permission from the Technology Assistance Center, can make changes or upgrades to this system. Please consult the user manual for more details and guides on how to use this system.</center></b></p>
            
        <br>
        <br>

            </div>
           
        </div>

    
	</body>
             <div id="inputRight">
            </div>
            <div id="inputLeft">
            </div>
</html>