<?php 
        session_start();                    


       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usernamelogin = $_POST["user"];
        $passlogin = $_POST["pass"];

        $jsonString = exec('python users.py -s Users -all');
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
                if(password_verify($passlogin, $password))
                {
                   

                    $_SESSION['userlogin'] = $user;
                    $_SESSION['idlevel'] = $permission;
                    header('Location: hardware_info.php');

                }
                
                else 
                {
                    header('Location: index.php');
                    echo "<div><b>Username or Password incorrect</b></div>";
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