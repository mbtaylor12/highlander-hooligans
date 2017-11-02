<!DOCTYPE html>
<html>
	<head>
		<?php require_once("master.php") ?>
		<?php require_once("organizationStructures.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<title>Queue</title>
	</head>
	<body>
		<?php echo makeHeader(2); ?>

		<?php 
			$loggedIn = true;

			if(!$loggedIn)
				echo displayQueueSignIn();
			else
				echo displayQueue();
		?>
	</body>
</html>