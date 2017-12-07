<?php 
    $manufacturer = $_POST['manufacturer'];
    $assetTag = $_POST['assetTag'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $model = $_POST['model'];
    $periphereals = $_POST['periphereals'];
    $serialNumber = $_POST['serialNumber'];
    $ticketStatus = $_POST['ticketStatus'];
    if($_POST['action'] == 'Update')
    {
    exec("python updateHardware.py storage/hardwareinfo.db hardwareLoaners '$assetTag' '$description' '$manufacturer' '$model' '$serialNumber' '$periphereals' '$location' '$ticketStatus'");
        header("Location: hardware_info.php");
    }
	else if($_POST['action'] == 'Delete')
	{
		exec("python delete.py storage/hardwareinfo.db hardwareLoaners assetNum $assetTag");
        header("Location: hardware_info.php");
	}
	
?>