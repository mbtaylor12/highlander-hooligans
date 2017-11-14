<?php 
                $execStatement = "python queue_handler.py -pw";

                exec($execStatement);
                header('Location: queue.php');


?>