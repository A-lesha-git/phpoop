<?php
namespace app\models;

use app\interfaces\IModel;

abstract class Model
{
    
    public function convertToArray($object){
        return get_object_vars($object);
    }


}

