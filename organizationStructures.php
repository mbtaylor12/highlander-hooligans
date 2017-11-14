<?php
	
	error_reporting(E_ALL);
	/*
	*hardware() - Creates a collapisble card view for hardware.
	*Calls function creatCollapsibleCardView using hardware data to get a hardware card view.
	*@return - HTML for a collapsible card view.
	*/
	function hardware()
	{
        $jsonString = exec('python hardwareLoaner.py -s hardwareLoaners -all');
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
			$content = "					<div id='leftSide'><center><p class='contentLeft'>Manufacturer: <input type='text' class='notEditing'                                                    readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$manuFac'></p>\n
			 								<p class='contentLeft'>Location: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$roomNum'></p><br /><br />\n
			 								<p class='contentLeft'>Model: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$modelNum'></p><br /><br />\n
			 								<p class='contentLeft'>Serial Number: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$serialNum'></p><br /><br />\n</center></div><div id='rightSide'><center>
			 								<p class='contentLeft'>Asset Tag: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetTag'></p><br /><br />\n
			 								<p class='contentLeft'>Asset Description: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetDesc'></p><br /><br />\n
			 								<p class='contentLeft'>Periphereals: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$periphIncluded'></p><br /><br />\n
			 								<p class='contentLeft'>Ticket Status: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$ticketStat'></p><br />\n</center></div>
			 								<center><p class='contentLeft'><button>Apply</button></p></center>\n"; 
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



    function accounts(){
        
        $jsonString = exec('python users.py -s Users -all');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
		foreach ($cards as $card)
		{
			$user = $card[0];
			$password = $card[1];
			
			$name = $user;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "					
            <p class='contentLeft'>Username: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$user'></p>\n 
			 								<p class='contentRight'>Password: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$password'></p><br /><br />\n
                                            <select class='contentLeft'>
                                                <option value='admin'>Admin</option>
                                                <option value='mod'>Moderator</option>
                                                <option value='studenttech'>Student Tech</option>   
                                                <option value='user''>User</option>
                                            </select><br/><br />
			 								<p class='contentRight'><button>Apply</button></p>\n";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $user, "content"=> $content);
			//Pushes the $tempArray onto the $user array, creating a 2D array.
			array_push($users, $tempArray);
		}
		return createCollapsibleView($users);
        
        
    }

//This creates a card view for utility downloads

    function downloadsUtilities(){
        
        $jsonString = exec('python hardwareLoaner.py -s downloadsUtilities -all');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array               
		foreach ($cards as $card)
		{
            
			$downloadName = $card[0];
			$downloadLink = $card[1];
            $comments = $card[2];
			
			$name = $downloadName;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "					
            
            <p class='contentLeft'>Download Link: <a href='$downloadLink' download>$downloadName</a></p>\n
            <p class='contentRight'>Install Notes: $comments</p>
            
            
            ";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $downloadName, "content"=> $content);
			//Pushes the $tempArray onto the $user array, creating a 2D array.
			array_push($users, $tempArray);
		}
		return createCollapsibleView($users);
        
        
    }
//future driver card creation

function downloadsDrivers(){
        
        $jsonString = exec('python hardwareLoaner.py -s downloadsDrivers -all');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
		foreach ($cards as $card)
		{
            
			$downloadName = $card[0];
			$downloadLink = $card[1];
            $comments = $card[2];
			
			$name = $downloadName;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "					
            
            <p class='contentLeft'>Download Link: <a href='$downloadLink' download>$downloadName</a></p>\n
            <p class='contentRight'>Install Notes: $comments</p>
            
            
            ";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $downloadName, "content"=> $content);
			//Pushes the $tempArray onto the $user array, creating a 2D array.
			array_push($users, $tempArray);
		}
		return createCollapsibleView($users);
        
        
    }

//90% working queue card function. Card will not expand

    function queueWaiting(){  
        
        $jsonString = exec('python queue_handler.py -s waiting');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
        $count = 1;
		foreach ($cards as $card)
		{
            
			$namef = $card[1];
			$email = $card[2];
            $placeinqueue = $card[0];
            $os = $card[4];
            $description = $card[5];
            
			
			$name = $namef;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "<p class=''>Place in Queue: $count</p>\n
                        <p class=''>Customer Number: $placeinqueue</p>\n
                        <p class=''>Name: $namef</p>\n
                        <p class=''>Email: $email</p>\n
                        <p class=''>Operating system: $os</p>\n
                        <p class=''>Description of problem: $description</p>\n";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $name, "content"=> $content);
			//Pushes the $tempArray onto the $user array, creating a 2D array.
			array_push($users, $tempArray);
            $count = $count + 1;
		}
		return createCollapsibleView($users);
        
        
    }

 function queueHelp(){  
        
        $jsonString = exec('python queue_handler.py -s help');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
		foreach ($cards as $card)
		{
			$namef = $card[1];
			$email = $card[2];
            $placeinqueue = $card[0];
            $os = $card[4];
            $description = $card[5];
            
			
			$name = $namef;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "<form action='pophelp.php' method='post'>
                        <p class=''>Place in queue: <input name='test' type='text' value='$placeinqueue'></p>\n
                        <p class=''>Name: $namef</p>\n
                        <p class=''>Email: $email</p>\n
                        <p class=''>Operating system: $os</p>\n
                        <p class=''>Description of problem: $description</p>\n
                        <input type='submit' value='Remove'></form>";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $name, "content"=> $content);
			//Pushes the $tempArray onto the $user array, creating a 2D array.
			array_push($users, $tempArray);
		}
		return createCollapsibleView($users);
        
        
    }
 function queueHelped(){  
        
        $jsonString = exec('python queue_handler.py -s helped');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
		foreach ($cards as $card)
		{
			$namef = $card[1];
			$email = $card[2];
            $placeinqueue = $card[0];
            $os = $card[4];
            $description = $card[5];
            
			
			$name = $namef;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "<p class=''>Place in queue: $placeinqueue</p>\n
                        <p class=''>Name: $namef</p>\n
                        <p class=''>Email: $email</p>\n
                        <p class=''>Operating system: $os</p>\n
                        <p class=''>Description of problem: $description</p>\n";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $name, "content"=> $content);
			//Pushes the $tempArray onto the $user array, creating a 2D array.
			array_push($users, $tempArray);
		}
		return createCollapsibleView($users);
        
        
    }

   
       
    
    
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
