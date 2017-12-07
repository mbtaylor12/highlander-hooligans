  <?php
            
			
				$username = $_POST['username'];                    
				$password = $_POST['password'];
				$permission = $_POST['permission'];
                
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $random = '';
                $count = 11;
                for($i = 0; $i < $count; $i++){
            
                $random .= $characters[rand(0, $charactersLength - 1)];
                    
                }
                $hashedrandom = hash('sha256', $random);
                $hashed = hash('sha512', hash('sha256', $password) . $hashedrandom);
                
				$execStatement = "python users.py -i Users username password permissions salt -v $username $hashed $permission $hashedrandom";
               


				exec($execStatement);
                
                echo '<script type="text/javascript"> window.location = "accounts.php"</script>';
                  

			
            
    
    
            
		?>