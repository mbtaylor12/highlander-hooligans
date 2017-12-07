<?php 
                $name = $_POST['name'];
                $execStatement = "python checkout.py -ph $name";

                exec($execStatement);
                header('Location: checkouts.php');

?>