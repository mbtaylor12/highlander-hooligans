<?php
          session_start();

   if (!isset($_SESSION['userlogin'])) 

        header('Location: index.php');

    
?>
       
<html>
	<head>
		<?php require_once("master.php") ?>
		<?php require_once("organizationStructures.php") ?>
		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Hardware Info</title>


	</head>
  

        <div id="header"><?php echo makeHeader(3); ?></div>
    	<div id='accountsbody'>

        <div id='centerContent'>
        <div class="viewnav" id="myTopnav">
        <?php 
            $jsonString = exec('python hardwareLoaner.py -s class -all');
            $cards = jsonTo2DArray($jsonString);
            
            
            
           
          echo"  <div id='navview'><form id='searchform' action='hardware_info.php' method='post'>
                            <b>Current Hardware View:</b>";
              
             foreach ($cards as $card){
                $class = $card[0];
                 
            echo "<input id='navbutton' type='submit' value='$class' name='submitclass'>";
             }
           echo " </select></form></div>";
              ?>
              
                </div>
            
          <?php 
            if(isset($_POST["submitclass"])){
                $class = $_POST["submitclass"];
            
            echo hardwareController($class);
               
            }

            ?>
       
	
        </div>
            
           
 <div id="inputRight">
            
      
              <div class="createModuleInput">
        
		<form action='addHardware.php' method='post' name='insert'>
            <b>Manufacturer</b> <br><input type='text' name='manufacturer'>
			<br />
			<b>Model</b><br> <input type='text' name='model'>
			<br />
			<b>Serial Number</b><br> <input type='text' name='serialNum'>
			<br />
			<b>Asset Tag </b><br><input type='text' name='assetTag'>
			<br />
			<b>Asset Description</b> <br><input type='text' name='assetDesc'>
			<br />
			<b>Periphreals</b><br> <input type='text' name='periphreals'>
			<br />
			<b>Ticket Status </b><br><input type='text' name='ticketStatus'>
			<br />
			<b>Location </b><br><input type='text' name='location'>
			<br />
			<input type='submit' name='Insert' value='submit' />
		</form>
            </div>
     
            <div class='createModuleInput'>
                <form>
                <b>Search by: <br></b><select id='hardwaresearchby'>
                <option value='none' selected>None</option>
                <option  value='Asset Num'><b>Loaner Hardware</b></option>
                <option  value='Model'><b>Printers</b></option>
                </select>
                <input type='text' name='hardwaresearch' style='width:35%;'>
                <input type='submit' name='Search'>
                    </form>
                       </div>
            </div>
        
	</div>
</html>
