<?php


namespace app\controllers;

use app\base\App;
use app\models\User;
use app\services\Auth;
use app\services\RequestNotMatchException;


class AuthenticationNotMatchException extends \Exception{

}


class FrontController extends Controller
{
    private $controller;
    private $controllerClass;
    private $action;
    private $defaultController = "Product";
    private $isAuthorized;


    public function actionIndex()
    {
        try {
            $rm = $this->getRequest();
            $controllerName = $rm->getControllerName() ?: $this->defaultController;
            $this->controllerClass = App::call()->config['controller_namespaces'] . ucfirst($controllerName) . "Controller";
            $this->action = $rm->getActionName();
            $this->isClassAndActionExist();
//            if($this->action != "login") {
            $this->checkLogin();
//            }
        }
        //отлавливаем возможные варианты
        // не существует экшна или класса и перебрасываем на 404 страницу
        catch (RequestNotMatchException $e){
//            echo $e;
            $this->redirectTo404();
            exit;
        }
        catch (AuthenticationNotMatchException $e){
//            var_dump($e);
            $this->redirect('auth/login/');
//            var_dump(12341414);
            (new AuthController())->actionLogin();
            exit;
        }
        finally{

            $this->controller->runAction($this->action);
        }


    }

    private function checkLogin(){
        session_start();
        if($this->controllerClass != "\\" . AuthController::class){
            $user = (new User())->getCurrent();
            if(is_null($user)){
                throw new AuthenticationNotMatchException("Пользователь не залогинен!");
            }
        }
    }


    private function isClassAndActionExist(){

        if(!class_exists($this->controllerClass) ){
            throw  new RequestNotMatchException("Такого класса не существует " . $this->controllerClass);
        }
        $this->controller = new $this->controllerClass();
        if(!method_exists($this->controller, $this->prefix . $this->action)) {
            throw  new RequestNotMatchException("У контроллера " . get_class($this->controller) ." не существует метода " . $this->prefix . $this->action);
            exit;
        }
    }

}