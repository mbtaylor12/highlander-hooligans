
/*
*Function that fires when page loads.
*/
window.onload = function()
{
	
}

/*
*expandHardware - Creates an expanding card view for a specific piece of hardware
*@param id - ID of parent div
*@param manufacturer - The manufacturer of the hardware
*@param connectionStatus - The current connection status of the hardware
*@param assetTag - The asset tag of the hardware
*@param ipAddress - The IP address of the hardware
*@param macAddress - The MAC Address of the hardware
*@param location - The location of the hardware
*/
function expandHardware(id, manufacturer, connectionStatus, assetTag, ipAddress, macAddress, location)
{
	//First contracts all card views.
	contract();

	//stores parent div in element
	element = document.getElementById(id);

	//creates a div inside of the parent div
	var content = document.createElement("p");
	content.setAttribute("id", "cardContent");

	//Builds the child div's content
	content.innerHTML = "<br /><br /><br />"
					  + "<p class='contentLeft'>Manufacturer: " + manufacturer + "</p>"
					  + "<p class='contentRight'>Location: " + location + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>Connection Status: " + connectionStatus + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>Asset Tag: " + assetTag + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>IP Address: " + ipAddress + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>MAC Address: " + macAddress + "</p>"
					  + "<p class='contentRight'><button>Apply</button></p>";

	//Expands the current card view.
	element.style.height = "350px";
	//Changes current card's background color to a slightly darker color
	element.style.backgroundColor = "#eaeaea";

	//Adds child div to parent div
	element.appendChild(content);
}


/*
*contract - Contracts all card views on the screen and removes their child divs if it exists.
*/
function contract()
{
	//Gets an array of all classes with the name card
	cards = document.getElementsByClassName("card");
	//Gets any currently open cards
	cardContent = document.getElementById("cardContent");
	
	//Deletes child div of open cardview
	if(cardContent != null)
		cardContent.parentNode.removeChild(cardContent);

	//Contracts the height and reverts background color of the open cardview
	for(i = 0; i < cards.length; i++){
		cards[i].style.height = "56px";
		cards[i].style.backgroundColor = "white";
	}
}

function makeEditable(thisInput)
{
	thisInput.removeAttribute("readonly");
	thisInput.className = "editing";
}

function stopEditing(thisInput)
{
	thisInput.setAttribute("readonly", "readonly");
	thisInput.className = "notEditing";
}