<?php
	


	error_reporting(E_ALL);
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

		//$cards = array($card1, $card2, $card3, $card4);

			$jsonString = '[
 {
   "assetNum": "RU10899",
   "assetDesc": "Laptop",
   "manuFac": "Lenovo",
   "modelNum": "T420",
   "serialNum": "77dj883",
   "periphIncluded": "Charger",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 99009
 },
 {
   "assetNum": "RU10998",
   "assetDesc": "Laptop",
   "manuFac": "Lenovo",
   "modelNum": "T430",
   "serialNum": "88dha2j",
   "periphIncluded": "Charger",
   "roomNum": "Young 403 (Office)",
   "ticketStat": 77890
 },
 {
   "assetNum": "RU104556",
   "assetDesc": "Tablet",
   "manuFac": "Apple",
   "modelNum": "iPad ",
   "serialNum": "9088743",
   "periphIncluded": "None",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 97739
 },
 {
   "assetNum": "RU109999",
   "assetDesc": "Laptop",
   "manuFac": "Apple",
   "modelNum": "MacBook Pro",
   "serialNum": "897kdha2",
   "periphIncluded": "None",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 987054
 },
 {
   "assetNum": "RU109457",
   "assetDesc": "T420 Laptop Dock",
   "manuFac": "Lenovo",
   "modelNum": "T6900",
   "serialNum": "jd845773",
   "periphIncluded": "Power Supply",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 98999
 },
 {
   "assetNum": "RU109766",
   "assetDesc": "Laptop ",
   "manuFac": "Leovo",
   "modelNum": "T420 ",
   "serialNum": "jjdk8872",
   "periphIncluded": "Power Supply",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 94776
 },
 {
   "assetNum": "RU1085677",
   "assetDesc": "Desktop",
   "manuFac": "Lenovo ",
   "modelNum": "6870",
   "serialNum": "dasd937",
   "periphIncluded": "None",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 488729
 },
 {
   "assetNum": "RU1098433",
   "assetDesc": "Laptop",
   "manuFac": "Apple",
   "modelNum": "MacBook Pro (2012)",
   "serialNum": "dad98sj",
   "periphIncluded": "None",
   "roomNum": "Loaner Cabinet",
   "ticketStat": 345432
 },
 {
   "assetNum": "RU1098374",
   "assetDesc": "Desktop",
   "manuFac": "Apple",
   "modelNum": "iMac",
   "serialNum": "3qef513",
   "periphIncluded": "None",
   "roomNum": "Davis 051",
   "ticketStat": null
 }
]';

		$cards = jsonTo2DArray($jsonString);

		//Initializes the future 2D array.
		$hardware = array();

		//Loops through each piece of hardware stored in 2D array
		foreach ($cards as $card)
		{
			//Assigns variables from associative array
			/*$name = $card["Name"];
			$serialNumber = $card["Serial Number"];
			$manufacturer = $card["Manufacturer"];
			$connectionStatus = $card["Connection Status"];
			$assetTag = $card["Asset Tag"];
			$ipAddress = $card["IP Address"];
			$macAddress = $card["MAC Address"];
			$location = $card["Location"];*/

			$assetTag = $card['assetNum'];
			$assetDesc = $card['assetDesc'];
			$manuFac = $card['manuFac'];
			$modelNum = $card['modelNum'];
			$serialNum = $card['serialNum'];
			$periphIncluded = $card['periphIncluded'];
			$roomNum = $card['roomNum'];
			$ticketStat = $card['ticketStat'];

			$name = $assetTag;

			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
			$content = "					<p class='contentLeft'>Manufacturer: $manuFac </p>\n
			 								<p class='contentRight'>Location: $roomNum </p><br /><br />\n
			 								<p class='contentLeft'>Model: $modelNum </p><br /><br />\n
			 								<p class='contentLeft'>Serial Number: $serialNum </p><br /><br />\n
			 								<p class='contentLeft'>Asset Tag: $assetTag </p><br /><br />\n
			 								<p class='contentLeft'>Asset Description: $assetDesc </p><br /><br />\n
			 								<p class='contentLeft'>Periphereals: $periphIncluded </p>\n
			 								<p class='contentLeft'>Ticket Status: $ticketStat </p><br /><br />\n
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

	/*
	*jsonTo2DArray - Converts JSON to 2D array
	*@param $jsonString - String of JSON for converting
	*@return 2D array of JSON objects
	*/
	function jsonTo2DArray($jsonString)
	{
		$jsonArray = json_decode($jsonString, true);

		return $jsonArray;
	}

?>