<?php 
    $username= $_POST['username'];
    $password = $_POST['password'];
    $permissionlevel = $_POST['permissionlevel'];
    if($_POST['action'] == 'Update')
    {
        
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $random = '';
                $count = 11;
                for($i = 0; $i < $count; $i++){
            
                $random .= $characters[rand(0, $charactersLength - 1)];
                    
                }
                $hashedrandom = hash('sha256', $random);
                $hashed = hash('sha512', hash('sha256', $password) . $hashedrandom);
        
        exec("python updateAccounts.py storage/users.db Users $username $hashed $permissionlevel $hashedrandom");
        header("Location: accounts.php");	}
	else if($_POST['action'] == 'Delete')
	{
        exec("python delete.py storage/users.db Users username $username");
        header("Location: accounts.php");

	}
?>