<?php

namespace app\base;


use app\controllers\FrontController;
use app\services\Db;
use app\services\RequestManager;
use app\traits\TSingleton;
use app\controllers\Controller;
use app\base\Storage;

include "../traits/TSingleton.php";


/**
 * Class App
 * @package app\base
 * @property RequestManager request
 * @property FrontController mainController
 * @property Db db
 */
class App
{
    use TSingleton;

    public $config;
    /** @var  Storage */
    public $components;

    public static function call(){
        return static::getInstance();
    }
    
    public function run(){
        $this->config = require_once "../config/conf.php";
        $this->autoloadRegister();
        $this->components = new Storage();

        $this->mainController->actionIndex();
    }

    public function autoloadRegister(){
        require_once "../services/Autoload.php";
//        require_once "../vendor/autoload.php";
        spl_autoload_register([new \app\services\Autoload(), 'loadClass']);
    }

    function __get($name)
    {
        return $this->components->get($name);
    }

    function createComponent($name){
        if(isset($this->config['components'][$name])){
            $params = $this->config['components'][$name];

            $className = $params['class'];
            if(class_exists($className)){
                unset($params['class']);
                $reflection =  new \ReflectionClass($className);
                return $reflection->newInstanceArgs($params);
            }
        }
        throw new ComponentNotFoundException($name);
    }
}
