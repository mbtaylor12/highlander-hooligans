
window.onload = function()
{
	
}

function expandHardware(id, manufacturer, connectionStatus, assetTag, ipAddress, macAddress, location)
{
	contract();
	element = document.getElementById(id);

	var content = document.createElement("p");
	content.setAttribute("id", "cardContent");

	content.innerHTML = "<br /><br /><br />"
					  + "<p class='contentLeft'>Manufacturer: " + manufacturer + "</p>"
					  + "<p class='contentRight'>Location: " + location + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>Connection Status: " + connectionStatus + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>Asset Tag: " + assetTag + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>IP Address: " + ipAddress + "</p><br /><br /><br />"
					  + "<p class='contentLeft'>MAC Address: " + macAddress + "</p>"
					  + "<p class='contentRight'><button>Apply</button></p>";

	element.style.height = "350px";
	element.appendChild(content);
}

function contract()
{
	cards = document.getElementsByClassName("card");
	cardContent = document.getElementById("cardContent");
	
	if(cardContent != null)
		cardContent.parentNode.removeChild(cardContent);

	for(i = 0; i < cards.length; i++){
		cards[i].style.height = "56px";
	}
}