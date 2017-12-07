<?php
          session_start();

   if (!isset($_SESSION['userlogin'])) 

        header('Location: index.php');


    require_once("organizationStructures.php");

?>

<html>
	<head>
		<meta http-equiv="refresh" content="10">
		<link rel="stylesheet" href="styles.css">
	</head>
	<!--Royalty Free Background image from https://www.pexels.com/photo/usb-technology-green-microchip-57007/ -->
	<body id="queuebody" style="background-repeat: no-repeat;" link="#ffffff" vlink="#ffffff" alink="#003a99">

		<div class='queueDisplayDiv'>
			<center><p style="font-size:30px;">Assistance Queue</p></center>
			<?php echo queueWaitingTable(); ?>
		</div>
	</body> 
</html>