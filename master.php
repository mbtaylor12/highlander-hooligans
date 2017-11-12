<?php
	/*
	*Makes the header for each page.
	*@param $index - The index which is highlighted. -1 means nothing is highlighted.
	*/
	function makeHeader($index)
	{
		//An array of pages and their title. "page.php" => "Header Text".
		$headers = array( "downloads.php" => "Downloads", "checkouts.php" => "Checkouts", "queue.php" => "Queue", "hardware_info.php" => "Hardware Info", "accounts.php" => "Accounts", "about.php" => "About" );

		$headerTable = "<br /><div id='colorbar'><a id='logoutlink' href='logout.php'>Logout</a><img id='img1' src='./images/radfordlogo2.gif' alt='logo' ><div id='headerContainer'>\n";

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

		$headerTable .= "</div></div></div><br />";

		return $headerTable;
	}
?>