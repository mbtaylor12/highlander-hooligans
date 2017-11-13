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
        		 <?php require_once("adminfunctions.php") ?>

		<link rel="stylesheet" href="styles.css">
		<script src="script.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="accountsbody">
        
        <div id="header"><?php echo makeHeader(0); ?></div>
       
        <div id="centerContent">    <!-- creates center content div -->
            
                        <div id="rightSide">  <!-- content right side div -->


            <div class='downloadsUtilities'>
                		<h1 id='moduleTitle'><b>Downloads
Utilities</b></h1>
                <?php echo downloadsUtilities(); ?>
            </div>
            
            </div>
            
                        <div id="leftSide">     <!-- content left side div -->
            
            
            <div class="downloadsCenterContent">
                
            <h1 id="moduleTitle"><b>Drivers and Guides</b></h1>
                <p class="downloadsPtag">This table is produced by looping through the folder and displays every file as a download link.
                    It is dynamic depending on how many files are in the folder!
                </p>
                
                        <?php echo getfilesDownloads(); ?>
                           
            </div>
            
            
            
            
            </div>
            
        </div>
        

    
	</body>
        <?php
        
        
        
    session_start();
    $permissions = $_SESSION['idlevel'];
  
    if($permissions == 'admin'){
    
        
         echo'  <div id="inputLeft">    <!-- input left side. -->
            
            
        <div class="createModuleInput">
            <form action="accounts.php" method="post" enctype="multipart/form-data">
                <b><u>Select image to upload. this will upload to the /downloads folder.</u></b>
                <br>
                <br>
                <center><input type="file" name="uploaded_file" id="fileToUpload"></center>
                <input style=" margin-bottom: 5px;" type="submit" value="Upload Image" name="submit">
            </form>
            
            </div></div>';
            
    
        //downloads function. Must be contained within page for alerts to work
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
                                           
                                           
      
      
      
        $path = "downloads/";
        $path = $path . basename( $_FILES['uploaded_file']['name']);
        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))             //this functionality will need to be advanced in the
                                                                                        //future for security.
            {
            
            echo '<script language="javascript">';
            echo 'alert("File uploaded!")';
            echo '</script>';
            
           
            } 
            else
                {
            
                    echo '<script language="javascript">';
                    echo 'alert("There was an error uploading the file, please try again!")';
                    echo '</script>';
                
                }
                    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

                    
            }
                            }
               
            

        ?>
    <!-- <div id="inputRight"></div> -->
    
</html>