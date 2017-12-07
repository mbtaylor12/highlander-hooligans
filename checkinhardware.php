<?php 
                $name = $_POST['name'];
                $execStatement = "python checkout.py -pw $name";

                exec($execStatement);
                header('Location: checkouts.php');

?>