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
			

            
			
			if ($usernamelogin == $user) 
                {
                    $password = $card[1];
                    $permission = $card[2];
                    $salt = $card[3];
                    $userentry = hash('sha256', $passlogin);
                    $hashed = hash('sha512', $userentry . $salt);
                
                if($hashed == $password)
                {
                   

                    $_SESSION['userlogin'] = $user;
                    $_SESSION['idlevel'] = $permission;
                    header('Location: hardware_info.php');

                }
                
                else 
                {
                    error();
                

                }
            
                }
       
                }
       }
           


        
    function jsonTo2DArray($jsonString)
	{
		$jsonArray = json_decode($jsonString, true);
		return $jsonArray;
	}
    
        
    function error()
    {
        echo '<script language="javascript"> alert("Username or Password Incorrect.") </script>';
        echo '<script type="text/javascript"> window.location = "index.php"</script>';
    }


  

   


?>