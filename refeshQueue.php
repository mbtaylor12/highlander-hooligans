<?php 

                $execStatement = "python queue_handler.py -r";

                exec($execStatement);
                header('Location: queue.php');


?>