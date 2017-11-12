<!DOCTYPE html>

<html>
	<head>
		<?php require_once("master.php") ?>
		<script src="script.js"></script>
		<title>TAC Webapp Login</title>
	</head>
	<body>
		<div>
			<form action="index.php" method="POST">
				<div class="loginField">
					<p></p><input type="text" name="user" placeholder="Username" />
					<p></p><input type="text" name="pass" placeholder="Password" />
				</div>
				<br />
				<input type="submit" name="login"/>
                
		</form>
            <a href="logout.php">Logout</a>

		</div>
        
        
		
	</body>
</html>
<?php 

       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usernamelogin = $_POST["user"];
        $passlogin = $_POST["pass"];

        $jsonString = exec('python hardwareLoaner.py -s Users -all');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
		foreach ($cards as $card)
		{
			$user = $card[0];
			$password = $card[1];
            $permission = $card[2];
			
			if ($usernamelogin == $user) 
                {
                if($passlogin == $password)
                {
                   
         
                    echo "success";
                    session_start();
                    $_SESSION['userlogin'] = $user;
                    $_SESSION['idlevel'] = $permission;
                    
                    
                    header('Location: hardware.php');

                    return;
                }
                
                else {
                echo "<b>Username or Password incorrect</b>";
                return;
                }
            
                }
            
       
                }
       
                }
           
        
    function jsonTo2DArray($jsonString)
	{
		$jsonArray = json_decode($jsonString, true);
		return $jsonArray;
	}



   


?>