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
               
               <form action="hardware_info.php" method="post">
                <b>Search by Asset Name: </b>
                <input type='text' name='hardwaresearch' style='width:35%;'>
                <input type='submit' name='Search' value="Search">
                    </form>
        <div class="viewnav" id="myTopnav">
            
            
        <?php 
            $jsonString = exec('python hardwareloanerall.py -s class -all');
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
            $class1 = $class;
            
            echo hardwareController($class1);
               
            }
            
             if(isset($_POST["Search"])){
            
              $search = $_POST['hardwaresearch'];
               echo hardwaresearch($search);
               
            }

            ?>
       
	
        </div>
            
           
 <div id="inputRight">
     
         
            </div>
        
	</div>
</html>
