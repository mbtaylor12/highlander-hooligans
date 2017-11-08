<?php 

    //This fucntion recursively list the files within the ./downloads directory
    function getfilesDownloads()
                        {
                
                $files = scandir('./downloads');
                $dot = array(".","..",".DS_Store","._.DS_Store"); //stuff we don't want listed. Not sure why it list these.
                
                sort($files); // this does the sorting
                
                echo'<table>';
                echo '<tr><td><b>Files currently in "./downloads" directory.</b></td></tr>';
                
                    foreach($files as $file){               //creates table if file name is not in dot array
                        if(!in_array($file, $dot))
                            
                            echo '<tr><td><a href = "./downloads/'.$file.'" download>'.$file.'</a></td></tr>';
                
                                            }
                echo '</table>';
                
      
        
                        }
    //This fucntion recursively list the files within the ./images directory


     function getfilesImgs()
                        {
                
                $files = scandir('./images');
                $dot = array(".","..",".DS_Store","._.DS_Store"); //stuff we don't want listed. Not sure why it list these.
                
                sort($files); // this does the sorting
                
                echo'<table>';
                echo '<tr><td><b>Files currently in "./images " directory.</b></td></tr>';
                
                    foreach($files as $file){               //creates table if file name is not in dot array
                        if(!in_array($file, $dot))
                            
                            echo '<tr><td><a href = "./downloads/'.$file.'" download>'.$file.'</a></td></tr>';
                
                                            }
                echo '</table>';
                
      
        
                        }
    

?>