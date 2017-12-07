<?php
            
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			 
				$assetNum = $_POST['assetTag'];
				$assetDesc = $_POST['assetDesc'];
				$manuFac = $_POST['manufacturer'];
				$modelNum = $_POST['model'];
				$serialNum = $_POST['serialNum'];
				$periphIncluded = $_POST['periphreals'];
				$roomNum = $_POST['location'];
				$ticketStat = $_POST['ticketStatus'];
                $class = $_POST['classSelect'];

				$execStatement = "python hardwareLoaner.py -i hardwareLoaners assetNum assetDesc manuFac modelNum serialNum periphIncluded roomNum ticketStat class -v $assetNum $assetDesc $manuFac $modelNum $serialNum $periphIncluded $roomNum $ticketStat $class";


				exec($execStatement);
                
                header('Location: hardware_info.php');
    
			}
?>