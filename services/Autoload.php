<?php

namespace app\services;

use app\base\App;

class Autoload
{
    private $fileextension = ".php";
    function loadClass($className){
        $filename = str_replace(['app', "\\"],
                                [App::call()->config['root_dir'], '/'],
                                $className)
                    . $this->fileextension;
        if(file_exists($filename)){
            require $filename;
        }
    }
}