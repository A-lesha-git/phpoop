<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 17.11.17
 * Time: 15:21
 */

namespace app\controllers;


use app\base\App;
use app\services\Session;
use app\services\shop\CartProcessor;
use app\services\RequestManager;

class CartController extends Controller
{
    /** Session */
    private $session;

    /** CartProcessor */
    private $cartProcessor;

    /**  RequestManager */
    private $request;


    public function actionView(){
        $this->session = App::call()->session;
        $userId = $this->session->getUid();
        $this->cartProcessor = App::call()->cartProcessor;
        $products = $this->cartProcessor->getUserShopCart($userId);
        $render = $this->getTemplateRenderer();
        $render->setTitle("Товары");
        $render->setContent($render->renderContent('shop/cart', ['products'=>$products]));

        $user = App::call()->user->getCurrent();

        echo $render->render(['render' => $this->render, 'products'=>$products, 'user'=> $user]);




    }

    public function actionAdd(){
//        echo 123;
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $this->request = App::call()->request;
            $productId = $this->request->get('post', 'product_id');

            $this->cartProcessor = App::call()->cartProcessor;

            $this->cartProcessor->addProductToUserShopCart( $productId);




        }
    }
}