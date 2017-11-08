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
		<title>Downloads</title>
	</head>
	<body id="accountsbody">
        
        <div id="header"><?php echo makeHeader(0); ?></div>
       
        <div id="centerContent">    <!-- creates center content div -->
            
                        <div id="rightSide">  <!-- content right side div -->


            <div class='moduleCreate'>
                <h1><b><u>Utilities</u></b></h1>
                <?php echo downloadsUtilities(); ?>
            </div>
            
            </div>
            
                        <div id="leftSide">     <!-- content left side div -->
            
            
            <div class="moduleCreate">
                
            <h1><b><u>Drivers and Guides</u></b></h1>
                <p>This table is produced by looping through the folder and displays every file as a download link.
                    It is dynamic depending on how many files are in the folder!
                </p>
                
                        <?php echo getfilesDownloads(); ?>
                           
            </div>
            
            
            
            
            </div>
            
        </div>
        
    
	</body>
</html>