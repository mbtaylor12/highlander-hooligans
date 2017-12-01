<?php 

    //This fucntion recursively list the files within the ./downloads directory
    function getfilesDownloads()
                        {
                
                $files = scandir('./downloads');
                $dot = array(".","..",".DS_Store","._.DS_Store"); //stuff we don't want listed. Not sure why it list these.
                
                sort($files); // this does the sorting
                
                echo'<table>';
                echo '<tr><td><b>Files currently in "./downloads" directory.</b></td></tr>';
                
                    foreach($files as $file){               //creates table if file name is not in dot array
                        if(!in_array($file, $dot))
                               
                            
                            echo '<tr><td><a href = "./downloads/'.$file.'" download>'.$file.'</a></td></tr>';
                
                                            }
                echo '</table>';
                
      
        
                        }
    //This fucntion recursively list the files within the ./images directory


     function getfilesGuides()
                        {
                
                $files = scandir('./guides');
                $dot = array(".","..",".DS_Store","._.DS_Store"); //stuff we don't want listed. Not sure why it list these.
                
                sort($files); // this does the sorting
                
                echo'<table>';
                echo '<tr><td><b>Drivers and Guides</b></td></tr>';
                
                    foreach($files as $file){               //creates table if file name is not in dot array
                        if(!in_array($file, $dot))
                            
                            echo '<tr><td><a href = "./guides/'.$file.'" download>'.$file.'</a></td></tr>';
                
                                            }
                echo '</table>';
                
      
        
                        }

    function databaseSize(){
        
        
                $total = 0;
                echo "<b>Database Analytics</b>";

                echo "<table id='databasesize'>";
                echo "<tr><td><b>Database</b></td><td><b>Size</b></td></tr>";
                $file = 'storage/hardwareinfo.db';
                $filesize = filesize($file); // bytes
                $filesize = round($filesize / 1024, 1); // megabytes with 1 digit
                $total = $total + $filesize;
                echo "<tr><td><a href='hardwareView.php'>Hardware</a></td><td> $filesize KB.</td></tr><br>";
                $file = 'storage/users.db';
                $filesize = filesize($file); // bytes
                $filesize = round($filesize / 1024, 1); // megabytes with 1 digit
                $total = $total + $filesize;

                echo "<tr><td>Users</td><td> $filesize KB.</td></tr><br>";
                $file = 'storage/printers.db';
                $filesize = filesize($file); // bytes
                $filesize = round($filesize / 1024, 1); // megabytes with 1 digit
                $total = $total + $filesize;

                echo "<tr><td>Printers</td><td> $filesize KB.</td></tr><br>";
                
                $file = './storage/queue.db';
                $filesize = filesize($file); // bytes
                $filesize = round($filesize / 1024, 1); // megabytes with 1 digit
                $total = $total + $filesize;

                echo "<tr><td>Queue</td><td> $filesize KB.</td></tr>";
                echo "<tr><td><b>Total</b></td><td> $total KB.</td></tr>";
                echo "</table>";

          
    }
    
    function userAccountInfo(){
        
        
        
           $jsonString = exec('python users.py -s Users');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$users = array();
        $numofusers = 0;
        $numofadmin = 0;
        $numofusers = 0;
        $numofmods = 0;
        $numofkiosk = 0;
        $totalusers = 0;
		//Loops through user stored in 2D array
        echo "<br><b>User Account Analytics</b>";
        echo "<table style='width: 50%;'>";
        echo "<tr><td><b>Account Type</b></td><td><b>Amount</b></td></tr>";
		foreach ($cards as $card)
		{
			$user = $card[0];
            $permissions = $card[2];
            
            if($permissions == "admin"){$numofadmin = $numofadmin + 1;}
            if($permissions == "user"){$numofusers = $numofusers + 1;}
            $totalusers = $totalusers + 1;
            
             
		}
            echo "<tr><td>Admin</td><td>$numofadmin</td></tr>";
            echo "<tr><td>Moderators</td><td>$numofmods</td></tr>";
            echo "<tr><td>Student Tech</td><td>$numofusers</td></tr>";
            echo "<tr><td>Kiosk User</td><td>$numofkiosk</td></tr>";
            echo "<tr><td><b>Total Users<b></td><td>$totalusers</td></tr>";


            echo "</table>";
        
        
        
        
    }

function loanerTableView(){
    
    $jsonString = exec('python hardwareLoaner.py -s hardwareLoaners -all');
		$cards = jsonTo2DArray($jsonString);
		//Initializes the future 2D array.
		$hardware = array();
		//Loops through each piece of hardware stored in 2D array
        echo "<table>";
        echo "<tr><td><b>assetTag</b></td><td><b>assetDsc</b></td><td><b>manuFac</b></td><td><b>modelNum</b></td><td><b>serialNum</b></td><td><b>periphIncluded</b></td><td><b>roomNum</b></td><td><b>ticketStat</b></td></tr>";
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
            
            
            echo "<tr><td>$assetTag</td><td>$assetDesc</td><td>$manuFac</td><td>$modelNum</td><td>$serialNum</td><td>$periphIncluded</td><td>$roomNum</td><td>$ticketStat</td></tr>";
            
            
            
        }
    
        echo "</table>";
    
    
    
    
}
?>
    