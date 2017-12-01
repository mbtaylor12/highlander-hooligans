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

				$execStatement = "python hardwareLoaner.py -i hardwareLoaners assetNum assetDesc manuFac modelNum serialNum periphIncluded roomNum ticketStat -v $assetNum '$assetDesc' $manuFac $modelNum $serialNum $periphIncluded $roomNum $ticketStat";


				exec($execStatement);
                
                header('Location: hardware_info.php');
    
			}
?>