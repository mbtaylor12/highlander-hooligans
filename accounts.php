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
                
       	    <div class="moduleCreate">
        <h1 id='moduleTitle'><b>User Accounts</b></h1>
                <?php echo accounts(); ?></div>
            
       
                 
               
            </div>
            
            </div>   
        
	</body>
    
       <?php
            
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			 
				$username = $_POST['username'];                    
				$password = $_POST['password'];
				$permission = $_POST['permission'];
                
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                
				$execStatement = "python users.py -i Users username password permissions -v";
               


				exec($execStatement .= ' ' . $username . ' ' . $hashed = password_hash($password, PASSWORD_DEFAULT) . ' ' . $permission);
                
                echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

			}
		?>
    
     <div id="inputRight">
         <div class="createModuleInput">
         <center><h3><b>Create New User</b></h3></center>

		<form action='accounts.php' method='post' name='insert'>
			Username:<br> <input type='text' name='username'>
			<br />
			Password: <br><input type='text' name='password'>              
			<br />
            Permission Level: <br><input type='text' name='permission'>
			
			<br />
			
			<input type='submit' name='Insert' value='Create User' />
		</form>
            </div>
        
            
    </div>
       
 <div id="inputLeft">
            </div>
            
    

</html>

