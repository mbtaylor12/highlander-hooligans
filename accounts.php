<?php
          session_start();

   if (!isset($_SESSION['userlogin'])){

        header('Location: index.php');
       }
   
    
?>
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
		<title>Accounts</title>
	</head>
    
	<body id="accountsbody">
        
        <div id="header"><?php echo makeHeader(4); ?></div>
       
        <div id="centerContent">
            
            
            <div id="centerContent"> <!-- content right side div -->
                                <?php 

       	   
                
                 			 			if($_SESSION['idlevel'] == 'admin' OR $_SESSION['idlevel'] == 'studenttech'){
                                             echo "<div class='moduleCreate'>
            <h1 id='moduleTitle'><b>User Accounts</b></h1>";

                echo accounts(); 
                
                echo "</div>";               } ?>
            </div>
            </div>   
        
	</body>
    <div id='inputRight'>
    

            
    
    </div>
</html>

