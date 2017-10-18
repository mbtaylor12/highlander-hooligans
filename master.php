<?php
	function makeHeader($index)
	{
		$headers = array( "downloads.php" => "Downloads", "checkouts.php" => "Checkouts", "queue.php" => "Queue", "hardware_info.php" => "Hardware Info", "accounts.php" => "Accounts", "about.php" => "About" );

		$headerTable = "<table id='headerTable'>\n" .
					   "	<tr>\n";
					   //"		<td class='tacHeader'><img src='images/taclogo.png' alt='Taco Logo'></td>\n"; Image appears, but for some reason has a ton of whitespace around it.

		$indexIterator = 0;

		foreach ($headers as $key => $header) 
		{
			if($indexIterator === $index)
				$headerTable .= "		<td class='selectedHeader'>$header</td>\n";
			else
				$headerTable .= "		<td class='unselectedHeader' onclick=\"window.location='$key';\">$header</td>\n";

			$indexIterator += 1;
		}

		$headerTable .= "	</tr>\n" .
						"</table>" ;

		return $headerTable;
	}
?>