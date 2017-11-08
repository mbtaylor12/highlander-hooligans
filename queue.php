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
				$os = $_POST['os'];
				$description = $_POST['description'];
				
				$execStatement = "python queue.py -i waitingQueue name email os description -v $name $email $os $description";


				exec($execStatement);
                
                echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

			}
		?>
            
            <div id="rightSide">
            
            <div class="moduleCreate">
                <h1><b><u>Enter Help Queue</u></b></h1>
            <form action='queue.php' method='post' name='insert'>
			Name:<br> <input type='text' name='name'>
			<br />
			Email: <br><input type='text' name='email'>              
			<br />
			Operating System:<br> <input type='text' name='os'>
			<br />
			Problem Description:<br> <input type='text' name='description'>
			<br />
			
			<input type='submit' name='Insert' value='submit' />
		</form>
            </div>
                </div>
            
            
            <div id="leftSide">
                
                <div class="moduleCreate">
                                    <h1><b><u>Current Queue</u></b></h1>

                                    <?php echo queue(); ?>
                   
                </div>
                </div>
            
                 
                
        </div>

    
	</body>
</html>