<?php 
         function valide_image(array $files,string $key,array &$arrayError,$target_file):void{
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    
              $arrayError[$key] = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        
            }elseif ($files["avatar"]["size"] > 500000) {
                $arrayError[$key] = "la tailee ne doit pas dépasser 500kb.";
            }
          }
?>