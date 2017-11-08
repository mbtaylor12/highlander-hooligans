<html>
<head>
    		<link rel="stylesheet" href="styles.css">

    </head>
</html>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    test();
}

function test(){
    
echo "<table><tr><td>Results of upload</td></tr>";        
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<tr><td>File is an image - " . $check["mime"] . ".</td></tr>";
        $uploadOk = 1;
    } else {
         echo "<tr><td>File is not an image.</td></tr>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "<tr><td>Sorry, file already exists.</td></tr>";
    $uploadOk = 0;
}
    else {}
        
        
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<tr><td>Sorry, your file is too large.</td></tr>";
    $uploadOk = 0;
}
        
        
// Allow certain file formats
if($imageFileType != "exe" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<tr><td>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</td></tr>";
    $uploadOk = 0;
}
        
        
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<tr><td>Sorry, your file was not uploaded.</td></tr>";
    
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<tr><td>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</td></tr>";
    } else {
         echo "<tr><td>Sorry, there was an error uploading your file.</td></tr>";
    }
}
        
        echo "</table>";
    }


    
?>
    




