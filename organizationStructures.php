<?php
	


	error_reporting(E_ALL);

	/*
	*hardware() - Creates a collapisble card view for hardware.
	*Calls function creatCollapsibleCardView using hardware data to get a hardware card view.
	*@return - HTML for a collapsible card view.
	*/
	function hardware()
	{
			$jsonString = exec('hardwareLoaner.py -s hardwareLoaners -all');


		$cards = jsonTo2DArray($jsonString);

		//Initializes the future 2D array.
		$hardware = array();

		//Loops through each piece of hardware stored in 2D array
		foreach ($cards as $card)
		{
			$assetTag = $card[0];
			$assetDesc = $card[1];
			$manuFac = $card[2];
			$modelNum = $card[3];
			$serialNum = $card[4];
			$periphIncluded = $card[5];
			$roomNum = $card[6];
			$ticketStat = $card[7];

			$name = $assetTag;

			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
			$content = "					<p class='contentLeft'>Manufacturer: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$manuFac'></p>\n
			 								<p class='contentRight'>Location: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$roomNum'></p><br /><br />\n
			 								<p class='contentLeft'>Model: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$modelNum'></p><br /><br />\n
			 								<p class='contentLeft'>Serial Number: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$serialNum'></p><br /><br />\n
			 								<p class='contentLeft'>Asset Tag: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetTag'></p><br /><br />\n
			 								<p class='contentLeft'>Asset Description: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetDesc'></p><br /><br />\n
			 								<p class='contentLeft'>Periphereals: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$periphIncluded'></p><br /><br />\n
			 								<p class='contentLeft'>Ticket Status: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$ticketStat'></p><br />\n
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