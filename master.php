<?php
	function makeHeader($index)
	{
		$headers = array( "Downloads", "Checkouts", "Queue", "Hardware Info", "Accounts", "About" );

		$headerTable = "<table>\n" .
					   "	<tr>\n";
					   
		foreach ($headers as $header) 
		{
			$headerTable .= "		<td>$header</td>\n";
		}

		$headerTable .= "	</tr>\n" .
						"</table>";

		return $headerTable;
	}

	echo makeHeader(1);
?>