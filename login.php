
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$right = $_POST["input"];
$hashed = password_hash($right, PASSWORD_BCRYPT);



echo "Your password hashed: " . $hashed . "\n"; 
echo "<br>";





echo "<br>";

}


echo "<form action='login.php' method='post'><input type='text' name='input'><br>";
echo "<input type='submit' name='submit' value='submit'></form><br>";



$db = new PDO('sqlite:/var/www/html/se1-v1/users.db');
$result = $db->query('SELECT username FROM Users');
echo "<table>";
foreach($result as $row){
    echo "<tr><td>".row['username']."</td></tr>";
    
    
    

    
}
  echo "</table>";  

$db = null;

?>


