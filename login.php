
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$right = uniqid(rand(), true);

$hashed = hash('sha256', $right);



echo "Your password hashed: " . $right . "\n"; 
echo "<br>";





echo "<br>";

}


echo "<form action='login.php' method='post'><input type='text' name='input'><br>";
echo "<input type='submit' name='submit' value='submit'></form><br>";





?>


