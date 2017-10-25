<?php
	/*
	*Makes the header for each page.
	*@param $index - The index which is highlighted. -1 means nothing is highlighted.
	*/
	function makeHeader($index)
	{
		//An array of pages and their title. "page.php" => "Header Text".
		$headers = array( "downloads.php" => "Downloads", "checkouts.php" => "Checkouts", "queue.php" => "Queue", "hardware_info.php" => "Hardware Info", "accounts.php" => "Accounts", "about.php" => "About" );

		$headerTable = "<br /><div id='headerContainer'>\n";

		$indexIterator = 0;

		//Checks which header to select
		foreach ($headers as $key => $header) 
		{
			$headerTable .= "";

			if($indexIterator === $index)
				$headerTable .= "<a href='$key' class='headerSelected'>$header</a>\n";
			else
				$headerTable .= "<a href='$key' class='headerUnselected'>$header</a>\n";

			$indexIterator += 1;
		}

		$headerTable .= "</div><br />";

		return $headerTable;
	}
?>