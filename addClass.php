<?php
            
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			 
				$class = $_POST['class'];
				

				$execStatement = "python hardwareLoaner.py -i class class -v $class";


				exec($execStatement);
                
                header('Location: settings.php');
    
			}
?>