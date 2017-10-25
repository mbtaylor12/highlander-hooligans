<?php

	/*
	*hardware() - Creates a collapisble card view for hardware.
	*Calls function creatCollapsibleCardView using hardware data to get a hardware card view.
	*@return - HTML for a collapsible card view.
	*/
	function hardware()
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
		$card4 = array("Name" => "YHPC4", "Serial Number" => "3N4ABFE9",
			"Manufacturer" => "Gateway", "Connection Status" => "Offline", 
			"Asset Tag" => "YHPC00001", "IP Address" => "10.1.23.2", 
			"MAC Address" => "CC:33:55:C4:66:BB", "Location" => "Young Hall");

		$cards = array($card1, $card2, $card3, $card4);

		//Initializes the future 2D array.
		$hardware = array();

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

			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
			$content = "					<p class='contentLeft'>Manufacturer: $manufacturer </p>\n
			 								<p class='contentRight'>Location: $location </p><br /><br />\n
			 								<p class='contentLeft'>Connection Status: $connectionStatus </p><br /><br />\n
			 								<p class='contentLeft'>Asset Tag: $assetTag </p><br /><br />\n
			 								<p class='contentLeft'>IP Address: $ipAddress </p><br /><br />\n
			 								<p class='contentLeft'>MAC Address: $macAddress </p>\n
			 								<p class='contentRight'><button>Apply</button></p>\n";	

			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $name, "content"=> $content);
			//Pushes the $tempArray onto the $hardware array, creating a 2D array.
			array_push($hardware, $tempArray);
		}

		return createCollapsibleView($hardware);
	}

	/*
	*createCollapsibleView - Makes a collapsible card view.
	*@param $cards - A 2D array where each sub-array's key-value pair is "name"=>$name and "content"=>$content.
	*			     Name is the title which will appear on the card. Content is the body of the card.
	*@return - HTML for a collapsible view.
	*/
	function createCollapsibleView(array $cards)
	{
		//Initial HTML for a card view
		$html = "<div class='cardContainer'>\n"
			  . "	<div class='panel-group' id='accordion'>\n";

		//Loops through each element in $cards to pull out information about each card
		foreach ($cards as $card) 
		{
			//Since each element in $cards is an array, you can get their key-value pair.
			$name = $card["name"];
			$content = $card["content"];
			
			//Constructing card view
			$html .= "		<div class='panel panel-default'>\n"
				   . "			<div class='panel-heading'>\n"
				   . "				<h4 class='panel-title'>\n"
				   . "					<a data-toggle='collapse' data-parent='#accordion' href='#$name'><div class='cardTitle'>$name</div></a>\n"
				   . "				</h4>\n"
				   . "			</div>\n"
				   . "			<div id='$name' class='panel-collapse collapse collapse'>\n"
				   . "				<div class='panel-body'>\n"
				   . "					$content"
				   . "				</div>\n"
				   . "			</div>\n"
				   . "		</div>\n";
		}
		
		//Closing div tags from initial HTML
		$html .= "	</div>\n"
			   . "</div>\n";

		return $html;
	}
?>