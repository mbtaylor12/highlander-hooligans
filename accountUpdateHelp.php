<?php 
    $username= $_POST['username'];
    $password = $_POST['password'];
    $permissionlevel = $_POST['permissionlevel'];

    if($_POST['action'] == 'Update')
    {
    	echo "updating <br />";
	}
	else if($_POST['action'] == 'Delete')
	{
		echo "deleting <br />";
	}

	echo("Username: $username <br /> Password: $password <br /> Permission Level: $permissionlevel");
?>