<?php 
                $pos = $_POST['test'];
                $execStatement = "python queue_handler.py -ph $pos";

                exec($execStatement);
                header('Location: queue.php');

?>