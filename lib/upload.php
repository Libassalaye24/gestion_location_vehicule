<?php 
         function valide_image(array $files,string $key,array &$arrayError,$target_file):void{
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    
              $arrayError[$key] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        
            }elseif ($files["image"]["size"] > 500000) {
                $arrayError[$key] = "la tailee ne doit pas depasser 500kb.";
            }
          }
?>