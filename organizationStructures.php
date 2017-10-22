<?php
	/*
	*Creates the hardware card view.
	*/
	function createHardwareCardView()
	{
		//Temporary hardware info until we get database running
		$card1 = array("Name" => "YHPC1", "Serial Number" => "3N4AB8E7",
			"Manufacturer" => "Apple", "Connection Status" => "Online", 
			"Asset Tag" => "YHPC0002", "IP Address" => "10.1.23.2", 
			"MAC Address" => "3A:34:52:C4:69:B8", "Location" => "Young Hall");
		$card2 = array("Name" => "YHPC2", "Serial Number" => "3N4AB8E8",
			"Manufacturer" => "Lenovo", "Connection Status" => "Offline", 
			"Asset Tag" => "YHPC0022", "IP Address" => "10.1.23.6", 
			"MAC Address" => "4B:42:61:D4:12:11", "Location" => "Young Hall");
		$card3 = array("Name" => "YHPC3", "Serial Number" => "3N4AB8E9",
			"Manufacturer" => "Gateway", "Connection Status" => "Online", 
			"Asset Tag" => "YHPC00001", "IP Address" => "10.1.23.1", 
			"MAC Address" => "CC:33:55:C2:66:BB", "Location" => "Young Hall");

		$cards = array($card1, $card2, $card3);

		$cardHTML = "";

		//Loops through each piece of hardware stored in 2D array
		foreach ($cards as $card)
		{
			//Assigns variables from associative array
			$name = $card["Name"];
			$serialNumber = $card["Serial Number"];
			$manufacturer = $card["Manufacturer"];
			$connectionStatus = $card["Connection Status"];
			$assetTag = $card["Asset Tag"];
			$ipAddress = $card["IP Address"];
			$macAddress = $card["MAC Address"];
			$location = $card["Location"];

			//Creates first div tag
			$cardHTML .= "<div id='$name' class='card' onclick=\"expandHardware("
					   . "'$name', '$manufacturer', '$connectionStatus', "
					   . "'$assetTag', '$ipAddress', '$macAddress', '$location'"
					   . ")\">\n";

			//Creates paragraph tags
			$cardHTML .= "<p class='cardTitle1'>$name</p>\n";
			$cardHTML .= "<p class='cardTitle2'>$serialNumber</p>\n";
			
			//Creates closing div tag
			$cardHTML .= "</div>\n";
		}

		return $cardHTML;
	}
?>