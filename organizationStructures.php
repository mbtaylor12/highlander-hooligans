<?php
    require_once("master.php");
	
	error_reporting(E_ALL);
	/*
	*hardware() - Creates a collapisble card view for hardware.
	*Calls function creatCollapsibleCardView using hardware data to get a hardware card view.
	*@return - HTML for a collapsible card view.
	*/

    function hardwareController($class)
        {
            
            echo "<div class='moduleCreate'>
            <h1 id='moduleTitle'><b>$class</b></h1>";
            $class1 = $class;
            echo hardware($class1);
            
            echo "</div>";
        
        }
    
	function hardware($class)
	{
        $jsonString = exec("python hardwareLoaner.py -s hardwareLoaners -all $class");
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
			$content = "<div id='leftSide'><center>
 						<form action='hardwareUpdateHelp.php' method='post'>
 						<p class='contentLeft'>Manufacturer: <input name='manufacturer' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$manuFac'></p>\n
 			 			<p class='contentLeft'>Location: <input name='location' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$roomNum'></p><br /><br />\n
 			 			<p class='contentLeft'>Model: <input name='model' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$modelNum'></p><br /><br />\n
 			 			<p class='contentLeft'>Serial Number: <input name='serialNumber' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$serialNum'></p><br /><br />\n</center></div><div id='rightSide'><center>
 			 			<p class='contentLeft'>Asset Tag: <input name='assetTag' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetTag'></p><br /><br />\n
 			 			<p class='contentLeft'>Asset Description: <input name='description' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetDesc'></p><br /><br />\n
 			 			<p class='contentLeft'>Periphereals: <input name='periphereals' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$periphIncluded'></p><br /><br />\n
 		 			<p class='contentLeft'>Ticket Status: <input name='ticketStatus' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$ticketStat'></p><br />\n</center>";
 
 			 			if($_SESSION['idlevel'] == 'admin')
 			 			{
 			 				$content .= "<input type='submit' name='action' value='Delete'>";
 			 			}
 
 			 			if($_SESSION['idlevel'] == 'admin' OR $_SESSION['idlevel'] == 'studenttech')
 			 			{
 			 				$content .= "<input type='submit' name='action' value='Update'>";
 			 			}
 
 			 			$content.= "</form>
 			 			</div>\n";  
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

    	function hardwaresearch($class)
	{
        $jsonString = exec("python hardwareinfosearch.py -s hardwareLoaners -all $class");
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
			$content = "					
                                            <div id='leftSide'><center><p class='contentLeft'>Manufacturer:  <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)'              onblur='stopEditing(this)' value='$manuFac'></p><br><br>\n
			 								<p class='contentLeft'>Location: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$roomNum'></p><br><br >\n
			 								<p class='contentLeft'>Model: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$modelNum'></p><br /><br />\n
			 								<p class='contentLeft'>Serial Number: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$serialNum'></p><br /><br />\n</center></div>
                                            <div id='rightSide'><center>
			 								<p class='contentLeft'>Asset Tag: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetTag'></p><br /><br />\n
			 								<p class='contentLeft'>Asset Description: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$assetDesc'></p><br /><br />\n
			 								<p class='contentLeft'>Periphereals: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$periphIncluded'></p><br /><br />\n
			 								<p class='contentLeft'>Ticket Status: <input type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$ticketStat'></p><br />\n</center></div>
			 								"; 
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $name, "content"=> $content);
			//Pushes the $tempArray onto the $hardware array, creating a 2D array.
			array_push($hardware, $tempArray);
		}
                    

		return createCollapsibleView($hardware);
	}


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
            $permissions = $card[2];			
			$name = $user;
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
			$content = "<form action='accountUpdateHelp.php' method='post'>					
             				Username: <input name='username' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$user'>
             				<br />
 			 				Password: <input name='password' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value=''>
 			 				<br />
                             Permission Level:  <input name='permissionlevel' type='text' class='notEditing' readonly='readonly' ondblclick='makeEditable(this)' onblur='stopEditing(this)' value='$permissions'>
                             <br />";
 
 			 				if($_SESSION['idlevel'] == 'admin')
 			 				{
 			 					$content .= "<p class='contentRight'><input type='submit' name='action' value='Update'></p>\n";
 			 					$content .= "<p class='contentRight'><input type='submit' name='action' value='Delete'></p>\n";
 			 				}
            $content .= "</form>";
            
			//Assigns key-value pairs for the name and content.
			$tempArray = array ("name" => $user, "content"=> $content);
            
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
    function queueWaitingTable(){
    	$jsonString = exec('python queue_handler.py -s waiting');
		$entries = jsonTo2DArray($jsonString);
		$table = "
		<table>
		<tr><th>Customer Number</th><th>First/Last Initial</th></tr>";
		foreach($entries as $entry)
		{
			$customerNumber = $entry[0];
			$email = substr($entry[2], 0, 2);
			$table .= "<tr><td>$customerNumber</td><td>$email</td></tr>";
		}
		$table .= "</table>";
		return $table;
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
function checkout(){  
        
        $jsonString = exec('python checkout.py -s checkoutHardware');
		$cards = jsonTo2DArray($jsonString);
        

		//Initializes the future 2D array.
		$users = array();
		//Loops through user stored in 2D array
		foreach ($cards as $card)
		{
            $jsonString2 = exec('python checkout.py -s out');
            $cards2 = jsonTo2DArray($jsonString2);
			$namef  = $card[0];
            $use = $card[1];
            $checkoutstat = "false";
           
            foreach($cards2 as $card2){
                
                $name3 = $card2[0];
                if($namef == $name3){
                    $checkoutstat = "true";
                }
                
            }
			
            
			//Creates the body of the card view in the layout I have chosen. 
			//The class 'contentLeft'/'contentRight' determines which side the data will be on in the card view.
            //The select option for choosing the user permissions may be changed up later -Dylan
            
            if($checkoutstat != "true"){
                        $name = $namef;

            
			$content = "<form action='checkouthardware.php' method='post'>
                        <p class=''>Hardware Name: <input style='width: 40%;' name='name' type='text' value='$name'></p>\n
                        <p class=''>Use: $use</p>\n
                        <input type='submit' value='Checkout'></form>";
            
			             //Assigns key-value pairs for the name and content.
			             $tempArray = array ("name" => $name, "content"=> $content);
			             //Pushes the $tempArray onto the $user array, creating a 2D array.
			             array_push($users, $tempArray);
                                        }
            
            
            else{
                        $name = $namef;

            $content = "<form action='checkinhardware.php' method='post'>
                        <p class=''>Hardware Name: <input style='width: 40%;' name='name' type='text' value='$name'></p>\n
                        <p class=''>Use: $use</p>\n
                        <input type='submit' value='Checkin'></form>";
            
			             //Assigns key-value pairs for the name and content.
			             $tempArray = array ("name" => $name, "content"=> $content);
			             //Pushes the $tempArray onto the $user array, creating a 2D array.
			             array_push($users, $tempArray);
                    
                    
                                        }
            
            
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
