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
		<title>Checkouts</title>
	</head>
	<body id="accountsbody">
        
        <div id="header"><?php echo makeHeader(1); ?></div>
       
        <div id="centerContent">
            
        </div>

            
	</body>
<!--     <div id="inputLeft">
            </div>
    <div id="inputRight">
            </div>
-->
</html>