<?php

class FileLoader {
    
    function loadScripts ($fileType) {
        $folderPath = SOURCES_DIR."/".$fileType."/";
        $fileNames = array();
        foreach (new DirectoryIterator($folderPath) as $file) {

            $filetype = pathinfo($file, PATHINFO_EXTENSION);

            if ($file->isFile() && $filetype == $fileType) {

                array_push($fileNames, $file->getFilename());
            }
        }
        foreach ($fileNames as $name){
            if ($fileType == "css") {
                ?>
                    <link rel="stylesheet" href="<?php echo ROOT.'/'.$folderPath.$name; ?>">
                <?php
            } else if ($fileType == "js"){
                ?>
                    <script type="text/javascript" src="<?php echo ROOT.'/'.$folderPath.$name; ?>"></script>
                <?php
            }
        } 
    }
    
    function LoadProductImages($productfolder){
        $folderPath = PRODUCT_IMAGES_DIR.$productfolder."/";      
        $fileNames = array();
        foreach (new DirectoryIterator($folderPath) as $file) {
            if ($file->isFile()) {
                array_push($fileNames, $file->getFilename());
            }
        }
       
        foreach ($fileNames as $name){
            ?>
            <img src="<?php echo ROOT.'/'.$folderPath.$name; ?>" alt="slide1" height="310" width="420">
            <?php
        }
    }
}


