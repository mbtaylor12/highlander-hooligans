<!DOCTYPE html>
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
  

	<body id='accountsbody'>
        <div id="header"><?php echo makeHeader(3); ?></div>
	<div id='centerContent'>
        <div class='hardwareInfoCenterContent'>
        <h1 id='moduleTitle'><b>Hardware Info</b></h1>
        <?php echo hardware(); ?>

            	<?php
            
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			 
				$assetNum = $_POST['assetTag'];
				$assetDesc = $_POST['assetDesc'];
				$manuFac = $_POST['manufacturer'];
				$modelNum = $_POST['model'];
				$serialNum = $_POST['serialNum'];
				$periphIncluded = $_POST['periphreals'];
				$roomNum = $_POST['location'];
				$ticketStat = $_POST['ticketStatus'];

				$execStatement = "python hardwareLoaner.py -i hardwareLoaners assetNum assetDesc manuFac modelNum serialNum periphIncluded roomNum ticketStat -v $assetNum $assetDesc $manuFac $modelNum $serialNum $periphIncluded $roomNum $ticketStat";


				exec($execStatement);
                
                echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

			}
		?>

	</div>
        </div>
        
        <div id="inputLeft" >
        	
          
            <div class="createModuleInput">
		<form action='hardware_info.php' method='post' name='insert'>
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
            </div>
          	
        
        <div id="inputRight">
            <div class="createModuleInput">
        	

		<form action='hardware_info.php' method='post' name='insert'>                 
			Search key: <input type='text' name='manufacturer'>
			<br />
			Search by: <input type='text' name='model'>
			<br />
			<input type='submit' name='Insert' value='submit' />
		</form>
            
        </div>
        </div>
        
	</body>
</html>