<?php
	session_start();

    
    $myPDO = new PDO('sqlite:hardware.db');
    $result = $myPDO->query("SELECT * FROM Users");
    

    foreach($result as $row)
    {
        print $row['Username'] . "\n";
    }

	
?>