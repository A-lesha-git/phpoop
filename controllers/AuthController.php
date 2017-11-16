<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 13.11.17
 * Time: 16:49
 */

namespace app\controllers;
use app\base\App;
use app\services\Auth;

class AuthController extends Controller
{
    public function actionIndex()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if((new Auth())->login($_POST['login'], $_POST['pass'])){
                $this->redirect('product/list/');
                exit;
            }
        }

        echo $this->render('login');
    }

    public function actionLogin(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if((new Auth())->login($_POST['login'], $_POST['password'])){
                $this->redirect('product/list/');
            }
        }
        $render = $this->getTemplateRenderer();
        $render->setTitle('Авторизация');
        $render->setContent($render->renderContent("login/login", []));

        echo $render->render(['render' => $this->render, 'user'=>null]);
    }

    public function actionLogout(){
        App::call()->auth->logout();

        $this->redirect('auth/login/');
    }


    public function actionRegister(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if((new Auth())->login($_POST['login'], $_POST['password'])){
                $this->redirect('product/list/');
            }
        }
        $render = $this->getTemplateRenderer();
        $render->setTitle('Авторизация');
        $render->setContent($render->renderContent("login/register", []));

        echo $render->render(['render' => $this->render, 'user'=>null]);
    }
}