<!DOCTYPE html>
<html>
	<head>
		<?php require_once("master.php") ?>
		<?php require_once("organizationStructures.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<title>Hardware Info</title>
	</head>
	<body>
		<?php echo makeHeader(3); ?>
		<?php echo createHardwareCardView(); ?>
	</body>
</html>