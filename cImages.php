<?php

// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class Images 
{
    
    public function createImg(string $imgsub , string $watermk) {
        
        $pathimgsub = 'img/upload/' . $imgsub;
        $pathwatermk = 'img/upload/' . $watermk;
        
        // create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'imagick'));

        // to finally create image instances
        $imgsubstrate = $manager->make($pathimgsub)->resize(1024, 768)->blur(9);
        $watermark  = $manager->make($pathwatermk)->resize(320, 240);

        $imgfull = $imgsubstrate->insert($watermark, 'center')->save('img/imgfull.png');
        
        return TRUE;
    }
    
    //Думаю что метод uploadImg лучше разбить на метод проверки и метод загрузки.
    //Не хватает грамматного подхода((
    
    public function uploadImg() {
                       
        if(isset($_FILES['uploadimg']['name']) == true) {
            $blacklist = array(".php", ".phtml", ".php3", ".php4");

            foreach ($blacklist as $item) {
                if(preg_match("~$item\$~i", $_FILES['uploadimg']['name'])) {
                    echo "We do not allow uploading PHP files\n";
                    exit;
                }
            }

            $uploaddir = 'img/upload/';
            $uploadimg = $uploaddir . basename($_FILES['uploadimg']['name']);

            if (move_uploaded_file($_FILES['uploadimg']['tmp_name'], $uploadimg)) {
                echo "File is valid, and was successfully uploaded.</br>";
                echo "Name: ".$_FILES['uploadimg']['name']."</br>";
                echo "Size: ".$_FILES['uploadimg']['size']." байт"."</br>";
            } else {
                echo "File uploading failed.</br>";
            }
        } else {
            return FALSE;
        }
        
        return TRUE;
    }
}
