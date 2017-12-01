<?php
          session_start();

   if (!isset($_SESSION['userlogin'])){

        header('Location: index.php');}
   if(($_SESSION['userlogin'] != 'admin')){header('Location: index.php');}

    
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
	</head>
	<body id="accountsbody">
        
        <div id="header"><?php echo makeHeader(8); ?></div>
       
     <div id="centerContent">    <!-- creates center content div -->
            
                        <div id="rightSide">  <!-- content right side div -->


            <div class='moduleCreate'>
                		<h1 id='moduleTitle'><b>System Analytics</b></h1>
                           <?php echo databaseSize(); ?> 
                            <?php echo userAccountInfo(); ?> 

                            </div>

            </div>
            
            
                        <div id="leftSide">     <!-- content left side div -->
            
            
            <div class="moduleCreate">
                
            <h1 id="moduleTitle"><b>Files in /downloads</b></h1>
                <p>
                </p>
                
                        <?php echo getfilesGuides(); ?>
                           
            </div>
                            
        <div class="moduleCreate">
                        <h1 id="moduleTitle"><b>Create New Hardware Entry</b></h1>
            <div style='width: 45%; left: 0%; display: inline-grid;'>
		<form  action='addHardware.php' method='post' name='insert'>
            <b>Manufacturer</b> <br><input type='text' name='manufacturer'>
			<br />
			<b>Model</b><br> <input type='text' name='model'>
			<br />
			<b>Serial Number</b><br> <input type='text' name='serialNum'>
			<br />
			<b>Asset Tag </b><br><input type='text' name='assetTag'>
			<br />
			<b>Asset Description</b> <br><input type='text' name='assetDesc'>
			<br />
			<b>Periphreals</b><br> <input type='text' name='periphreals'>
			<br />
			<b>Ticket Status </b><br><input type='text' name='ticketStatus'>
			<br />
			<b>Location </b><br><input type='text' name='location'>
			<br />
			<input type='submit' name='Insert' value='submit' />
		</form>
            </div>
            <div style='width: 45%; right: 0%; display: inline-grid;'>
                <form action='#' method="post">
                    <b>New Class of Hardware</b> <br>
                <input type='text' name='class'>
                <input type='submit' name='submitclass' value='Add Class'>
                </form>
            </div>
            </div>
            </div>
            
            
            
            
            </div>
            

    
	</body>
    
 <div id="inputRight">
            
      
             
    
    <?php 
      echo "
         <div class='createModuleInput'>
         <center><h3><b>Create New User</b></h3></center>

		<form action='createAccount.php' method='post' name='insert'>
			Username:<br> <input type='text' name='username'>
			<br />
			Password: <br><input type='text' name='password'>              
			<br />
            Permission Level: <br><input type='text' name='permission'>
			
			<br />
			
			<input type='submit' name='Insert' value='Create User' />
		</form>
            </div>";
    
    
     
    
    ?>
                 </div>

        
</html>