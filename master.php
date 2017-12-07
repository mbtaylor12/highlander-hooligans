<?php
	/*
	*Makes the header for each page.
	*@param $index - The index which is highlighted. -1 means nothing is highlighted.
	*/
	function makeHeader($index)
	{
		//An array of pages and their title. "page.php" => "Header Text".
		$headers = array( "downloads.php" => "Downloads", "checkouts.php" => "Checkouts", "queue.php" => "Queue", "hardware_info.php" => "Hardware", "accounts.php" => "Account", "about.php" => "About" );

		$headerTable = "<br /><div id='colorbar'><img id='img1' src='./images/radfordlogo2.gif' alt='logo' ></div><div id='headerContainer'><br><div id='menuline'></div><br><a id='logoutlink' href='logout.php'>Logout</a><a id='settingslink' href='settings.php'>Settings</a><br><br><br><div id='menuline'></div><br>";

		$indexIterator = 0;


		//Checks which header to select
		foreach ($headers as $key => $header) 
		{

			if($indexIterator === $index)
				$headerTable .= "<a id='test' href='$key' class='headerSelected'>$header</a>\n";
			else
				$headerTable .= "<a id='test' href='$key' class='headerUnselected'>$header</a>\n";

			$indexIterator += 1;
		}

		$headerTable .= "</div></div><br />";

		return $headerTable;
	}
?>