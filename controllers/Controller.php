<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 02.11.17
 * Time: 10:10
 */

namespace app\controllers;



use app\services\renderers\TemplateRenderer;
use app\services\RequestManager;

abstract class Controller
{
    protected $renderer;
    protected $twigRenderer;
    private $defaultAction = "index";
    protected $render = null;
    private $action;
    private $request = null; //содержит экземпляр класса RequestManager;
    protected $prefix = 'action';

    public function __construct()
    {

    }

    public function runAction($action = null){
            $this->action = $action ?: $this->defaultAction;
            $action = $this->prefix . ucfirst($this->action);
            
            $this->$action();
    }

    public function  getRequest(){
        if(is_null($this->request)){
            $this->request = new RequestManager();
        }

        return $this->request;
    }

    public function getTemplateRenderer(){
        if(is_null($this->render)) {
            $this->render = new TemplateRenderer();
        }

        return $this->render;
    }

    public function redirectTo404(){

        header('HTTP/1.0 404 Not Found', true, 404);
        exit;
        //или такой вариант:
//        $this->render->setContent("<h1>Ошибка 404 </h1><br> Такой страницы не существует");
//        $this->render->render(['render' => $this->render]);

    }

    public function redirect($url)
    {
        header("Location: /{$url}");
        exit;
    }



    





}
