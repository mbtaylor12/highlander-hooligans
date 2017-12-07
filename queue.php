<?php
          session_start();

   if (!isset($_SESSION['userlogin'])) 

        header('Location: index.php');

    
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
		<title>Queue</title>
	</head>
            <div id="header"><?php echo makeHeader(2); ?></div>

	<body id="accountsbody">
        
       
        <div id="centerContent">
            
            
             	<?php
            
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			 
				$name = $_POST['name'];                     //early stages of a inserting into queue. Will not work yet.
				$email = $_POST['email'];
                $ruid = $_POST['ruid'];
				$os = $_POST['os'];
				$description = $_POST['description'];
				
				$execStatement = "python queue_handler.py -i $name $email $ruid $os $description";

                exec($execStatement);
                
                echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

			}
		?>
            
          
            
            
                
                <div class="moduleCreate">
                                    <h1 id="moduleTitle"><b>Waiting Queue</b></h1>

                                    <?php echo queueWaiting(); ?>
                   
                </div>
                <br>
                <div class="moduleCreate">
                                    <h1 id="moduleTitle"><b>Current Assistance</b></h1>

                                    <?php echo queueHelp(); ?>
                   
                </div>
                <br>
                <div class="moduleCreate">
                                    <h1 id="moduleTitle"><b>Past Assistance</b></h1>

                                    <?php echo queueHelped(); ?>
                   
                </div>
                <br>
               
             
                </div>
            
                 
                

    
	</body>
        <div id="inputRight">
            
          
            
                  <div class="moduleCreate">
        	
            <br>
        <center>Move first user out of waiting queue.</center>
		<form action='popqueue.php' method='post' name='insert'>                 
			
			<input type='submit' value='Pop' />
		</form>
        <center>Refresh queue and backup</center>
        <form action='refeshQueue.php' method='post' name='insert'>                 
			
			<input type='submit' value='Refresh' />
		</form>
            
        </div>
                </div>

    
    
    
    
</html>